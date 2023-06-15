<?php 
include_once "../common.php";

$sql="update `topics` 
         set  `subject`='{$_POST['subject']}',
              `start_time`='{$_POST['start_time']}',
              `stop_time`='{$_POST['stop_time']}',
              `q_type`='{$_POST['q_type']}',
              
       where `topic_id`='{$_POST['topic_id']}'";


$Topics->topic_update([
    'subject'=>$_POST['subject'],
    'start_time'=>$_POST['start_time'],
    'stop_time'=>$_POST['stop_time'],
    'q_type'=>$_POST['q_type'],
    'topic_id'=>$_POST['topic_id']
]);

$Options->q("select `opt_id` from `options` where `topic_id`='{$_POST['topic_id']}'");


if(!empty($options)){
    if(isset($_POST['opt_id'])){

       
        foreach($options as $opt){

           
            if(!in_array($opt['id'],$_POST['opt_id'])){
               $pdo->exec("delete from `options` where `id`='{$opt['opt_id']}'");
               $Options->delete(['opt_id'=>$opt['opt_id']]);
            }
        }
    }else{

       
        $pdo->exec("delete from `options` where `subject_id`='{$_POST['subject_id']}'");
    }
}


if(isset($_POST['opt_id'])){
    foreach($_POST['opt_id'] as $idx => $id){
       $pdo->exec("update `options` set `description`='{$_POST['description'][$idx]}' where `id`='$id'");
       unset($_POST['description'][$idx]);
    }

}



if(!empty($_POST['opt'])){
    foreach($_POST['opt'] as $desc){
        $pdo->exec("insert into `options` (`opt`,`subject_id`) values('$desc','{$_POST['subject_id']}')");
    }
}

// echo "<pre>";
// print_r($options);
// echo "<pre>";
// echo "<pre>";
// print_r($_POST['opt']);
// echo "<pre>";
// echo "<pre>";
// print_r($_POST['opt_id']);
// echo "<pre>";


//  header("location:../backend.php");

