<?php
session_start();
include_once('../config/db.php');
if(isset($_SESSION['unique_id'])){
    $logout = $_GET['logout_id'];
    if(isset($logout)){
        $status = "Offline now";
        $sql =  "UPDATE users SET status = '{$status}' WHERE unique_id='{$_GET['logout_id']}'";
        if(execute($sql)== true){
            session_destroy();
            header("location: ../login.php");
        }
        
    }else{
        header("location: ../users.php");
    }

}
else{
    header("location: ../login.php");
}
?>