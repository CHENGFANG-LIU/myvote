<?php
$votes=$Votes->all(['topic_id'=>$_GET['topic_id']]);
$vote1=$Votes->q("select count(*) from `Votes` where `topic_id`='{$_GET['topic_id']}'");
$total=$vote1[0]['count(*)'];
// echo $total;
$opt1=$Options->all(['topic_id'=>$_GET['topic_id']]);
foreach($opt1 as $val){
  $opt2=$Votes->q("select count(*) from `Votes` where `ans`='{$val['opt']}'");
  $each_opt=$val['opt'];
  $each_count=$opt2[0]['count(*)'];
  ?>
  <div class="container-wrap">
  <div style="width:10%;height:10vh;">
  <?=$each_opt?>
</div>
    <div style="width:70%;height:10vh; ">

      <div style='background:#ff8c00;height:5vh; width: calc(100% *(<?=$each_count?>/<?=$total?>));'></div>
    </div>
    <div style="width:10%;height:10vh;">
    <?=$each_count?>
    </div>
  </div>
  <?php
  }
  ?>