<?php

/**
 * Created by PhpStorm.
 * User: WolfGrin
 * Date: 15.04.2017
 * Time: 22:00
 */
class delete_category extends ACore_Admin
{
    public function obr() {
        if($_GET['del']) {
            $id_category = (int)$_GET['del'];

            $query = "SELECT id FROM statti WHERE cat = '$id_category'";
            $result = $this->db->query($query);
            if ($result->num_rows == 0) {

                $query = "DELETE FROM category WHERE id = '$id_category'";

                if ($this->db->query($query)) {
                    $_SESSION['res'] = "Категория удаленна";
                    header("Location:?option=edit_category");
                    exit();
                } else {
                    exit("Ошибка удаления. " . $this->db->error);
                }
            }
            else {
                $_SESSION['res'] = "<p style='color: red;'><strong> >>> Сначала удали все статьи связаные с данной категорией!</strong></p>";
                header("Location:?option=edit_category");
                exit();
            }
        }
        else {
            exit("Не вереные данные для страницы");
        }
    }

    public function get_content() {

    }
}