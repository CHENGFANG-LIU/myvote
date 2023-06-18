<?php
include_once "../common.php";
$User->delete(['user_id'=>$_GET["user_id"]]);
$User->to("../back.php?go=super");