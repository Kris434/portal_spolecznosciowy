<?php
include('connection.php');

if(isset($_POST['username']) && isset($_POST['password1']) && isset($_POST['password2']))
{
    $username = $_POST['username'];
    $password1 = $_POST['password1'];
    $password2 = $_POST['password2'];

    $sql = "SELECT * FROM `uzytkownicy` WHERE `login` =" . $this -> username;

    include('accounts/connection.php');

    $result = $connection -> query($sql);

    if($result !== false && $result -> num_rows > 0)
    {
        echo 'Taki użytkownik już istnieje';
    }
    else
    {
        if(preg_match('/^[a-z]\w{2,25}$/i', $this -> username))
        {
            if($password1 === $password2)
            {
                $pass = sha1($password1);

                $sql = "Insert into uzytkownicy (`login`, `haslo`) VALUES $username, $pass";

                $result = $connection -> query($sql);

                if($result)
                {
                    echo 'Konto zostało utworzone';
                }
                else
                {
                    echo 'Wystąpił niespodziewany błąd';
                }
            }
            else
            {
                echo "Hasła nie są takie same";
            }
        }
        else
        {

        }
    }
}