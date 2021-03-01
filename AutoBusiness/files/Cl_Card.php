<?php
	include ("databases.php");
	ini_set('display_errors','Off');
	error_reporting('E_ALL');

	$Cl_Card_Email = $_POST['Cl_Card_Email'];
	$result1 = mysqli_query($link, "SELECT Cl_ID FROM `Client` WHERE Cl_Email='$Cl_Card_Email'");
	$Cl_Card_ID = mysqli_fetch_array($result1);
	$ID1 = $Cl_Card_ID['Cl_ID'];
	$result = mysqli_query($link, "SELECT `Auto`, `Auto_Num`, `Problem`, `Ord_ID`, `Date_Start`, `Date_End`, `Status`, `Price` FROM `Orders` WHERE Cl_ID = '$ID1'");    
	$table = "<table class='card-table1' border = 1 width = '1000px' align = center>";
	$table .= "<tr >";
	$table .= "<th >" . 'ID Заказа' . "</th>";
	$table .= "<th >" . 'Автомобиль' . "</th>";
	$table .= "<th >" . 'Номер автомобиля' . "</th>";
	$table .= "<th >" . 'Проблема' . "</th>";
	$table .= "<th >" . 'Дата начала' . "</th>";
	$table .= "<th >" . 'Дата окончания' . "</th>";
	$table .= "<th >" . 'Статус' . "</th>";
	$table .= "<th >" . 'Цена' . "</th>";
	$table .= "</tr>";
	while($row = mysqli_fetch_array($result)) {
			$table .= "<tr >";
			$table .= "<td >" . $row['Ord_ID'] . "</td>";
			$table .= "<td >" . $row['Auto'] . "</td>";
			$table .= "<td >" . $row['Auto_Num'] . "</td>";
			$table .= "<td >" . $row['Problem'] . "</td>";
			$table .= "<td >" . $row['Date_Start'] . "</td>";
			$table .= "<td >" . $row['Date_End'] . "</td>";
			if ($row['Status'] == 0){
				$table .= "<td >" . 'Автомобиль еще чинится' . "</td>";
			}
			else {
				$table .= "<td >" . 'Автомобиль выдан' . "</td>";
			}
			$table .= "<td >" . $row['Price'] . ' Рублей' . "</td>";
			$table .= "</tr>";
	}
	$table .= "</table>";
	echo $table;
?>