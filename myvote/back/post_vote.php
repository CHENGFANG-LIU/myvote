<script src="../js/jquery-3.7.0.min.js"></script>

<form action="../api/post_vote.php" method="post">
        <div>
            <label>主題</label>
            <input name="subject">
        </div>
        <div class="time-set">
            <div>
                <label>開啟時間</label>
                <input type="datetime-local" name="openTime">
            </div>
            <div>
                <label>關閉時間</label>
                <input type="datetime-local" name="closeTime">
            </div>
        </div>
        <div >
            <div>
                <label>問題</label>
                <input name="q">
            </div>
            <div>
                <label>單複選</label>
                <input name="q_type">
            </div>
            <div class="options">        
                <div>
                    <label for="description">項目：</label>
                    <input type="text" name="q_option[]"  class="description-input">
                    <span onclick="addOption()">+</span>
                    <span onclick="removeOption(this)">-</span>
                </div>
            </div>
        </div>
        
        
        
        
        <div>
            <input type="submit" value="新增文章">
        </div>
        
    </form>
    
<script>

function addOption(){
    let opt=`<div>
                <label for="description">項目：</label>
                <input type="text" name="description[]"  class="description-input">
                <span onclick="addOption()">+</span>
                <span onclick="removeOption(this)">-</span>
            </div>`
    $(".options").append(opt);    
}

function removeOption(el){
    let dom=$(el).parent()
    $(dom).remove();
}

</script>
