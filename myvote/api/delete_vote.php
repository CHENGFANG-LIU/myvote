<?php
include_once "../common.php";
$Topics->delete(['topic_id'=>$_GET['topic_id']]);
$Topics->to("../back.php");