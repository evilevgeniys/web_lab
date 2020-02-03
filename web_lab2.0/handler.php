<?php
if(!empty($_POST)){
    echo "Имя - " .htmlspecialchars($_POST['firstName'])."<br />";
    echo "Фамилия -".htmlspecialchars($_POST['secondName'])."<br />";
}
?>