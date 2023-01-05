<?php
session_start();

include '../accounts/connection.php';

if(isset($_SESSION['loggedin']) && isset($_SESSION['userId']))
{
    if(isset($_POST['description']) && strlen($_POST['description']) > 0)
    {
        $description = $_POST['description'];
        $user = $_SESSION['userId'];

        $getPostId = "SELECT ID FROM posts WHERE Post = $description";

        $result = $connection -> query($getPostId);

        $id = $result -> fetch_assoc();
        $id = $result -> ID;

        $sql = "UPDATE posts SET `Post` = '$description' WHERE `posts`.`ID` = '$id'";

        $result = $connection -> query($sql);

        if($result)
        {
            echo 'Post został edytowany pomyślnie';
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