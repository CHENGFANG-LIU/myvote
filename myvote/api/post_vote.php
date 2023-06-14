<?php
$dsn="mysql:host=localhost;charset=utf8;dbname=vote";
$pdo= new PDO($dsn,"root",'');
$options=$_POST['q_option'];
foreach(){
    $sql="insert into `options` (`subject`,`opt`)values('{$_POST['subject']}','$opt')";
    $pdo->exec($sql);
}

