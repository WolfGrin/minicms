<?php

/**
 * Created by PhpStorm.
 * User: WolfGrin
 * Date: 15.04.2017
 * Time: 21:49
 */
class edit_category extends ACore_Admin
{
    public function get_content()
    {
        $query = "SELECT id, name_category FROM category";
        $result = $this->db->query($query);

        if (!$result) {
            exit("Не удалось обрабботать запрос - " . $this->db->error);
        }


        echo "<div id='main'>";
        echo "<h3><a href='?option=add_category' style='color: #510000;'>Добавить новую категорию</a></h3><hr />";

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
                                <a href='?option=update_category&id_category=%s' style='color: #585858;'>%s</a> |
                                <a href='?option=delete_category&del=%s' style='color: red;'>Удалить</a>
                                </p>", $row['id'], $row['name_category'], $row['id']);
        }

        echo "</div>
                </div>";
    }
}