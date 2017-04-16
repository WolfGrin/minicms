<?php

/**
 * Created by PhpStorm.
 * User: WolfGrin
 * Date: 10.04.2017
 * Time: 0:44
 */
class menu extends ACore
{
    public function get_content() {
        if(!$_GET['id']) {
            echo 'Не правильные данные для вывода меню';
        }
        else {
            $id_menu = (int) $_GET['id'];
            if(!$id_menu) {
                echo 'Не правильные данные для вывода меню';
            }
            else {
                $row = $this->m->get_menu($id_menu);
                if($row != NULL) {
                   return $row;
                }
                else {
                    echo "Неверный запрос...";
                }
            }
        }

    }
}