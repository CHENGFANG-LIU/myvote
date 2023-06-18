
<?php
$today=date("Y-m-d H:i:s");
$topics=$Topics->q("SELECT `topics`.`topic_id`,`total`,`img`,`subject`,`start_time`,`stop_time` FROM `topics` LEFT JOIN (SELECT COUNT(*) AS `total` ,`topic_id` FROM `votes` GROUP BY topic_id)A ON `A`.`topic_id` = `topics`.`topic_id` WHERE `start_time`< '{$today}' && `stop_time`>'{$today}' GROUP BY `topics`.`topic_id` order by `total`DESC limit 10 ;");

foreach($topics as $index => $val){
if(is_null($val['total'])){
    $val['total']=0;
}
?>
<a style="background-color:red;width=100%;" href="back.php?go=vote&topic_id=<?=$val['topic_id']?>">
<table style="text-align:center;align-items:center;" class="table table-hover ">

    <tr >
        
        
        
        <td style="width:10%;">
        <div style="height:10vh; " >&nbsp;</div>
            <h3>Top<?=$index+1?></h3>
        </td>
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
}
?>
