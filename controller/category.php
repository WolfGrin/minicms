<?php

/**
 * Created by PhpStorm.
 * User: WolfGrin
 * Date: 09.04.2017
 * Time: 22:58
 */
class category extends ACore
{
    public function get_content() {

        if(!$_GET['id_cat']) {
            echo 'Не правильные данные для вывода статьи';
        }
        else {
            $id_cat = (int)$_GET['id_cat'];
            if (!$id_cat) {
                echo 'Не правильные данные для вывода статьи';
            }
            else {
                $result = $this->m->get_cat($id_cat);
                return $result;
            }
        }
    }
}