<?php
include_once("../common.php");
$check=$User->q("select count(*) from `user` where `email`='{$_POST['email']}'");
echo "<pre>";
print_r($check) ;
echo "</pre>";

echo $check[0]["count(*)"];
if($check[0]["count(*)"]==0){
    $User->save(['email'=>$_POST['email'],'password'=>$_POST['pw'],'name'=>$_POST['name'],'pr'=>0]);
    $User->to("../index.php?go=sign_in");
}else{
    // echo "r";
    $User->to("./index.php?go=sign&sign_err=帳號重複");
    // header("location:../index.php?go=sign&sign_err=帳號重複");
}

