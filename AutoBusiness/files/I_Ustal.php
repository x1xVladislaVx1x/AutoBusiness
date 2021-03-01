<?php
	include ("databases.php");  
	ini_set('display_errors','Off');
	error_reporting('E_ALL');
	$count1 = 0;
	$count2 = 0;
	$SD = $_POST['SD'];
	$TD = $_POST['TD'];
	$result = mysqli_query($link,"SELECT * FROM `Detail_st` WHERE `Date` BETWEEN '$SD' AND '$TD'");           
	$table = "<table class='card-table1' border = 1 width = '1000px' align = center>";
	$table .= "<tr >";
	$table .= "<th >" . 'Детали' . "</th>";
	$table .= "<th >" . 'Кол-во купленных' . "</th>";
	$table .= "<th >" . 'Цена' . "</th>";
	$table .= "<th >" . 'Дата покупки' . "</th>";
	$table .= "</tr>";
	while($row = mysqli_fetch_array($result)) {
			$count1 = $count1 + $row['Cost_buy'] * $row['Add_det'];
			$table .= "<tr >";
			$table .= "<td >" . $row['Detail'] . "</td>";
			$table .= "<td >" . $row['Add_det'] . "</td>";
			$table .= "<td >" . $row['Cost_buy'] . "</td>";
			$table .= "<td >" . $row['Date'] . "</td>";
			$table .= "</tr>";
	}
	$table .= "</table>";
	echo $table;
	echo '<label class="card-label">Всего потрачено: ' . $count1 . ' Рублей</label>';
	$_SESSION['Ras'] = $count1;
?>