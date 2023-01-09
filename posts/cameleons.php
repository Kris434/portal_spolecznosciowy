<?php
session_start();

include '../accounts/connection.php';

if(isset($_SESSION['loggedin']) && isset($_SESSION['userId']))
{
    if(isset($_POST['cameleon']))
    {
        $cameleon = $_POST['cameleon'];
        $user = $_SESSION['userId'];

        $isCameleoned = "SELECT Cameleon FROM cameleons WHERE cameleons.userID = '$user'";
        $result = $connection -> query($isCameleoned);
        $result = $result -> fetch_assoc();

        if($result['Cameleon'] == 1)
        {
            $getCameleons = "SELECT Cameleons FROM posts WHERE userID = '$user'";
            $result = $connection -> query($getCameleons);
            $result = $result -> fetch_assoc();
            $cameleonsNumber = $result['Cameleons'] + 1;
        }
        else
        {
            $getCameleons = "SELECT Cameleons FROM posts WHERE userID = '$user'";
            $result = $connection -> query($getCameleons);
            $result = $result -> fetch_assoc();
            $cameleonsNumber = $result['Cameleons'] - 1;
        }

        $sql = "UPDATE `posts` SET `Cameleons` = '$cameleonsNumber' WHERE `posts`.`ID` = '$cameleon'";
        $result = $connection -> query($sql);

        if($result)
        {
            header('location: ../main_page.php');
        }
        else
        {
            header('location: ../main_page.php');
        }

        $connection -> close();
    }
    else
    {
        header('location: ../main_page.php');
    }
}
else
{
    header('location: ../index.html');
}