<?php

require_once 'human.php';

echo <<< HEREDOC
    <h2>Создаем класс "Человек"</h2>
    <form action="index.php" method="get">
        Имя: <input type="text" name="name" required="required" ><br><br>
        Фамилия: <input type="text" name="surname" required="required" ><br><br>
        Возраст: <input type="number" name="age" required="required" ><br><br>
        Пол: <br> 
        <input type="radio" name="sex" required="required" value="male"> мужской<br>
        <input type="radio" name="sex" required="required" value="female"> женский<br><br>
        <button type="submit">Создать Класс</button>
    </form>   
HEREDOC;

if(isset($_GET['name']) && isset($_GET['surname']) && isset($_GET['age']) && isset($_GET['sex'])){
    $human = new Human ($_GET['age'], $_GET['sex']);
    $human -> setName($_GET['name']);
    $human -> setSurname($_GET['surname']);

    $human -> printObj();
}


?>