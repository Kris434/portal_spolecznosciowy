<?php
session_start();

include '../accounts/connection.php';

if(isset($_SESSION['loggedin']) && isset($_SESSION['userId']))
{
    if(isset($_POST['text']) && strlen($_POST['text']) > 0)
    {
        $description = $_POST['text'];
        $user = $_SESSION['userId'];

        $sql = "INSERT INTO posts (`userID`, `Post`) VALUES ('$user', '$description')";
        $result = $connection -> query($sql);

        $getPostId = "SELECT ID FROM posts ORDER BY ID DESC";
        $result = $connection -> query($getPostId);
        $result = $result -> fetch_assoc();
        $id = $result['ID'];

        $insertCameleons = "INSERT INTO cameleons (userID, PostID, Cameleon) VALUES ('$user', '$id', 0)";
        $result = $connection -> query($insertCameleons);

        if($result)
        {
            header('location: ../main_page.php');
        }
        else
        {
            echo 'Wystąpił nieoczekiwany błąd';
            header('refresh: 2; url../main_page.php');
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