<?php

include_once "../common.php";
if(isset($_SESSION["tmp_topic"])){
    unset($_SESSION["tmp_topic"]);
    }
$ans=$_POST['ans'];
print_r($ans);
/* 1.單選 $_POST['desc']=3;
   2.多選 $_POST['desc']=[1,3,6]; */

$topic_id = $_POST['topic_id'];
$sql="select `q_type` from `topics` where `topic_id`='$topic_id'";
$q_type=$Topics->q($sql);


// 1是單選
switch ($q_type[0]["q_type"]) {
    case 1:
        // $Votes->save(['ans'=>$ans,'topic_id'=>$topic_id,'user_id'=>$_SESSION['user_id']]);
        foreach($ans as $an){
            $Votes->save(['ans'=>$an,'topic_id'=>$topic_id,'user_id'=>$_SESSION['user_id']]);
                        }
                    break;
        break;
    case 2:
            foreach($ans as $an){
$Votes->save(['ans'=>$an,'topic_id'=>$topic_id,'user_id'=>$_SESSION['user_id']]);
            }
        break;
    
    default:
        echo 'err';
        break;
}
$User->to("../back.php?go=vote_result&topic_id=$topic_id");