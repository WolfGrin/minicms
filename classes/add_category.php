<?php

/**
 * Created by PhpStorm.
 * User: WolfGrin
 * Date: 15.04.2017
 * Time: 22:23
 */
class add_category extends ACore_Admin
{
//метод обработки запроса $_POST
    protected function obr(){

        $title = $_POST['title'];


        //проверка, заполнены ли обязательные поля
        if(empty($title)){
            exit("Не заполнены обязательные поля...");
        }

        $query = "INSERT INTO category (name_category)
                  VALUE ('$title')";
        $result = $this->db->query($query);

        if(!$result) {
            exit("Не удалось обрабботать запрос - " . $this->db->error);
        }
        else {
            //записываем в переменную 'res' текущей сессии сообщение (для использования необходимо открыть сессию)
            $_SESSION['res'] = "Изменения успешно сохранены";
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
            <p>Название категории: <br />
                <input type='text' name='title' style='width: 420px;'>
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