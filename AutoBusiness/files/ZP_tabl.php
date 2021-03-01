<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="ru">
	<head>
	    <meta charset="UTF-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	    <title>Auto</title>
	    <link rel="stylesheet" type="text/css" href="css/manager.css">
	</head>
	<body>
		<div class="card">
			<h1 class="card-title">Подсистема менеджера</h1>
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
			<h3 class="card-zagl">Просмотр карточки клиента</h3>
		</div>
	</body>
</html>