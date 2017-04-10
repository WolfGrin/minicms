<?php

/**
 * Created by PhpStorm.
 * User: User
 * Date: 10.04.2017
 * Time: 12:21
 */
class admin extends ACore_Admin
{
    public function get_content()
    {
        // TODO: Implement get_content() method.
        $query = "SELECT id, title FROM statti";
        $result = $this->db->query($query);

        echo "<div id='main'>";
        echo "<h3><a href='?option=add_statti' style='color: #510000;'>Добавить новую статью</a></h3><hr />";

        if(!$result) {
            exit("Не удалось обрабботать запрос - " . $this->db->error);
        }
        else {
            $row = array();
            for ($i = 0; $i < $result->num_rows; $i++) {
                $row = $result->fetch_assoc();
                printf("<p style='font-size: 14px;'>
                        <a href='?option=update_statti&id_text=%s' style='color: #585858;'>%s</a> |
                        <a href='?option=delete_statti&id_text=%s' style='color: red;'>Удалить</a>
                        </p>", $row['id'], $row['title'], $row['id']);
            }
        }

        echo "</div>
            </div>";
    }

}