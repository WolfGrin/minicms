<?php

/**
 * Created by PhpStorm.
 * User: User
 * Date: 14.04.2017
 * Time: 18:33
 */
class edit_menu extends ACore_Admin
{
    public function get_content()
    {
        $query = "SELECT id, name_menu, text_menu FROM menu";
        $result = $this->db->query($query);

        if (!$result) {
            exit("Не удалось обрабботать запрос - " . $this->db->error);
        }


        echo "<div id='main'>";
        echo "<h3><a href='?option=add_menu' style='color: #510000;'>Добавить новый пункт меню</a></h3><hr />";

        //если перенаправленны с другой страницы и сессия содержит информацию
        if ($_SESSION['res']) {
            echo $_SESSION['res'];
            //удаляем переменную 'res' из сессии
            unset($_SESSION['res']);
        }

            $row = array();
            for ($i = 0; $i < $result->num_rows; $i++) {
                $row = $result->fetch_assoc();
                printf("<p style='font-size: 14px;'>
                                <a href='?option=update_menu&id_menu=%s' style='color: #585858;'>%s</a> |
                                <a href='?option=delete_menu&del=%s' style='color: red;'>Удалить</a>
                                </p>", $row['id'], $row['name_menu'], $row['id']);
            }

        echo "</div>
                </div>";
    }
}