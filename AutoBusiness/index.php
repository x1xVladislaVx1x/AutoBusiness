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
	    		<link rel="stylesheet" type="text/css" href="css/index_wh.css">
	    <?php
	    	}
	    	else {
	    ?>
	    		<link rel="stylesheet" type="text/css" href="css/index_bl.css">
	    <?php
	    	}
	    ?>
	</head>
	<body>
		<div class="card">
			<h1 class="card-title">ВХОД</h1>
			<?php
				include ("files/Auth.php"); 
			?>
			<form class="card-form" action="#" method="post">
				<h2 class="card-log-pass">Введите Вашу почту</h2>
				<input name="auth_email" type="email" required class="card-input" placeholder="Введите Вашу почту">
				<h3 class="card-log-pass">Введите Ваш пароль</h3>
				<input name="auth_pass" type="password" required class="card-input" placeholder="Введите Ваш пароль">
				<button class="card-button" type="submit" name="form_auth_submit">Войти</button>
			</form>
			<form class="card-form" action="reg.php">
				<button class="card-button" type="submit" name="form_auth_submit">Зарегистрироваться</button>
			</form>
			<?php
		    	if ($k1 == true){
		    ?>
		   	<h4 class="card-label">Данные введены верно, но у вас нет роли</h4>
		   	<?php
		   		}
		   		else if ($k == true){
		   	?>
		   	<h5 class="card-label">Неверная почта или пароль</h5>
		   	<?php
		   		}
		   	?>
		</div>
		
	</body>
</html>
