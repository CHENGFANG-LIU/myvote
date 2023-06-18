<?php
include_once("../common.php");
            unset($_SESSION['user_id']);
            unset($_SESSION['email']);
            unset($_SESSION['pr']);
            $User->to("../index.php");