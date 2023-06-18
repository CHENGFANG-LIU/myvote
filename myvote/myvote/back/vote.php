<h1>投票</h1>
<?php
// 沒投過票$check_voted=0
$check_voted=[];
$topic_id=$_GET['topic_id'];

$check_voted=$Votes->find(['topic_id'=>$topic_id,'user_id'=>$_SESSION['user_id']]);


if(!empty($check_voted)){
    $Votes->to("back.php?go=vote_result&topic_id=$topic_id");
}
// echo $check_voted;
$topic=$Topics->all(['topic_id'=>$topic_id]);
$options=$Options->all(['topic_id'=>$topic_id]);

?>

<h2><?=$topic[0]["subject"]?></h2>


<form action="./api/vote.php" method="post">
    <input type="hidden" name="topic_id"value="<?=$topic_id?>">
<ul>
<?php
foreach($options as $idx => $opt){
    echo "<li>";
    switch($topic[0]['q_type']){
        case 1:
            echo "<input type='radio' name='ans[]' value='{$opt['opt']}'>";                
        break;
        case 2:        
            echo "<input type='checkbox' name='ans[]' value='{$opt['opt']}'>";
        break;
    }
    
    
    echo "<span>{$opt['opt']}</span>";
    echo "</li>";
}
?>
</ul>

<div>
    <input type="hidden" name="subject_id" value="<?=$_GET['topic_id'];?>">
    <input type="submit" value="投票">
    <input type="button" value="取消">
</div>

</form>