<?php
include "connection.php";

/*if(isset($_POST['login']) && isset($_POST['password']))
{
    $username = $_POST['login'];
    $password = sha1($_POST['password']);

    $sql = "SELECT login, haslo FROM uzytkownicy WHERE login LIKE $username AND haslo LIKE $password";

    $result = $connection -> query($sql);

    if($result -> num_rows == 1)
    {

    }
    else
    {
        echo 'nie ma takiego użytkownika';
    }
}*/