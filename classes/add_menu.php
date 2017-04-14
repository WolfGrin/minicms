<?php

/**
 * Created by PhpStorm.
 * User: User
 * Date: 14.04.2017
 * Time: 19:06
 */
class add_menu extends ACore_Admin
{
    //метод обработки запроса $_POST
    protected function obr(){

        $title = $_POST['title'];
        $text = $_POST['text'];


        //проверка, заполнены ли обязательные поля
        if(empty($title) || empty($text)){
            exit("Не заполнены обязательные поля...");
        }

        $query = "INSERT INTO menu (name_menu, text_menu)
                  VALUE ('$title', '$text')";
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
        echo '<div id="main">';
        //если в сесси есть переменная 'res'  и она не пустая, выводим сообщение
        if($_SESSION['res']){
            echo $_SESSION['res'];
            //удаляем переменную 'res' из сессии
            unset($_SESSION['res']);
        }

print <<<HEREDOC
        <form action='' method='POST'>
            <p>Заголовок меню: <br />
                <input type='text' name='title' style='width: 420px;'>
            </p>
            <p>Текст: <br />
                <textarea name='text' cols='55' rows='7'></textarea>
            </p>
            <p>
                <input type='submit' name='button' value='Сохранить'>
            </p>
        </form>
        
    </div>
</div>
HEREDOC;

    }
}