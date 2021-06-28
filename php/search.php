<?php
session_start();
include_once('../config/db.php');
$outgoing_id = $_SESSION['unique_id'];
 $searchd = $_POST['search'];
$sql = "SELECT * FROM users WHERE fname  LIKE '%{$searchd}%' OR lname  LIKE '%{$searchd}%' ";
$kq = executeRows($sql);
$output = "";
if($kq>0){
    include_once "data.php";
}
else{
    $output.= "Do not see the result";
}

echo $output; 
?>