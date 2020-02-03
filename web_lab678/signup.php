<?php
    require 'includes/db.php';

    ;$data= $_POST;
    if(isset($data['do_signup']))
    {
        //здесь регитсрация
        $errors = array();
        if(trim($data['login']) == ''){
            $errors[] = 'Введите логин';
        }


        if(trim($data['email']) == ''){
            $errors[] = 'Введите email';
        }


        if($data['password'] == ''){
            $errors[] = 'Введите пароль';
        }

        if($data['password_2'] != $data['password']){
            $errors[] = 'Повторный пароль введен не верно!';
        }

        if(empty($errors)){
            //можно регистрировать
            $user = R::dispense('users');
            $user->login = $data['login'];
            $user->email = $data['email'];
            $user->password = password_hash($data['password'], PASSWORD_DEFAULT);
            R::store($user);
            echo '<div style ="color: green;">Вы успешно зарегестрированы</div><hr>';
        }
        else {
            echo '<div style ="color: red;">'.array_shift($errors).'</div><hr>';
        }
    }

?>

<form action="/signup.php" method="post">

    <p>
       <p><strong>Ваш логин</strong></p>
        <input type="text" name="login">
    </p>

    <p>
        <p><strong>Ваш email</strong></p>
        <input type="email" name="email">
    </p>

    <p>
        <p><strong>Ваш пароль</strong></p>
        <input type="password" name="password">
    </p>

    <p>
        <p><strong>Ваш пароль еще раз</strong></p>
        <input type="password" name="password_2">
    </p>

    <p>
        <button type="submit" name="do_signup">Зарегистрироваться</button>
    </p>

</form>
