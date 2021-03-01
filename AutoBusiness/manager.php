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
			if ($_SESSION['auth'] == 3){
		?>
		<div class="card">
			<h1 class="card-title">Подсистема менеджера</h1>
			<a class="card-label" href="index.php">Назад</a>
		</div>
		<div class="card">
			<h2 class="card-zagl">Создание карточки клиента</h2>
			<form action="" method="post">
				<input class="card-input" name="Cl_Name" type="text" placeholder="Введите имя" required>
				<input class="card-input" name="Cl_Surn" type="text" placeholder="Введите фамилию" required>
				<input class="card-input" name="Cl_Phone" type="tel" placeholder="Введите телефон" required>
				<input class="card-input" name="Cl_Email" type="email" placeholder="Введите почту" required>
				<input name="Hidden" type="hidden" value=1>

				<button class="card-button1" type="submit">Создать аккаунт</button>
			</form>
			<?php
				include ("files/Cl_add.php");
			?>
		</div>
		<div class="card">
			<h3 class="card-zagl">Создание заказа</h3>
			<form action="" method="post">
				<input class="card-input" name="Ord_Model" type="text" placeholder="Введите модель автомобиля" required>
				<input class="card-input" name="Ord_Number" type="text" placeholder="Введите номер авто" required>
				<input class="card-input" name="Ord_Det" type="text" placeholder="Введите нужную деталь" required>
				<input class="card-input" name="Ord_Desc" type="text" placeholder="Опишите проблему" required>
				<label class="card-label">Введите дату окончания:</label>
				<input class="card-input" name="Ord_DEnd" type="date" placeholder="Дата окончания" required>
				<input class="card-input" name="Ord_Email" type="text" placeholder="Введите почту" required>
				<input class="card-input" name="Ord_Price" type="number" placeholder="Введите цену" required>
				<input name="Hidden1" type="hidden" value=1>

				<button class="card-button1" type="submit">Создать заказ</button>
			</form>
			<?php
				include ("files/Ord_add.php");
			?>
		</div>
		<div class="card">
			<h3 class="card-zagl">Просмотр карточки клиента</h3>
			<form class="card-form" action="" method="post">
				<input class="card-input" name="Cl_Card_Email" type="email" placeholder="Введите почту клиента" required>
				<button class="card-button1" type="submit">Найти</button>
			</form>
			<div class="add">
				<?php
					include ("files/Cl_Card.php");
				?>
			</div>
		</div>
		<div class="card">
			<h3 class="card-zagl">Редактирование заказа</h3>
			<form class="card-form" action="" method="post">
				<input class="card-input" name="RedID" type="number" placeholder="Введите ID заказа" required>
				<input class="card-input" name="Red_Auto" type="text" placeholder="Изменить автомобиль">
				<input class="card-input" name="Red_AutoN" type="text" placeholder="Изменить номера">
				<input class="card-input" name="Red_Problem" type="text" placeholder="Изменить проблему">
				<input class="card-input" name="Red_DEnd" type="date" placeholder="Изменить дату окончания">
				<input class="card-input" name="Red_Price" type="number" placeholder="Изменить цену">
				<button class="card-button1" type="submit">Найти и изменить</button>
			</form>
			<?php
				include ("files/Red_Ord.php")
			?>
		</div>
		<div class="card">
			<h3 class="card-zagl">Заказывать детали</h3>
			<form class="card-form" action="" method="post">
				<input class="card-input" name="Zak_Det" type="text" placeholder="Деталь" required>
				<input class="card-input" name="Zak_Quan" type="number" placeholder="Количество деталей">
				<input class="card-input" name="Zak_Price" type="number" placeholder="Цена на деталь">
				<button class="card-button1" type="submit">Заказать</button>
			</form>
			<?php
				include ("files/Zak.php")
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