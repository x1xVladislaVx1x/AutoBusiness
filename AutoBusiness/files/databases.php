<?php
    ini_set('error_reporting', E_ALL);
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    $db = "auto";
    $link = mysqli_connect('localhost:3306', 'vladk', 'V760Komarov');
    if(!$link)
    {
        echo "Ошибка: Невозможно установить соединение с MySQL." . PHP_EOL;
        echo "Код ошибки errno: " . mysqli_connect_errno() . PHP_EOL;
        echo "Текст ошибки error: " . mysqli_connect_error() . PHP_EOL;
        exit;
    }
    mysqli_select_db ($link, $db ) or die ("Невозможно открыть $db");
?>