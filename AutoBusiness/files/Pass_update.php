<?php
	include ("files/databases.php");
	ini_set('display_errors','On');
	error_reporting('E_ALL');  
	$table1 = "<table class='card-table3' border = 1 width = '200px' align = center>";
	$table1 .= "<tr >";
	$table1 .= "<th >" . 'Изменить пароль сотрудника' . "</th>";
	$table1 .= "</tr>";
	$table1 .= '<tr><td><form name="1234" action="" method="post"><input name="log" type="text" class="card-input" placeholder="Почта сотрудника" required><input name="psw" type="text" class="card-input" placeholder="Пароль сотрудника" required><input class="card-button2" type="submit" value="Отправить"></form></td></tr>';
	$table1 .= "</table>";
	$reader_code = $_POST['log']; 
	$pass = $_POST['psw'];
	$query = "SELECT Pass FROM Worker WHERE Wr_Email='$reader_code'";
	$result = mysqli_query($link, $query);
	$user = mysqli_fetch_assoc($result);
	if (!empty($user['Pass'])){
		$pswHASH = password_hash($pass, PASSWORD_DEFAULT);
		$queryPass = "UPDATE `Worker` SET `Pass` = '$pswHASH' WHERE `Wr_Email` = '$reader_code'";
		$resultPass = mysqli_query($link, $queryPass);
		header("Location: admin.php");
		exit();
	}    
	echo $table1;
?>