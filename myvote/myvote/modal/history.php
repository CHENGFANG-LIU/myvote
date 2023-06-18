<?php
include_once "../common.php";
$today=date("Y-m-d H:i:s");

$page=$_GET['page'];
$sql="SELECT `topics`.`topic_id`,`total`,`img`,`subject`,`start_time`,`stop_time` FROM `topics` LEFT JOIN (SELECT COUNT(*) AS `total` ,`topic_id` FROM `votes` GROUP BY topic_id)A ON `A`.`topic_id` = `topics`.`topic_id` WHERE `stop_time`<'{$today}' GROUP BY `topics`.`topic_id` order by `start_time` DESC limit $page ;";

$topics=$Topics->q($sql);

$id_page=1;
foreach($topics as $index => $val){
if(is_null($val['total'])){
    $val['total']=0;
}
?>
<div class="demo-box<?=$id_page+8?>"></div>
<a style="background-color:red;width=100%;" href="back.php?go=vote_result&topic_id=<?=$val['topic_id']?>">
<table style="text-align:center;align-items:center;" class="table table-hover ">

    <tr >
        
        <div id="lo<?=$id_page?>"></div>
        
        <td style="width:20%;">
<img src="./upload/<?=$val['img']?>" style="width:100%;height=20vh;">
        </td>
        <td style="width:50%;">
        <?=$val['subject']?>
  </td>
  <td style="font_size:2%;">
    
  <?=$val['start_time']?><br><br>
  ~<br><br>
  <?=$val['stop_time']?>

  </td>
        <td style="width:10%;">
        <?=$val['total']?>
        </td>
        
        
        
    </tr>
    
    
    
    
</table>

</a>
<?php
$id_page++;
}
?>