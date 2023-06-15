<script src="../js/jquery-3.7.0.min.js"></script>
<?php



$rows = $Topics->all(['topic_id' => $_GET['id']]);

$op_sql = "select * from `options` where `id` = '{$_GET['id']}'";
$op_rows = $Options->all(['topic_id' => $_GET['id']]);





?>

<form action="./api/edit_vote.php" method="post">
<?php echo $rows[0]['topic_id'] ?>
    <input type="hidden" name="topic_id" value="<?= $rows[0]['topic_id'] ?>">
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">主題</label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="subject" value="<?= $rows[0]['subject'] ?>">
    </div>
    <div class="time-set">
        <div>
            <label>開啟時間</label>
            <input type="datetime-local" name="start_time" value="<?= $rows[0]['start_time'] ?>">
        </div>
        <div>
            <label>關閉時間</label>
            <input type="datetime-local" name="stop_time" value="<?= $rows[0]['stop_time'] ?>">
        </div>
    </div>

    <div class="mb-3">
            <label for="type">單複選：</label>
            <input type="radio" name="q_type" value="1" <?php if($rows[0]['q_type']==1){echo "checked";} ?>>單選&nbsp;&nbsp;
            <input type="radio" name="q_type" value="2" <?php if($rows[0]['q_type']==2){echo "checked";} ?>>複選
        

    <div class="options">
    <?php
foreach($op_rows as $opt){
    
?>
        <div>
            <input type="hidden" name="opt_id[]" value="<?=$opt['opt_id']?>">
            <label for="description">項目：</label>
            <input type="text" name="opt[]" class="description-input" value="<?= $opt['opt']?>">
            <span onclick="addOption()">+</span>
            <span onclick="removeOption(this)">-</span>
        </div>
        <?php
}
    ?>
    </div>
    
    </br>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>



<script>
    function addOption() {
        let opt = `<div>
                <label for="description">項目：</label>
                <input type="text" name="opt[]"  class="description-input">
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