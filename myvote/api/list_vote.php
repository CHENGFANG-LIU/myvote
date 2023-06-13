<?php
$dsn="mysql:host=localhost;charset=utf8;dbname=myvote";
$pdo= new PDO($dsn,"root",'');
$sql="select * from `topics`";
$rows=$pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
echo "<pre>";
print_r($rows);
echo "</pre>";
print_r(unserialize($rows[1]["opt"])); 
