<script src="../js/jquery-3.7.0.min.js"></script>
<?php

$dsn = "mysql:host=localhost;charset=utf8;dbname=vote";
$pdo = new PDO($dsn, "root", '');
$t_sql = "select * from `topics` where `id` = '{$_GET['id']}'";
$rows = $pdo->query($t_sql)->fetchAll(PDO::FETCH_ASSOC);

$op_sql = "select * from `options` where `id` = '{$_GET['id']}'";
$op_rows = $pdo->query($op_sql)->fetchAll(PDO::FETCH_ASSOC);

print_r($op_rows);



?>
<form action="../api/edit_vote.php" method="post">
    <div>
        <label>主題</label>
        <input name="subject" value="<?= $rows[0]['subject'] ?>">
    </div>
    <div class="time-set">
        <div>
            <label>開啟時間</label>
            <input type="datetime-local" name="openTime" value="<?= $rows[0]['open_time'] ?>">
        </div>
        <div>
            <label>關閉時間</label>
            <input type="datetime-local" name="closeTime" value="<?= $rows[0]['close_time'] ?>">
        </div>
    </div>


    <div>
        <label>單複選</label>
        <input name="q_type" value="<?= $rows[0]['type'] ?>">
    </div>
    <?php

    ?>
    <?php
    foreach($op_rows as $op){
    ?>
    <div class="options">
        <div>
            <input type="hidden" value="">
            <label for="description">項目：</label>
            <input type="text" name="q_option[]" class="description-input">
            <span onclick="addOption()">+</span>
            <span onclick="removeOption(this)">-</span>
        </div>
    </div>
    <?php
    };
    ?>





    <div>
        <input type="submit" value="新增文章">
    </div>

</form>

<script>
    function addOption() {
        let opt = `<div>
                <label for="description">項目：</label>
                <input type="text" name="description[]"  class="description-input">
                <span onclick="addOption()">+</span>
                <span onclick="removeOption(this)">-</span>
            </div>`
        $(".options").append(opt);
    }

    function removeOption(el) {
        let dom = $(el).parent()
        $(dom).remove();
    }
</script>