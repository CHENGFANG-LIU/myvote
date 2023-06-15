<?php
session_start();


class DB {

    public $dsn="mysql:host=localhost;charset=utf8;dbname=myvote";
    public $table;
    protected $user = "root";
    protected $pw = "";
    protected $pdo;
    protected $result;
    
    function __construct($table)
    {
        $this->table = $table;
        $this->pdo = new PDO($this->dsn, $this->user, $this->pw);
    }

    
    function save($cols){
        if(isset($cols['id'])){
            //update
            foreach($cols as $key => $value){
                if($key!='id'){
                    $tmp[]= "`$key`='$value'";
                }
            }
        
            $sql="update `$this->table` set  ".join(",",$tmp)." where `id`='{$cols['id']}'";

            return $this->pdo->exec($sql);
        }else{
            //insert
            $keys=array_keys($cols);
            $sql="insert into $this->table (`" . join("`,`", $keys) . "`) values('".join("','",$cols)."')";
                echo $sql;
            return $this->pdo->exec($sql);
        }
    }
    function topic_update($cols){
        foreach($cols as $key => $value){
            if($key!='topic_id'){
                $tmp[]= "`$key`='$value'";
            }
        }
    
        $sql="update `$this->table` set  ".join(",",$tmp)." where `topic_id`='{$cols['topic_id']}'";

        return $this->pdo->exec($sql);
    }
    function all(...$arg)
    {
        $sql = "select * from $this->table ";

        if (!empty($arg)) {
            if (is_array($arg[0])) {
                foreach ($arg[0] as $key => $value) {

                    $tmp[] = "`$key`='$value'";
                }

                $sql = $sql .  " where " . join(" && ", $tmp);
            } else {

                $sql = $sql .  $arg[0];
            }
        }

        if (isset($arg[1])) {
            $sql = $sql .  $arg[1];
        }
        //echo $sql;
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
    function find($arg)
    {
        $sql = "select * from `$this->table`  where ";

        if (is_array($arg)) {
            foreach ($arg as $key => $value) {

                $tmp[] = "`$key`='$value'";
            }

            $sql .= join(" && ", $tmp);
        } else {

            $sql .= " `id` = '$arg' ";
        }

        //echo $sql;
        $this->result=$this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
        return $this->result;
    }
    function delete(...$arg){
        $sql = "delete from $this->table  ";

        if (!empty($arg)) {
            if (is_array($arg[0])) {
                foreach ($arg[0] as $key => $value) {

                    $tmp[] = "`$key`='$value'";
                }

                $sql = $sql .  " where " . join(" && ", $tmp);
            } else {

                $sql = $sql .  $arg[0];
            }
        }

        if (isset($arg[1])) {
            $sql = $sql .  $arg[1];
        }
        //echo $sql;
        return $this->pdo->exec($sql);
    }
    function q($sql){
        // $dsn="mysql:host=localhost;charset=utf8;dbname=myvote";
        $pdo=new PDO($this->dsn,'root','');
    
        return $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
    function to($url){
        header("location:".$url);
        
    }
    
    function validate(){
        // echo $_SESSION["pr"];
        // echo $_SESSION["user_id"];
        // echo $_SESSION["email"];
        $check=$this->q("select count(*) from `user` where `email`='{$_SESSION["email"]}' && `pr`='{$_SESSION["pr"]}' && `user_id`='{$_SESSION["user_id"]}'");
        // print_r($check[0]["count(*)"]);
        
        if($check[0]["count(*)"]==0){
            unset($_SESSION['user_id']);
            unset($_SESSION['email']);
            unset($_SESSION['pr']);
            echo "請先登入";
        }
    }

}




class OPT extends DB{
    
    function update($cols){
        foreach($cols as $key => $value){
            if($key!='topic_id'){
                $tmp[]= "`$key`='$value'";
            }
        }
    
        $sql="update `$this->table` set  ".join(",",$tmp)." where `topic_id`='{$cols['topic_id']}'";

        return $this->pdo->exec($sql);
    }
}

class USER extends DB{
    protected $id="user_id";
    function update($cols){
        foreach($cols as $key => $value){
            if($key!="$this->id"){
                $tmp[]= "`$key`='$value'";
            }
        }
    
        $sql="update `$this->table` set  ".join(",",$tmp)." where `$this->id`='{$cols[$this->id]}'";

        return $this->pdo->exec($sql);
    }
}




$Topics=new DB('topics');
// echo "<h1>123</h1>";
// echo $topics->table;
$User=new USER("user");


$Options=new OPT("options");

