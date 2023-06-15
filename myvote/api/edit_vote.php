<?php 
include_once "../db.php";

// $sql="update `topics` 
//          set  `subject`='{$_POST['subject']}',
//               `open_time`='{$_POST['open_time']}',
//               `close_time`='{$_POST['close_time']}',
//               `type`='{$_POST['type']}',
//               `login`='{$_POST['login']}'
//        where `id`='{$_POST['subject_id']}'";

// $pdo->exec($sql);
// $Topics->save([
//     'subject'=>$_POST['subject'],
//     'start_time'=>$_POST['start_time'],
//     'stop_time'=>$_POST['stop_time'],
//     'q_type'=>$_POST['q_type'],

// ]);

// $Options->q("select `opt_id` from `options` where `topic_id`='{$_POST['topic_id']}'");


// if(!empty($options)){
//     if(isset($_POST['opt_id'])){

       
//         foreach($options as $opt){

           
//             if(!in_array($opt['id'],$_POST['opt_id'])){
//                $pdo->exec("delete from `options` where `id`='{$opt['id']}'");
//             }
//         }
//     }else{

       
//         $pdo->exec("delete from `options` where `subject_id`='{$_POST['subject_id']}'");
//     }
// }


// if(isset($_POST['opt_id'])){
//     foreach($_POST['opt_id'] as $idx => $id){
//        $pdo->exec("update `options` set `description`='{$_POST['description'][$idx]}' where `id`='$id'");
//        unset($_POST['description'][$idx]);
//     }

// }



// if(!empty($_POST['description'])){
//     foreach($_POST['description'] as $desc){
//         $pdo->exec("insert into `options` (`description`,`subject_id`) values('$desc','{$_POST['subject_id']}')");
//     }
// }

echo "<pre>";
print_r($options);
echo "<pre>";
echo "<pre>";
print_r($_POST['opt']);
echo "<pre>";
echo "<pre>";
print_r($_POST['opt_id']);
echo "<pre>";


//  header("location:../backend.php");

