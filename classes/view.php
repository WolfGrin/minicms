<?php

/**
 * Created by PhpStorm.
 * User: WolfGrin
 * Date: 03.04.2017
 * Time: 23:48
 */
class view extends ACore
{
    public function get_content() {
        // TODO: Implement get_content() method.
        echo '<div id="main">';

        if(!$_GET['id']) {
            echo 'Не правильные данные для вывода статьи';
        }
        else {
            $id_text = (int) $_GET['id'];
            if(!$id_text) {
                echo 'Не правильные данные для вывода статьи';
            }
            else {

                $query = "SELECT title, text, date, img_src FROM statti WHERE id='$id_text'";
                $result = $this->db->query($query);
                if(!$result) {
                    exit("Не удалось обрабботать запрос - " . $this->db->error);
                }
                else {
                        $row = $result->fetch_assoc();
                        printf("
                            <div style='margin: 10px 0 0 10px; border-bottom: 2px; solid-color: #c2c2c2'>
                                <p style='font-size: 18px;'>%s</p>
                                <p>%s</p>
                                <p><img src='%s' width='150px' align='left' style='margin-right: 5px;'>%s</p>
                            </div>", $row['title'], $row['date'], $row['img_src'], $row['text']);
                }
            }
        }

        echo '</div>
             </div>';

    }

}
