<?php
	include ("databases.php");
	ini_set('display_errors','On');
	error_reporting('E_ALL');  
	$Ord_Model = $_POST['Ord_Model'];
	$Ord_Number = $_POST['Ord_Number'];
	$Ord_Det = $_POST['Ord_Det'];
	$Ord_Desc = $_POST['Ord_Desc'];
	$Ord_DEnd = $_POST['Ord_DEnd'];
	$Ord_Email = $_POST['Ord_Email'];
	$Ord_Price = $_POST['Ord_Price'];
	$result = mysqli_query($link, "SELECT Cl_ID, Cl_Email FROM Client WHERE Cl_Email='$Ord_Email'");
	$Check = mysqli_fetch_assoc($result);
	if (!empty($Check) && $_POST['Hidden1']==1){
		$today = date("Y-m-d");
		$Check2 = $Check['Cl_ID'];
		$resultAdd = mysqli_query($link, "INSERT INTO Orders (`Cl_ID`, `Auto`, `Auto_Num`, `Problem`, `Date_Start`, `Date_End`, `Detail`, `Price`) VALUES ('$Check2', '$Ord_Model', '$Ord_Number', '$Ord_Desc', '$today', '$Ord_DEnd', '$Ord_Det', '$Ord_Price')");
		$resultCheck = mysqli_query($link, "SELECT Quantity FROM Warehouse WHERE Detail='$Ord_Det'");
		$Check1 = mysqli_fetch_assoc($resultCheck);
		if ($Check1['Quantity']-1>0){
			$resultUpdate = mysqli_query($link, "UPDATE Warehouse SET Quantity=Quantity-1 WHERE Detail='$Ord_Det'");
			$resultInsert = mysqli_query($link, "INSERT INTO Detail_st(Detail, Delete_det, `Date`) VALUES ('$Ord_Det', '1', '$today')");
			header('Location: manager.php');
			exit();
		}
		else {
			echo 'Нужно заказать данную деталь';
		}
	}
?>