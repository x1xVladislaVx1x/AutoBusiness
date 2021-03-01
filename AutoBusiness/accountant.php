<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="ru">
	<head>
	    <meta charset="UTF-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	    <title>Auto</title>
	    <?php
	   		include ("files/databases.php");
	    	$result123 = mysqli_query($link,"SELECT `Design` FROM `Worker` WHERE Wr_ID = '5'");
	    	$I123 = mysqli_fetch_array($result123);
	    	if ($I123['Design'] == 0 || $kf==1){
	    		$kf=0;
	    ?>
	    		<link rel="stylesheet" type="text/css" href="css/mngr_wh.css">
	    <?php
	    	}
	    	else {
	    ?>
	    		<link rel="stylesheet" type="text/css" href="css/mngr_bl.css">
	    <?php
	    	}
	    ?>
	</head>
	<body>
		<?php
			ini_set('display_errors','On');
			error_reporting('E_ALL'); 
			if ($_SESSION['auth'] == 2){
		?>
		<div class="card">
			<h1 class="card-title">Подсистема Бухгалтера</h1>
			<a class="card-label" href="index.php">Назад</a>
		</div>
		<div class="card">
			<h2 class="card-zagl">Составить отчет</h2>
			<form class="card-form" action="" method="post">
				<input class="card-input" name="SD" type="date" placeholder="С какой даты" required>
				<input class="card-input" name="TD" type="date" placeholder="По какую" required>

				<button class="card-button1" type="submit">Составить отчет</button>
			</form>
			<div class="add3">
				<label class="card-label">Таблица убытков на детали</label>
				<?php
					include ("files/I_Ustal.php");
				?>
			</div>
			<div class="add2">
				<label class="card-label">Таблица прибыли</label>
				<?php
					include ("files/I_Ustal2.php");
				?>
			</div>
		</div>
		<div class="card">
			<h2 class="card-zagl">Итоговое положение дел</h2>
			<label class="card-label">
				<?php 
					$Itog = $_SESSION['Dox']-$_SESSION['Ras'];
					if ($Itog > 0){
						echo 'Наша компания в прибыле на ' . "$Itog" . ' Рублей';
					}
					else if ($Itog < 0){
						echo 'Наша компания в убытке на ' . -$Itog . ' Рублей';
					}
					else {
						echo 'Наша компания ничего не заработала и не потратила';
					}
				?>	
			</label>
		</div>
		<?php
			}
			else {
		?>
			<div class="card">
				<h1 class="card-title">Вы не авторизованы</h1>
				<a class="card-label" href="index.php">Назад</a>
			</div>
		<?php
			}
		?>
	</body>
</html>