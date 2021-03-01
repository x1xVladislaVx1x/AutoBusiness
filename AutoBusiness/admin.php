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
	    	if ($I123['Design'] == 0){
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
			if ($_SESSION['auth'] == 1){
		?>
		<div class="card">
			<h1 class="card-title">Подсистема администратора</h1>
			<a class="card-label" href="index.php">Назад</a>
		</div>
		<div class="card">
			<h2 class="card-zagl">Изменение внешнего оформления сайта</h2>
			<?php
				include ("files/Vneshka.php");
			?>
		</div>
		<div class="card">
			<h3 class="card-zagl">Изменение пароль сотрудника</h3>
			<?php
				include ("files/Pass_update.php");
			?>
		</div>
		<div class="card">
			<h3 class="card-zagl">Изменение роли сотрудника</h3>
			<table class='card-table3' border = 1 width = '200px' align = center>
			<tr ><th >Изменить роль сотрудника</th></tr>
			<tr><td><form action="" method="post"><input  name="login" type="text" class="card-input" placeholder="Почта сотрудника" required><input name="pswrd" type="number" class="card-input" placeholder="Новая роль сотрудника" required><button class="card-button2" type="submit">Изменить</button></form></td></tr>
			<tr><td>1 - Администратор<br/>2 - Бухгалтер<br/>3 - Менеджер<br/>4 - Сотрудник склада</td></tr>
			</table>
			<?php
				include ("files/ZP.php");
			?>
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