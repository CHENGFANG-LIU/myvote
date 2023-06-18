<?php 
include_once "../common.php";

$topic=$Topics->find(['topic_id'=>$_GET['id']]);
// echo $topic['stop_time'];

//先計算投票期間長度
$duration=strtotime($topic['stop_time'])-strtotime($topic['start_time']);

$new_close=date("Y-m-d H:i:s",strtotime("now")-1);
$new_open=date("Y-m-d H:i:s",strtotime("now")-$duration);

$sql="update `topics` set `start_time`='$new_open',`stop_time`='$new_close' where `topic_id`='{$_GET['id']}'";

$Topics->q($sql);
$Topics->to("../back.php");

