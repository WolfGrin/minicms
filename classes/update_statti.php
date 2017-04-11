<?php

/**
 * Created by PhpStorm.
 * User: WolfGrin
 * Date: 11.04.2017
 * Time: 22:19
 */
class update_statti extends ACore_Admin
{
    //метод обработки запроса $_POST
    protected function obr(){
        //если в $_FILES есть поле 'img_src' (определено в форме) и файл скопирован в tmp сервера
        if(!empty($_FILES['img_src']['tmp_name'])){
            //копируем файл из tmp сервера в папку 'file/'
            if(!move_uploaded_file($_FILES['img_src']['tmp_name'], 'file/'.$_FILES['img_src']['name'])) {
                exit("Не удалось загрузить изображение");
            }
            $img_src = 'file/'.$_FILES['img_src']['name'];
        }
        else{
            exit("Необходимо загрузить изображение!");
        }

        $title = $_POST['title'];
        $date = date("Y-m-d", time());
        $description = $_POST['description'];
        $text = $_POST['text'];
        $cat = $_POST['cat'];

        //проверка, заполнены ли обязательные поля
        if(empty($title) || empty($text) || empty($description)){
            exit("Не заполнены обязательные поля...");
        }

        $query = "INSERT INTO statti (title, description, text, date, img_src, cat)
                  VALUE ('$title', '$description', '$text', '$date', '$img_src', '$cat')";
        $result = $this->db->query($query);

        if(!$result) {
            exit("Не удалось обрабботать запрос - " . $this->db->error);
        }
        else {
            //записываем в переменную 'res' текущей сессии сообщение (для использования необходимо открыть сессию)
            $_SESSION['res'] = "Изменения успешно сохранены";
            //перенаправление на страницу
            //если раскоментировать, страница обновляется сначала самой формой "submit",
            //выводиться сообщение $_SESSION['res'], а затем срабатывает перенаправление
            //и сообщение стрирается....
            //header("Location:?option=add_statti");
        }
    }

    public function get_content()
    {
        // TODO: Implement get_content() method.
        if($_GET['id_text']) {
            $id_text = (int)$_GET['id_text'];
            if(!$id_text)
                exit('Неверный формат данных');
        }
        else{
            exit('Заданы не верные параметры');
        }

        $text = $this->get_text_statti($id_text);
        if(!$text) echo("<h2 style='color: red;'>По запросу данные отсутствуют!</h2>");

        echo '<div id="main">';
        //если в сесси есть переменная 'res'  и она не пустая, выводим сообщение
        if($_SESSION['res']){
            echo $_SESSION['res'];
            //удаляем переменную 'res' из сессии
            unset($_SESSION['res']);
        }

        $cat = $this->get_categories();

        print <<<HEREDOC
<form enctype='multipart/form-data' action='' method='POST'>
    <p>Заголовок статьи: <br />
        <input type='text' name='title' style='width: 420px;' value='$text[title]'>
        <input type='hidden' name='id' value='$text[id]'>
    </p>
    <p>Изображение: <br />
        <input type='file' name='img_src'>
        Загружен: $text[img_src];
    </p>
    <p>Краткое описание: <br />
        <textarea name='description' cols='50' rows='7'>$text[description]</textarea>
    </p>
    <p>Текст: <br />
        <textarea name='text' cols='50' rows='7'>$text[text]</textarea>
    </p>
    <select name='cat'>

HEREDOC;

        foreach ($cat as $item) {
            if($item['id'] == $text['cat'])
                echo "<option selected value='".$item['id']."'>".$item['name_category']."</option>>";
            else
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