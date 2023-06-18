<?php

include_once("../common.php");
$check=$User->q("select count(*) from `user` where `email`='{$_POST['email']}' && `password` ='{$_POST['pw']}'");
// echo "<pre>";
// print_r($check) ;
// echo "</pre>";
if($check[0]["count(*)"]==1){
    $user=$User->find(["email"=>$_POST['email'],"password" =>$_POST['pw']]);
// echo "<pre>";
// print_r($user) ;
// echo "</pre>";
$_SESSION["pr"]=$user["pr"];
$_SESSION["user_id"]=$user["user_id"];
$_SESSION["email"]=$user["email"];
// echo $_SESSION["pr"];
// echo $_SESSION["user_id"];
// echo $_SESSION["email"];
// if(isset($_SESSION["tmp_topic"])){
//     $User->to("../back.php?go=vote&topic_id=".$_SESSION["tmp_topic"]);
//   }else{
//     $User->to("../back.php");
//   }
$User->to("../back.php?go=my_vote");
}else{
    $User->to("../index.php?go=sign_in&&err=帳號或密碼錯誤");
}