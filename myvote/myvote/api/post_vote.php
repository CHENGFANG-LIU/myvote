<?php
include_once("../common.php");
$image='';
if(!empty($_FILES['img']['tmp_name'])){
    if(in_array($_FILES['img']['type'],['image/jpeg','image/png','image/gif'])){
        move_uploaded_file($_FILES['img']['tmp_name'],'../upload/'.$_FILES['img']['name']);
        $image=$_FILES['img']['name'];
    }else{
        header("location:../backend.php?do=add_vote&error=非圖片格式");
        exit();
    }
}

$Topics->save(
    [
        'subject'=>$_POST['subject'],
        'user_id'=>$_POST['user_id'],
        'start_time'=>$_POST['start_time'],
        'stop_time'=>$_POST['stop_time'],
        'img'=>$image,
        'q_type'=>$_POST['q_type'],
    
    ]
);
$sub=$Topics->find(['subject'=>$_POST['subject']]);
print_r($sub) ;
$opts=$_POST["opt"];
print_r($opts);
foreach($opts as $value){
    $Options->save(
        [
            'topic_id'=>$sub["topic_id"],
            'opt'=>$value,
        
        ]
    );
}
$Topics->to("../back.php");