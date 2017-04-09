<?php

/**
 * Created by PhpStorm.
 * User: WolfGrin
 * Date: 27.03.2017
 * Time: 23:35
 */
class main extends ACore
{
    public function get_content() {

        $query = "SELECT id, title, description, date, img_src FROM statti ORDER BY date DESC";
        $result = $this->db->query($query);
        if(!$result) {
            exit("Не удалось обрабботать запрос - ".$this->db->error);
        }

        echo '<div id="main">
                <p class="heading2">Website Title!</p>';

        $row = array();
        for ($i = 0; $i < $result->num_rows; $i++) {
            $row = $result->fetch_assoc();
            printf("<div style='margin: 10px 0 0 10px; border-bottom: 2px; solid-color: #c2c2c2'>
                        <p style='font-size: 18px;'>%s</p>
                        <p>%s</p>
                        <p><img src='%s' width='150px' align='left' style='margin-right: 5px;'>%s</p>
                        <p style='color: red;'><a href='?option=view&id=%s'>Читать далее</a></p>
                    </div><hr />", $row['title'], $row['date'], $row['img_src'], $row['description'], $row['id']);
        }

        echo '</div>
             </div>';
    }
}
