<?php
session_start();

include '../accounts/connection.php';

if(isset($_SESSION['loggedin']) && isset($_SESSION['userId']))
{
    if(isset($_POST['description']) && strlen($_POST['description']) > 0)
    {
        $description = $_POST['description'];
        $user = $_SESSION['userId'];

        $sql = "INSERT INTO post (`userID`, `Post`) VALUES ('$user', '$description')";

        $result = $connection -> query($sql);

        if($result)
        {
            echo 'Post został dodany pomyślnie';
            header('location: ../index.php');
        }
        else
        {
            echo 'Wystąpił nieoczekiwany błąd';
            header('location: ../index.php');
        }

        $connection -> close();
    }
    else
    {
        echo "Pole nie może być puste";
    }
}
else
{
    header('location: ../index.html');
}