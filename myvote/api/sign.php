<?php
include_once("../common.php");
$check=$User->q("select count(*) from `user` where `email`='{$_POST['email']}'");
echo "<pre>";
print_r($check) ;
echo "</pre>";

echo $check[0]["count(*)"];
if($check[0]["count(*)"]==0){
    $User->save(['email'=>$_POST['email'],'password'=>$_POST['pw']]);
}else{
    // echo "r";
    header("location:../index.php?go=sign&sign_err=帳號重複");
}
