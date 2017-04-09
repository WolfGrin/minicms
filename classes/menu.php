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
        // TODO: Implement get_content() method.
        echo '<div id="main">';

        if(!$_GET['id']) {
            echo 'Не правильные данные для вывода меню';
        }
        else {
            $id_menu = (int) $_GET['id'];
            if(!$id_menu) {
                echo 'Не правильные данные для вывода меню';
            }
            else {

                $query = "SELECT id, name_menu, text_menu 
                          FROM menu 
                          WHERE id='$id_menu'";
                $result = $this->db->query($query);
                if(!$result) {
                    exit("Не удалось обрабботать запрос - " . $this->db->error);
                }
                else {
                    $row = $result->fetch_assoc();
                    if($row != NULL) {
                        printf("
                            <div style='margin: 10px 0 0 10px; border-bottom: 2px; solid-color: #c2c2c2'>
                                <p style='font-size: 18px;'>%s</p>
                                <p>%s</p>
                            </div>", $row['name_menu'], $row['text_menu']);
                    }
                    else {
                        echo "Неверный запрос...";
                    }
                }
            }
        }

        echo '</div>
             </div>';

    }
}