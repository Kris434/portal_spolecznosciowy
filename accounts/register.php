<?php
include './connection.php';

if(isset($_POST['registerBtn']))
{
    $name = $_POST['Name'];
    $surname = $_POST['Surname'];
    $email = $_POST['E-mail'];
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
            if(strlen($password1) >= 8)
            {
                $pass = sha1($password1);

                $sql = "INSERT INTO `dane_podstawowe` (`id`, `imie`, `nazwisko`, `data_urodzenia_uzytkownika`, `login`, `haslo`, `email`) VALUES ('', '$name', '$surname', '$date', '$username', '$pass', '$email')";

                $result = $connection -> query($sql);

                echo 'Konto zostało utworzone';
                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = $username;

                header('refresh: 2; url=../index.html');
            }
            else
            {
                echo 'Hasło musi mieć przynajmniej 8 znaków';
                header('refresh: 5; url=../index.html');
            }
        }
        else
        {
            echo "Hasła nie są takie same";
            header('refresh: 5; url=../index.html');
        }
    }
}