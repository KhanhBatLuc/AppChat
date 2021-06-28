<?php
session_start();
include_once('../config/db.php');
$email = $_POST['email'];
$password = $_POST['password'];
// check tk mk
if(!empty($email) && !empty($password) ){
$sql = "SELECT *FROM users WHERE email = '{$email}' AND password = '{$password}'";
$result = executeResult($sql,true);
if($result>0){
    $status = "Active now";
    $sql =  "UPDATE users SET status = '{$status}' WHERE unique_id='{$result['unique_id']}'";
  if(execute($sql)){
    $_SESSION['unique_id'] = $result['unique_id'];
 
}

echo "success";
}else{
    echo "Email or Password incorect";
}

}else{

    echo "All input file required";
}
?>