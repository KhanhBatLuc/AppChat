<?php
require_once('config.php');

/**
* Su dung cho cac lenh: insert, update, delete
*/
function execute($sql) {
	$check = false;
	//Mo ket noi toi database
	$conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
	mysqli_set_charset($conn, 'utf8');

	//query
	mysqli_query($conn, $sql);
	$check = true;
	//Dong ket noi
	mysqli_close($conn);
	return $check ;
}

/**
* Su dung cho cac lenh: select
*/
function executeResult($sql, $onlyOne = false) {
	//Mo ket noi toi database
	$conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
	mysqli_set_charset($conn, 'utf8');

	//query
	$resultset = mysqli_query($conn, $sql);

	if($onlyOne==true) {
		$data = mysqli_fetch_array($resultset, 1);
	} else {
		$data = [];
		while(($row = mysqli_fetch_array($resultset, 1)) != null) {
			$data[] = $row;
		}
	}
	//Dong ket noi
	mysqli_close($conn);

	return $data;
}
function executeRows($sql){
	$conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
	mysqli_set_charset($conn, 'utf8');
	if($resultset = mysqli_query($conn, $sql)){
		$row = mysqli_num_rows($resultset);
	}
	mysqli_close($conn);
	return $row;
}