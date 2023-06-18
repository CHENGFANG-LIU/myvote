<form action="./api/post_vote.php" method="post" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">主題</label>
        <input type="text" class="form-control"  name="subject">
    </div>
    <div class="time-set">
        <div>
            <label>開啟時間</label>
            <input type="datetime-local" name="start_time">
        </div>
        <div>
            <label>關閉時間</label>
            <input type="datetime-local" name="stop_time">
        </div>
    </div>
    <div>
            <label for="img">上傳圖檔：</label>
            <input type="file" name="img" id="img">
        </div>

    <div class="mb-3">
    <label for="type">單複選：</label>
            <input type="radio" name="q_type" value="1">單選&nbsp;&nbsp;
            <input type="radio" name="q_type" value="2">複選
    </div>
    <div class="options">
        <div>
            <label for="description">項目：</label>
            <input type="text" name="opt[]" class="description-input">
            <span onclick="addOption()">+</span>
            <span onclick="removeOption(this)">-</span>
        </div>
    </div>
    
    </br>
    <input type="hidden" name="user_id" value="<?=$_SESSION['user_id']?>">

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