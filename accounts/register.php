<?php
include './connection.php';

if(isset($_POST['registerBtn']))
{
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $username = $_POST['login'];
    $password1 = $_POST['password1'];
    $password2 = $_POST['password2'];
    $date = $_POST['birthday'];

    $sql = "SELECT * FROM `dane_podstawowe` WHERE `email` LIKE '$email'";

    $result = $connection -> query($sql);

    if($result !== false && $result -> num_rows > 0)
    {
        echo 'Użytkownik z takim adresem e-mail już istnieje';
    }
    else
    {
        if($password1 === $password2)
        {
            $pass = sha1($password1);

            $sql = "INSERT INTO `dane_podstawowe` (`id`, `imie`, `nazwisko`, `data_urodzenia_uzytkownika`, `login`, `haslo`, `email`) VALUES ('', '$name', '$surname', '$date', '$username', '$pass', '$email')";

            $result = $connection -> query($sql);

            echo 'Konto zostało utworzone';
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $username;

            header('refresh: 5; url=../index.php');

        }
        else
        {
            echo "Hasła nie są takie same";
        }
    }
}