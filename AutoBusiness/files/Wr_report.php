<?php
	include ("databases.php");  
	ini_set('display_errors','Off');
	error_reporting('E_ALL');
	$Start_date = $_POST['Start_date'];
	$End_date = $_POST['End_date'];
	$result = mysqli_query($link,"SELECT * FROM `Detail_st` WHERE `Date` BETWEEN '$Start_date' AND '$End_date'");           
	$table = "<table class='card-table1' border = 1 width = '1000px' align = center>";
	$table .= "<tr >";
	$table .= "<th >" . 'Название детали' . "</th>";
	$table .= "<th >" . 'Количество купленных деталей' . "</th>";
	$table .= "<th >" . 'Количество потраченных деталей' . "</th>";
	$table .= "<th >" . 'Цена покупки за 1 штуку' . "</th>";
	$table .= "<th >" . 'Дата сделки' . "</th>";
	$table .= "</tr>";
	while($row = mysqli_fetch_array($result)) {
			$table .= "<tr >";
			$table .= "<td >" . $row['Detail'] . "</td>";
			$table .= "<td >" . $row['Add_det'] . "</td>";
			$table .= "<td >" . $row['Delete_det'] . "</td>";
			$table .= "<td >" . $row['Cost_buy'] . ' ' . 'Рублей' . "</td>";
			$table .= "<td >" . $row['Date'] . "</td>";
			$table .= "</tr>";
	}
	$table .= "</table>";
	echo $table;
?>