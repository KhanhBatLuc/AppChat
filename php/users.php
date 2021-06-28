<?php
session_start();
include_once("../config/db.php");
$outgoing_id = $_SESSION['unique_id'];
$sql = "SELECT * FROM users ";
$output = "";
$kq = executeRows($sql);
if($kq==1){
    $output .="NO User";

}else if($kq>0){
include_once("data.php");

}
echo $output;
?>