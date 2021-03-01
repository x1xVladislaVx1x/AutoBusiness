<?php
	$_SESSION['auth'] = 0;
	$k = false;

	include ("files/databases.php");
	ini_set('display_errors','Off');
	error_reporting('E_ALL');
	$email = $_POST['auth_email'];
	$pass = $_POST['auth_pass'];
	$query = "SELECT * FROM Worker WHERE Wr_Email='$email'";
	$result = mysqli_query($link, $query);
	$user = mysqli_fetch_assoc($result);

	if ((!empty($user)) && ($user['Role'] == 2)){
		$hash = $user['Pass'];
		if (password_verify($pass, $hash)){
			$_SESSION['auth'] = 2;
			$_SESSION['email'] = $email;
			header("Location: accountant.php"); 
			exit;
		}
		else {
			$k = true;
		}
	}
	else if ((!empty($user)) && ($user['Role'] == 3)){
		$hash = $user['Pass'];
		if (password_verify($pass, $hash)){
			$_SESSION['auth'] = 3;
			$_SESSION['email'] = $email;
			header("Location: manager.php"); 
			exit;
		}
		else {
			$k = true;
		}
	}
	else if ((!empty($user)) && ($user['Role'] == 1)){
		$hash = $user['Pass'];
		if (password_verify($pass, $hash)){
			$_SESSION['auth'] = 1;
			$_SESSION['email'] = $email;
			header("Location: admin.php"); 
			exit;
		}
		else {
			$k = true;
		}
	}
	else if ((!empty($user)) && ($user['Role'] == 4)){
		$hash = $user['Pass'];
		if (password_verify($pass, $hash)){
			$_SESSION['auth'] = 4;
			$_SESSION['email'] = $email;
			header("Location: warehouse.php"); 
			exit;
		}
		else {
			$k = true;
		}
	}
	else {
		$hash = $user['Pass'];
		if (password_verify($pass, $hash)){
			$_SESSION['auth'] = 5;
			$_SESSION['email'] = $email;
			$k1 = true;
			header("Location: index.php"); 
			exit;
		}
		else {
			$k = true;
		}
	}
?>