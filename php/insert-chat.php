<?php
session_start();
if(isset($_SESSION['unique_id'])){
    include_once('../config/db.php');
    $chinhminh = $_POST['outgoing_id'];
    $ngminhmuonnhan = $_POST['incoming_id'];
    $mess = $_POST['message'];
        if(!empty($mess)){
        $sqls = "INSERT INTO messages (incoming_msg_id, outgoing_msg_id, msg)
        VALUES ('$ngminhmuonnhan' , '{$chinhminh}' , '{$mess}')";
        execute($sqls);
        echo $sqls;    }
}else{
    header('../login.php');
}
?>