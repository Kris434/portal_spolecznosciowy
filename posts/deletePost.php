<?php
session_start();

include '../accounts/connection.php';

if(isset($_SESSION['loggedin']) && isset($_SESSION['userId']))
{
    if(isset($_POST['description']))
    {
        $description = $_POST['description'];
        $user = $_SESSION['userId'];

        $getPostId = "SELECT ID FROM posts WHERE Post = $description";

        $result = $connection -> query($getPostId);

        $id = $result -> fetch_assoc();
        $id = $result -> ID;

        $sql = "DELETE FROM `posts` WHERE ID = '$id'";

        $result = $connection -> query($sql);

        if($result)
        {
            echo 'Post został usunięty';
            header('location: ../index.php');
        }
        else
        {
            echo 'Wystąpił nieoczekiwany błąd';
            header('location: ../index.php');
        }

        $connection -> close();
    }
}
else
{
    header('location: ../index.html');
}