<?php

/**
 * Created by PhpStorm.
 * User: User
 * Date: 10.04.2017
 * Time: 11:53
 */
abstract class ACore_Admin
{
    //дескриптор БД
    protected $db;
    //метод вывода хедера
    protected function get_header () {
        include "./header.php";
    }
    //метод вывода левой панели
    protected function get_left_bar () {



        echo '<div class="quick-bg">
                <div id="spacer"  style="margin-bottom:15px;">
                    <div id="rc-bg">Разделы админки</div>
                </div>';

        echo "<div class='quick-links'>
                » <a href='?option=edit_statti'>Статиьи</a>
                </div>";

        echo "<div class='quick-links'>
                » <a href='?option=edit_menu'>Меню</a>
                </div>";

        echo "<div class='quick-links'>
                » <a href='?option=edit_category'>Категории</a>
                </div>";
        
        echo '</div>'; //закрываем <div class="quick-bg">
    }


    //метод отображения футера = закрывающие теги
    protected function get_footer () {
        echo '<div id="bottom">';

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

        //блок меню
        echo '<div id="mainarea">
			    <div class="heading">';
        echo '</div>'; //закрывает <div id="mainarea">

        $this->get_content();
        $this->get_footer();
    }

    abstract function get_content();

    protected function get_categories () {
        $query = "SELECT id, name_category FROM category";
        $result = $this->db->query($query);

        if(!$result) {
            exit($this->db->error);
        }

        $row = array();
        for ($i = 0; $i < $result->num_rows; $i++) {
            $row[] = $result->fetch_assoc();
        }

        return $row;
    }

}