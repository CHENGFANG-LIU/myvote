<?php
$dsn="mysql:host=localhost;charset=utf8;dbname=myvote";
$pdo= new PDO($dsn,"root",'');
$opt=serialize($_POST['q_option']);
$sql="insert into `topics` (`subject`,`opt`)values('{$_POST['subject']}','$opt')";
$pdo->exec($sql);