


<table style="text-align:center;align-items:center;" class="table table-hover ">
<?php


$rows=$Topics->all();
foreach($rows as $row){


?>
    <tr>
        <td style="width:8%;">
        
            <?=$row['subject'];?>
        </td>

        <td style="width:10%;">
        <?=$row['start_time'];?>
        </td>
        <td style="width:10%;">
        <?=$row['stop_time'];?>
        
        </td>
        <td style="width:20%;">
        <a href="./api/now_start.php?id=<?=$row['topic_id'];?>">立即上架</a>
        </td>
        <td style="width:20%;">
        <a href="./api/now_stop.php?id=<?=$row['topic_id'];?>">立即下架</a>
        </td>
    
        <td style="width:20%;">
        <a href="./back.php?go=edit_vote&id=<?=$row['topic_id'];?>">修改</a>
        </td>
        <td style="width:20%;">
        <a href="./api/delete_vote.php?topic_id=<?=$row['topic_id'];?>">刪除</a>
        </td>
    
<?php
}

?>
</table>