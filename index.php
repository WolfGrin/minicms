<?php
    /**
     * Created by PhpStorm.
     * User: WolfGrin
     * Date: 27.03.2017
     * Time: 22:24
     */
    //открываем сессию
    session_start();
    header("Content-Type: text/html; charset=utf-8");

    require_once("config.php");

    //автоматическая загрузка классов. Функция ызывается если была попытка создать класс,
    //который еще небыл подключен к текущему файлу
    function __autoload($c) {
        if (file_exists("controller/".$c.".php")) {
            require_once "controller/".$c.".php";
        }
        elseif (file_exists("model/".$c.".php")) {
            require_once "model/".$c.".php";
        }
        else {
            exit("<p>Не правильный адресс!</p>");
        }
    }

    //проверяем есть ли в массиве GET, переменная option
    if(!empty($_GET['option'])) {
        $class = trim(strip_tags($_GET['option']));
    }
    //если нет, по умолчанию переходим на главную страницу
    else {
        $class = 'main';
    }

    //проверяем существует ли в классе (файле), метод переданый в option
    if(class_exists($class)) {

        //создаем объект запрашиваемого класса
        $obj = new $class;
        $obj->get_body($class); //передаем в едро название загружаемого шаблона
    }
    else {
        exit("<p>Не правильные данные для входа!</p>");
    }

?>