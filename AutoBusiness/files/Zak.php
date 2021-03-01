<?php
	include ("databases.php");
	ini_set('display_errors','On');
	error_reporting('E_ALL');  
	$Zak_Det = $_POST['Zak_Det'];
	$Zak_Quan = $_POST['Zak_Quan'];
	$Zak_Price = $_POST['Zak_Price'];
	$result = mysqli_query($link, "SELECT Detail FROM Warehouse WHERE Detail='$Zak_Det'");    
	$Check = mysqli_fetch_assoc($result);
	$today = date("Y-m-d");
	if (!empty($Check)){
		$query1 = mysqli_query($link, "UPDATE Warehouse SET Quantity=Quantity+'$Zak_Quan' WHERE Detail='$Zak_Det'");
		$query2 = mysqli_query($link, "INSERT INTO Detail_st(Detail, Add_det, `Date`, Cost_buy) VALUES ('$Zak_Det', '$Zak_Quan', '$today', '$Zak_Price')");
	}
	else if (!empty($Zak_Det)){
		$query3 = mysqli_query($link, "INSERT INTO Warehouse(Detail, Quantity) VALUES ('$Zak_Det', '$Zak_Quan')");
		$query4 = mysqli_query($link, "INSERT INTO Detail_st(Detail, Add_det, `Date`, Cost_buy) VALUES ('$Zak_Det', '$Zak_Quan', '$today', '$Zak_Price')");
	}
?>