<h1>會員權限管理</h1>


<?php
$mems=$User->all();

?>
<table class="system-admin">
    <tr>
        <td>會員</td>
        <td>權限</td>
        <td>操作</td>
    </tr>
<?php
foreach($mems as $mem){
?>
    <form action="./api/change_pr.php" method="post">
<tr>
        <td><?=$mem['name'];?></td>
        <td>
            <select name="pr">
                <option value="2" <?=($mem['pr']=='2')?'selected':'';?>>管理員</option>
                <option value="1" <?=($mem['pr']=='1')?'selected':'';?>>發文者</option>
                <option value="0" <?=($mem['pr']=='0')?'selected':'';?>>會員</option>
            </select>
        </td>
        <td>
            <input type="hidden" name="user_id" value="<?=$mem['user_id'];?>">
            <button type="submit">編輯</button>
            <button type="button"><a href="./api/delete_user.php?user_id=<?=$mem['user_id'];?>">刪除</a></button>
        </td>
    </tr>
</form>


<?php
}
?>
</table>