<?php

/**
 * Created by PhpStorm.
 * User: WolfGrin
 * Date: 27.03.2017
 * Time: 22:40
 */

abstract class ACore
{

    //дескриптор объекта model
    protected $m;
    //при создании объекта создаем новый объект model
    public function __construct() {
        $this->m = new model();

    }

    //метод вывода хедера
    protected function get_header () {
        //include "./header.php";
        return true;
    }
    //метод вывода левой панели
    protected function get_left_bar () {
        $result = $this->m->get_left_bar();
        return $result;
    }

    //метод отображения основного меню
    protected function get_menu() {
        $row = $this->m->menu_array();
        return $row;
    }

    //метод отображения футера = закрывающие теги
    protected function get_footer () {
        $row = $this->m->menu_array();
        return $row;
    }




    //метод отображения основных модулей страницы
    public function get_body($tpl) { //$tpl - название шаблона
        //если пришли данные $_POST, обрабатываем данные
        if($_POST) {
            $this->obr();
        }

        $this->get_header();
        $left_bar = $this->get_left_bar();
        $menu_top = $this->get_menu();
        $content = $this->get_content();
        $footer = $this->get_footer();

        include "tpl/index.php";
    }

    abstract function get_content();
}