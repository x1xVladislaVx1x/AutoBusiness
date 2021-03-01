<?php 
	include ("databases.php");
	ini_set('display_errors','On');
	error_reporting('E_ALL');  
	$Cl_Name = $_POST['Cl_Name'];
	$Cl_Surn = $_POST['Cl_Surn'];
	$Cl_Phone = $_POST['Cl_Phone'];
	$Cl_Email = $_POST['Cl_Email'];
	$result = mysqli_query($link, "SELECT Cl_Email FROM Client WHERE Cl_Email='$Cl_Email'");
	$Check = mysqli_fetch_assoc($result);
	if (empty($Check) && $_POST['Hidden']==1){
		$resultAdd = mysqli_query($link, "INSERT INTO Client(Cl_Name, Cl_Surn, Cl_Phone, Cl_Email) VALUES ('$Cl_Name', '$Cl_Surn', '$Cl_Phone', '$Cl_Email')");
		header('Location: manager.php');
		exit();
	}
?>