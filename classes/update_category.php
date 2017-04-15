<?php

/**
 * Created by PhpStorm.
 * User: WolfGrin
 * Date: 15.04.2017
 * Time: 21:53
 */
class update_category extends ACore_Admin
{
//метод обработки запроса $_POST
    protected function obr(){

        $id = $_POST['id'];
        $title = $_POST['title'];

        //проверка, заполнены ли обязательные поля
        if(empty($title)){
            exit("Не заполнены обязательные поля...");
        }

        $query = "UPDATE category
                  SET name_category = '$title'
                  WHERE id = '$id'";


        if(!$this->db->query($query)) {
            exit("Не удалось обрабботать запрос - " . $this->db->error);
        }
        else {
            //записываем в переменную 'res' текущей сессии сообщение (для использования необходимо открыть сессию)
            $_SESSION['res'] = "Изменения успешно сохранены";
            //перенаправление на страницу
            header("Location:?option=edit_category");
            exit();
        }
    }

    public function get_content()
    {
        // TODO: Implement get_content() method.
        if($_GET['id_category']) {
            $id_category = (int)$_GET['id_category'];
            if(!$id_category)
                exit('Неверный формат данных');
        }
        else{
            exit('Заданы не верные параметры');
        }

        $category = $this->get_name_category($id_category);
        if(!$category) echo("<h2 style='color: red;'>По запросу данные отсутствуют!</h2>");

        echo '<div id="main">';
        //если в сесси есть переменная 'res'  и она не пустая, выводим сообщение
        if($_SESSION['res']){
            echo $_SESSION['res'];
            //удаляем переменную 'res' из сессии
            unset($_SESSION['res']);
        }


        print <<<HEREDOC
    <form action='' method='POST'>
        <p>Заголовок категории: <br />
            <input type='text' name='title' style='width: 420px;' value='$category[name_category]'>
            <input type='hidden' name='id' value='$id_category'>
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