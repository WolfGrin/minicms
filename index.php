<?php
/**
 * Created by PhpStorm.
 * User: WolfGrin
 * Date: 27.03.2017
 * Time: 22:24
 */
header("Content-Type: text/html; charset=utf-8");

require_once("config.php");
require_once("classes/ACore.php");
//проверяем есть ли в массиве GET, переменная option
if($_GET['option']) {
    $class = trim(strip_tags($_GET['option']));
}
//если нет, по умолчанию переходим на главную страницу
else {
    $class = 'main';
}

//проверяем существует ли файл-класс
if(file_exists("classes/".$class.".php")) {

    //подгружаем класс
    include("classes/".$class.".php");

    //проверяем существует ли в классе (файле), метод переданый в option
    if(class_exists($class)) {

        //создаем объект запрашиваемого класса
        $obj = new $class;
        $obj->get_body();
    }
    else {
        exit("<p>Не правильные данные для входа!</p>");
    }
}
else {
    exit("<p>Не правильный адресс!</p>");
}
?>