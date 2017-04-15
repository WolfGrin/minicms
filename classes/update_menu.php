<?php

/**
 * Created by PhpStorm.
 * User: User
 * Date: 14.04.2017
 * Time: 19:20
 */
class update_menu extends ACore_Admin
{
    //метод обработки запроса $_POST
    protected function obr(){

        $id = $_POST['id'];
        $title = $_POST['title'];
        $text = $_POST['text'];

        //проверка, заполнены ли обязательные поля
        if(empty($title) || empty($text)){
            exit("Не заполнены обязательные поля...");
        }

        $query = "UPDATE menu
                  SET name_menu = '$title', text_menu = '$text'
                  WHERE id = '$id'";


        if(!$this->db->query($query)) {
            exit("Не удалось обрабботать запрос - " . $this->db->error);
        }
        else {
            //записываем в переменную 'res' текущей сессии сообщение (для использования необходимо открыть сессию)
            $_SESSION['res'] = "Изменения успешно сохранены";
            //перенаправление на страницу
            header("Location:?option=edit_menu");
            exit();
        }
    }

    public function get_content()
    {
        // TODO: Implement get_content() method.
        if($_GET['id_menu']) {
            $id_menu = (int)$_GET['id_menu'];
            if(!$id_menu)
                exit('Неверный формат данных');
        }
        else{
            exit('Заданы не верные параметры');
        }

        $menu = $this->get_text_menu($id_menu);
        if(!$menu) echo("<h2 style='color: red;'>По запросу данные отсутствуют!</h2>");

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
            <input type='text' name='title' style='width: 420px;' value='$menu[name_menu]'>
            <input type='hidden' name='id' value='$id_menu'>
        </p>
        <p>Текст: <br />
            <textarea name='text' cols='55' rows='7'>$menu[text_menu]</textarea>
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