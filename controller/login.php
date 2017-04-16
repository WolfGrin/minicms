<?php

/**
 * Created by PhpStorm.
 * User: WolfGrin
 * Date: 15.04.2017
 * Time: 13:25
 */
class login extends ACore
{
    protected function obr() {
        //mysqli_real_escape_string() - Экранирует специальные символы в строке для использования в SQL выражении
        // защита от SQL инъекций и ошибок при вводе недопустимых символов
        // strip_tags - удаляет HTML и PHP-теги из строки
        $login = strip_tags( $this->db->real_escape_string($_POST['login']) );
        $password = strip_tags( $this->db->real_escape_string($_POST['password']) );

        if(!empty($login) && !empty($password)) {
            $password = md5($password);

            $query = "SELECT id FROM users WHERE login='$login' AND password='$password'";

            $result = $this->db->query($query);
            if(!$result) {
                exit($this->db->error);
            }

            if($result->num_rows == 1) {
                $_SESSION['user'] = TRUE;
                header("Location:?option=admin");
                exit();
            }
            else {
                exit("Ошибка ввода логина или пароля...");
            }

        }
        else {
            exit("Не все обязательные поля заполненны!");
        }
    }

    public function get_content()
    {
        // TODO: Implement get_content() method.


        echo '<div id="main">
            <p class="heading2">Authorization!</p>';


print <<<HEREDOC
    <form action='' method='POST'>
        <p>Логин: <br />
            <input type='text' name='login''>
        </p>
        <p>Пароль: <br />
            <input type='password' name='password''>
        </p>
        <p>
            <input type='submit' name='button' value='Войти'>
        </p>
    </form>
HEREDOC;


        echo '</div>
             </div>';

    }
}
