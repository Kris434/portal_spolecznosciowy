<?php
include "connection.php";

if(isset($_POST['login']) && isset($_POST['password']))
{
    $username = $_POST['login'];
    $password = sha1($_POST['password']);

    $sql = "SELECT id, email, login, haslo FROM dane_podstawowe WHERE login LIKE '$username' AND haslo LIKE '$password'";

    $result = $connection -> query($sql);

    if($result -> num_rows == 1)
    {
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $result -> login;
        $_SESSION['userId'] = $result -> id;

        header('location: ../index.html');
    }
    else
    {
        echo 'nie ma takiego użytkownika';
    }
}