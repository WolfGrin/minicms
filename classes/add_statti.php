<?php

/**
 * Created by PhpStorm.
 * User: User
 * Date: 10.04.2017
 * Time: 13:25
 */
class add_statti extends ACore_Admin
{
    public function get_content()
    {
        // TODO: Implement get_content() method.
        echo '<div id="main">';
        $cat = $this->get_categories();

print <<<HEREDOC
<form enctype='multipart/form-data' action='' method='POST'>
    <p>Заголовок статьи: <br />
        <input type='text' name='title' style='width: 420px;'>
    </p>
    <p>Изображение: <br />
        <input type='file' name='img_src'>
    </p>
    <p>Краткое описание: <br />
        <textarea name='description' cols='50' rows='7'></textarea>
    </p>
    <p>Текст: <br />
        <textarea name='text' cols='50' rows='7'></textarea>
    </p>
    <select name='cat'>

HEREDOC;

    foreach ($cat as $item) {
        echo "<option value='".$item['id']."'>".$item['name_category']."</option>>";
    }

    echo "    </select>
            <p>
                <input type='submit' name='button' value='Сохранить'>
            </p>
        </form>";
    echo '</div>
         </div>';
    }
}