


<table style="text-align:center;align-items:center;" class="table table-hover ">
<?php
$dsn="mysql:host=localhost;charset=utf8;dbname=vote";
$pdo= new PDO($dsn,"root",'');
$t_sql="select * from `topics` ";
$rows=$pdo->query($t_sql)->fetchAll(PDO::FETCH_ASSOC);
foreach($rows as $row){


?>
    <tr>
        <td style="width:8%;">
        
            <?=$row['subject'];?>
        </td>

        <td style="width:20%;">
        <?=$row['open_time'];?>
        </td>
        <td style="width:50%;">
        <?=$row['close_time'];?>
    
        <td style="width:20%;">
        <?=$row['type'];?>
        </td>
    
    
        <td style="width:20%;">
        <a href="./back/edit_vote.php?id=<?=$row['id'];?>">修改</a>
        </td>
        <td style="width:20%;">
        <a href="">刪除</a>
        </td>
    
<?php
}
?>
</table>
