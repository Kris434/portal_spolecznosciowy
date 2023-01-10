<?php
session_start();

include "connection.php";

if(isset($_POST['login']) && isset($_POST['password']))
{
    $username = mysqli_real_escape_string($connection, $_POST['login']);
    $password = sha1($_POST['password']);

    $sql = "SELECT id, email, login, haslo FROM dane_podstawowe WHERE login LIKE '$username' AND haslo LIKE '$password'";

    $result = $connection -> query($sql);

    if($result -> num_rows == 1)
    {
        $result = $result -> fetch_assoc();

        $id = $result['id'];
        $login = $result['login'];

        if($result['haslo'] == $password && $result['login'] == $username)
        {
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $login;
            $_SESSION['userId'] = $id;

            header('location: ../main_page.php');
        }
    }
    else
    {
        echo 'nie ma takiego użytkownika';
    }
}