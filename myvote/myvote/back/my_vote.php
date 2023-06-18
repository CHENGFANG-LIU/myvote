
<?php

$topics=$Topics->q("SELECT `subject`,`votes`.`topic_id`,`img`,`start_time`,`stop_time` FROM `votes` LEFT JOIN `topics` ON `votes`.`topic_id`=`topics`.`topic_id` WHERE `votes`.`user_id`='{$_SESSION['user_id']}' GROUP BY `votes`.`topic_id`");

foreach($topics as $index => $val){

?>
<a style="background-color:red;width=100%;" href="back.php?go=vote&topic_id='<?=$val['topic_id']?>'">
<table style="text-align:center;align-items:center;" class="table table-hover ">

    <tr >
        
        
        
        
        
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
        
        
        
    </tr>
    
    
    
    
</table>
</a>
<?php
}
?>
