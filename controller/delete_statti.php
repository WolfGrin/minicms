<?php

/**
 * Created by PhpStorm.
 * User: User
 * Date: 14.04.2017
 * Time: 17:53
 */
class delete_statti extends ACore_Admin
{
    public function obr() {
        if($_GET['del']) {
            $id_text = (int)$_GET['del'];

            $query = "DELETE FROM statti WHERE id = '$id_text'";

            if($this->db->query($query)) {
                $_SESSION['res'] = "Статья удалена";
                header("Location:?option=admin");
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