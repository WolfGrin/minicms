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
        // TODO: Implement get_content() method.
        echo '<div id="main">
        <p class="heading2">Website Title!</p>';

        if(!$_GET['id_cat']) {
            echo 'Не правильные данные для вывода статьи';
        }
        else {
            $id_cat = (int)$_GET['id_cat'];
            if (!$id_cat) {
                echo 'Не правильные данные для вывода статьи';
            } else {
                $query = "SELECT id, title, description, date, img_src
                          FROM statti 
                          WHERE cat = '$id_cat' 
                          ORDER BY date DESC";
                $result = $this->db->query($query);
                if (!$result) {
                    exit("Не удалось обрабботать запрос - " . $this->db->error);
                }

                if($result->num_rows) {
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
                }
                else {
                    echo "В данной категории нет статей...";
                }

            }
        }

        echo '</div>
             </div>';
    }
}