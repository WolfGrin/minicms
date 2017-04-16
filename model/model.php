<?php

/**
 * Created by PhpStorm.
 * User: WolfGrin
 * Date: 16.04.2017
 * Time: 12:42
 */
class model
{
    //дескриптор БД
    protected $db;
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

    public function get_left_bar() {
        $query = "SELECT id, name_category FROM category";
        $result =  mysqli_query($this->db, $query);
        if(!$result) {
            exit("Не удалось обрабботать запрос - ".mysqli_error($this->db));
        }

        $row = array();
        for($i = 0; $i < mysqli_num_rows($result); $i++) {
            $row[] = mysqli_fetch_array($result, MYSQLI_ASSOC);

        }

        return $row;
    }

    //выборка данных меню из БД
    public function menu_array() {
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

    public function get_main_content() {
        $query = "SELECT id, title, description, date, img_src FROM statti ORDER BY date DESC";
        $result = $this->db->query($query);
        if(!$result) {
            exit("Не удалось обрабботать запрос - ".$this->db->error);
        }

        $row = array();
        for ($i = 0; $i < $result->num_rows; $i++) {
            $row[] = $result->fetch_assoc();
        }
        return $row;
    }

    public function get_cat($id_cat) {
        $query = "SELECT id, title, description, date, img_src
                          FROM statti 
                          WHERE cat = '$id_cat' 
                          ORDER BY date DESC";
        $result = $this->db->query($query);
        if (!$result) {
            exit("Не удалось обрабботать запрос - " . $this->db->error);
        }

        $row = array();
        for ($i = 0; $i < $result->num_rows; $i++) {
            $row[] = $result->fetch_assoc();
        }

        return $row;
    }

    public function get_menu($id_menu) {
        $query = "SELECT id, name_menu, text_menu 
                  FROM menu 
                  WHERE id='$id_menu'";
        $result = $this->db->query($query);
        if(!$result) {
            exit("Не удалось обрабботать запрос - " . $this->db->error);
        }
        else {
            $row = $result->fetch_assoc();
            return $row;
        }
    }


}