<?php
	include ("files/databases.php");
	ini_set('display_errors','On');
	error_reporting('E_ALL');  
	$result = mysqli_query($link, "SELECT `Design` FROM `Worker`");
	$table = "<table class='card-table2' border = 1 width = '200px' align = center>";
	$table .= '<tr><th>Вариант</th><th>Выбрать</th></tr>';
	$table .= '<tr><td>Белая тема</td><td><form action="" method="post"><input type="hidden" name="hidden" value="0" ><button class="card-button1" type="submit">Белая тема</button></form></td></tr>';
	$table .= '<tr><td>Черная тема</td><td><form action="#" method="post"><input type="hidden" name="hidden" value="1" ><button class="card-button1" type="submit">Черная тема</button></form></td></tr>';
	$table .= "</table>";
	ini_set('display_errors','On');
	error_reporting('E_ALL');
	if($_POST['hidden'] == 0) {
		while ($row = mysqli_fetch_array($result)) {
			$return1 = mysqli_query($link, "UPDATE `Worker` SET `Design` = '0'");
		}
		$kf=1;
	}
	else if($_POST['hidden'] == 1) {
		while ($row = mysqli_fetch_array($result)) {
			$return1 = mysqli_query($link, "UPDATE `Worker` SET `Design` = '1'");
		}
		$kf=0;
	}
	echo $table;
?>