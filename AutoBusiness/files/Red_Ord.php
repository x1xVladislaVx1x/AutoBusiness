<?php
	include ("databases.php");
	ini_set('display_errors','On');
	error_reporting('E_ALL');  
	$RedID = $_POST['RedID'];
	$result = mysqli_query($link, "SELECT `Ord_ID`, `Status` FROM `Orders` WHERE `Ord_ID`='$RedID'");
	$Check = mysqli_fetch_assoc($result);
	if ($Check['Status']==0){
		if (!empty($_POST['Red_Auto'])){
			$Red_Auto = $_POST['Red_Auto'];
			$sqlRed = "UPDATE `Orders` SET `Auto` = '$Red_Auto' WHERE `Ord_ID` = '$RedID'";
			$resultRN = mysqli_query($link, $sqlRed);
			header("Refresh: 0");
		}
		if (!empty($_POST['Red_AutoN'])){
			$Red_AutoN = $_POST['Red_AutoN'];
			$sqlRed = "UPDATE `Orders` SET `Auto_Num` = '$Red_AutoN' WHERE `Ord_ID` = '$RedID'";
			$resultRN = mysqli_query($link, $sqlRed);
			header("Refresh: 0");
		}
		if (!empty($_POST['Red_Problem'])){
			$Red_Problem = $_POST['Red_Problem'];
			$sqlRed = "UPDATE `Orders` SET `Problem` = '$Red_Problem' WHERE `Ord_ID` = '$RedID'";
			$resultRN = mysqli_query($link, $sqlRed);
			header("Refresh: 0");
		}
		if (!empty($_POST['Red_DEnd'])){
			$Red_DEnd = $_POST['Red_DEnd'];
			$sqlRed = "UPDATE `Orders` SET `Date_End` = '$Red_DEnd' WHERE `Ord_ID` = '$RedID'";
			$resultRN = mysqli_query($link, $sqlRed);
			header("Refresh: 0");
		}
		if (!empty($_POST['Red_Price'])){
			$Red_Price = $_POST['Red_Price'];
			$sqlRed = "UPDATE `Orders` SET `Price` = '$Red_Price' WHERE `Ord_ID` = '$RedID'";
			$resultRN = mysqli_query($link, $sqlRed);
			header("Refresh: 0");
		}
	}
	else {
		echo 'Данного заказа не существует или он уже выполнен';
	}
?>