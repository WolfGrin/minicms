<?php

/**
 * Created by PhpStorm.
 * User: WolfGrin
 * Date: 27.03.2017
 * Time: 22:40
 */

abstract class ACore
{
    //дескриптор БД
    protected $db;
    //метод вывода хедера
    protected function get_header () {
        include "./header.php";
    }
    //метод вывода левой панели
    protected function get_left_bar () {
        $query = "SELECT id, name_category FROM category";
        $result = mysqli_query($this->db, $query);
        if(!$result) {
            exit("Не удалось обрабботать запрос - ".mysqli_error($this->db));
        }

        $row = array();
        echo '<div class="quick-bg">
                <div id="spacer"  style="margin-bottom:15px;">
                    <div id="rc-bg">Menu</div>
                </div>';

        for($i = 0; $i < mysqli_num_rows($result); $i++) {
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
            printf("<div class='quick-links'>
                    » <a href='?option=category&id_cat=%s'>%s</a>
                    </div>", $row['id'], $row['name_category']);
        }

        echo '</div>'; //закрываем <div class="quick-bg">
    }

    //метод отображения основного меню
    protected function get_menu() {
        $row = $this->menu_array();
        echo '<div id="mainarea">
			    <div class="heading">';
        echo '<div class="toplinks" style="padding-left:30px;">
                <a href="?option=main">Главная</a></div>';

        foreach ($row as $item){
            printf('<div class="sap2">::</div>
				    <div class="toplinks"><a href="?option=menu&id=%s">%s</a></div>',
                $item['id'], $item['name_menu']);
        }
        echo '</div>'; //закрывает <div id="mainarea">
    }

    //метод отображения футера = закрывающие теги
    protected function get_footer () {

        echo '<div id="bottom">
                <div class="toplinks" style="padding-left:127px;"><a href="?option=main">Главная</a></div>';

        $row = $this->menu_array();
        foreach ($row as $item){
            printf('<div class="sap2">::</div>
				    <div class="toplinks"><a href="?option=menu&id=%s">%s</a></div>',
                $item['id'], $item['name_menu']);
        }
		echo '</div>
                <div class="copy"><span class="style1"> Copyright 2017 Название сайта </span>
            </center>
          </body>
        </html>';
    }

    //выборка данных меню из БД
    protected function menu_array() {
        $query = "SELECT id, name_menu FROM menu";
        $result = mysqli_query($this->db, $query);
        if(!$result) {
            exit("Не удалось обрабботать запрос - ".mysqli_error($this->db));
        }

        $row = array();
        for($i = 0; $i < mysqli_num_rows($result); $i++) {
            $row[] = mysqli_fetch_array($result, MYSQLI_ASSOC);
        }

        return $row;
    }

    //при создании объекта инициируем подключение к БД
    public function __construct() {
        //подключаемся к БД
        $this->db = mysqli_connect(HOST, USER, PASSWORD);
        //проверка на подключение
        if(mysqli_connect_errno()) {
            exit("ОШибка соединения с БД".mysqli_connect_error());
        }
        //выбираем БД
        if(!mysqli_select_db($this->db, DB)) {
            exit("Ошибка выбора БД".mysqli_error($this->db));
        }
        //устанавливаем кодировку UTF-8
        if(!mysqli_set_charset($this->db, "utf8")) {
            printf("Ошибка при загрузке выбора символов utf8: %s\n", mysqli_error($this->db));
            exit();
        }



    }
    //метод отображения основных модулей страницы
    public function get_body() {
        $this->get_header();
        $this->get_left_bar();
        $this->get_menu();
        $this->get_content();
        $this->get_footer();
    }

    abstract function get_content();
}