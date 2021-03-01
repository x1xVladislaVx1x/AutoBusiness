<?php
	include ("databases.php");  
	ini_set('display_errors','Off');
	error_reporting('E_ALL');
	$count1 = 0;
	$count2 = 0;
	$SD = $_POST['SD'];
	$TD = $_POST['TD'];
	$result = mysqli_query($link,"SELECT * FROM `Orders` WHERE `Date_Start` BETWEEN '$SD' AND '$TD'");           
	$table = "<table class='card-table1' border = 1 width = '1000px' align = center>";
	$table .= "<tr >";
	$table .= "<th >" . 'Автомобиль' . "</th>";
	$table .= "<th >" . 'Автомобильный номер' . "</th>";
	$table .= "<th >" . 'Дата начала' . "</th>";
	$table .= "<th >" . 'Дата окончания' . "</th>";
	$table .= "<th >" . 'Выручка' . "</th>";
	$table .= "</tr>";
	while($row = mysqli_fetch_array($result)) {
			$count2 = $count2 + $row['Price'];
			$table .= "<tr >";
			$table .= "<td >" . $row['Auto'] . "</td>";
			$table .= "<td >" . $row['Auto_Num'] . "</td>";
			$table .= "<td >" . $row['Date_Start'] . "</td>";
			$table .= "<td >" . $row['Date_End'] . "</td>";
			$table .= "<td >" . $row['Price'] . "</td>";
			$table .= "</tr>";
	}
	$table .= "</table>";
	echo $table;
	echo '<label class="card-label">Всего выручено: ' . $count2 . ' Рублей</label>';
	$_SESSION['Dox'] = $count2;
?>