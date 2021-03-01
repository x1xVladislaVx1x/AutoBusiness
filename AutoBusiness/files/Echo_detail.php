<?php
	include ("databases.php");  
	ini_set('display_errors','On');
	error_reporting('E_ALL');
	$result = mysqli_query($link,"SELECT * FROM `Warehouse`");           
	$table = "<table class='card-table' border = 1 width = '1000px' align = center>";
	$table .= "<tr >";
	$table .= "<th >" . 'Название детали' . "</th>";
	$table .= "<th >" . 'Количество деталей' . "</th>";
	$table .= "</tr>";
	while($row = mysqli_fetch_array($result)) {
			$table .= "<tr >";
			$table .= "<td >" . $row['Detail'] . "</td>";
			$table .= "<td >" . $row['Quantity'] . "</td>";
			$table .= "</tr>";
	}
	$table .= "</table>";
	echo $table;
?>