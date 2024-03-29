<?php
    require 'includes/db.php';

    $data=$_POST;

    if(isset($data['do_login'])) {
        $errors = array();
        $user = R::findOne('users', 'login = ?', array($data['login']));
     if($user){
        //логин существует => проверяем пароль
         if(password_verify($data['password'], $user->password)){

         } else{
             $errors[] ='Неверно введен пароль';
         }
     }
     else{
         $errors[] ='Пользователь с таким логином не найден';
     }

        if(empty($errors)){
            echo '<div style ="color: green;">Вы успешно авторизировались</div><hr>';
        }
        else {
            echo '<div style ="color: red;">'.array_shift($errors).'</div><hr>';
        }
    }
?>

<form action="login.php" method="POST">

    <p>
    <p><strong>Логин</strong></p>
    <input type="text" name="login">
    </p>

    <p>
    <p><strong>Пароль</strong></p>
    <input type="password" name="password">
    </p>

    <p>
        <button type="submit" name="do_login">Войти</button>
    </p>
</form>
