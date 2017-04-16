<?php

/**
 * Created by PhpStorm.
 * User: WolfGrin
 * Date: 15.04.2017
 * Time: 12:47
 */
class delete_menu extends ACore_Admin
{
    public function obr() {
        if($_GET['del']) {
            $id_menu = (int)$_GET['del'];

            $query = "DELETE FROM menu WHERE id = '$id_menu'";

            if($this->db->query($query)) {
                $_SESSION['res'] = "Меню удаленно";
                header("Location:?option=edit_menu");
                exit();
            }
            else {
                exit("Ошибка удаления. ".$this->db->error);
            }
        }
        else {
            exit("Не вереные данные для страницы");
        }
    }

    public function get_content() {

    }
}