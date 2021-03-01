<?php
	include ("files/databases.php");
	ini_set('display_errors','On');
	error_reporting('E_ALL');  
	$reader_code = $_POST['login'];
	$pass = $_POST['pswrd'];
	$query = "SELECT Pass FROM Worker WHERE Wr_Email='$reader_code'";
	$result = mysqli_query($link, $query);
	$user = mysqli_fetch_assoc($result);
	if (!empty($user['Pass'])){
		$queryPass = "UPDATE `Worker` SET `Role` = '$pass' WHERE `Wr_Email` = '$reader_code'";
		$resultPass = mysqli_query($link, $queryPass);
		header("Location: admin.php");
		exit();
	}   
?>