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
	    		<link rel="stylesheet" type="text/css" href="css/wr_wh.css">
	    <?php
	    	}
	    	else {
	    ?>
	    		<link rel="stylesheet" type="text/css" href="css/wr_bl.css">
	    <?php
	    	}
	    ?>
	</head>
	<body>
		<?php
			ini_set('display_errors','On');
			error_reporting('E_ALL'); 
			if ($_SESSION['auth'] == 4){
		?>
		<div class="card">
			<h1 class="card-title">Подсистема учета склада</h1>
			<a class="card-label" href="index.php">Назад</a>
		</div>
		<div class="card">
			<h2 class="card-zagl">Все детали</h2>
			<div class="add">
				<?php
					include ("files/Echo_detail.php");
				?>
			</div>
		</div>
		<div class="card">
			<h3 class="card-zagl">Составить отчет</h3>
			<div>
				<form action="" class="card-form" method="post">
					<label class="card-label">Начальная дата:</label>
					<input class="card-input" name="Start_date" type="date" class="input" placeholder="Начальная дата" required>
					<label class="card-label">Конечная дата:</label>
					<input class="card-input" name="End_date" type="date" class="input" placeholder="Конечная дата" required>

					<button class="card-button1" type="submit">Составить отчет</button>
				</form>
				<div class="add">
					<?php
						include ("files/Wr_report.php")
					?>
				</div>
			</div>
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