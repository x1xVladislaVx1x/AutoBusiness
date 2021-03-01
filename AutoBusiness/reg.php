<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Регистрация</title>
        <?php
            include ("files/databases.php");
            $result123 = mysqli_query($link,"SELECT `Design` FROM `Worker` WHERE Wr_ID = '5'");
            $I123 = mysqli_fetch_array($result123);
            if ($I123['Design'] == 0 || $kf==1){
                $kf=0;
        ?>
                <link rel="stylesheet" type="text/css" href="css/reg_wh.css">
        <?php
            }
            else {
        ?>
                <link rel="stylesheet" type="text/css" href="css/reg_bl.css">
        <?php
            }
        ?>
    </head>
    <body>
        <div class="card">
            <h1 class="card-title">РЕГИСТРАЦИЯ</h1>
            <?php
            include ("files/databases.php");
            ini_set('display_errors','Off');
            error_reporting('E_ALL');
            $password = $_POST['Pas'];
            $email = $_POST['email'];
            $Midl = $_POST['Midl'];
            $Name = $_POST['Name'];
            $Surn = $_POST['Surn'];
            $queryCheck = "SELECT Wr_Email, Design FROM Worker";
            $resultCheck = mysqli_query($link, $queryCheck);
            while ($rowCheck = mysqli_fetch_array($resultCheck)){
                if ($rowCheck['Wr_Email'] == $email){
                    $checker = true; 
                }
                $LOGOCheck = $rowCheck['Design'];
            }
            if ($_POST['hidden'] == 1){
                if ($checker == true){
                    echo 'Данная почта уже используется';
                }
                else {
                    $pswrdHASH = password_hash($password, PASSWORD_DEFAULT);

                    $queryPass = "INSERT INTO `Worker`(`Pass`, `Wr_Name`, `Wr_Surn`, `Wr_MN`, `Wr_Email`, `Design`) VALUES ('$pswrdHASH', '$Name', '$Surn', '$Midl', '$email', '$LOGOCheck')";
                    $resultPass = mysqli_query($link, $queryPass);
                    header("Location: index.php"); 
                }
            }
            ?>
            <form action="#" method="post">
                <input name="Surn" required class="card-input" placeholder="Введите Вашу фамилию">
                <input name="Name" required class="card-input" placeholder="Введите Ваше имя">
                <input name="Midl" class="card-input" placeholder="Введите Ваше отчество">
                <input type="email" name="email" required class="card-input" placeholder="Введите Вашу почту">
                <input name="Pas" required class="card-input" placeholder="Введите Ваш пароль">
                <input type="hidden" name="hidden" value="1">
                <button class="card-button" type="submit">Зарегистрироваться</button>
            </form>
            <form action="index.php">
                <button class="card-button" type="submit">Назад</button>
            </form>
        </div>
    </body>
</html>