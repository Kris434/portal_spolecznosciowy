<?php
session_start();

include '../accounts/connection.php';

if(isset($_SESSION['loggedin']) && isset($_SESSION['userId']))
{
    if(isset($_POST['cameleon']))
    {
        $cameleon = $_POST['cameleon'];
        $user = $_SESSION['userId'];

        $isCameleoned = "SELECT Cameleon, userID FROM cameleons WHERE cameleons.userID = '$user'";
        $result = $connection -> query($isCameleoned);
        $result = $result -> fetch_assoc();

        if($result['userID'] == $user && $result['Cameleon'] == 0)
        {
            $getCameleons = "SELECT Cameleons FROM posts WHERE ID = '$cameleon'";
            $result = $connection -> query($getCameleons);
            $result = $result -> fetch_assoc();
            $cameleonsNumber = $result['Cameleons'];
            $cameleonsNumber = $cameleonsNumber + 1;

            $updateUser = "UPDATE `cameleons` SET Cameleon = 1 WHERE userID = $user";
            $result = $connection -> query($updateUser);
        }
        else if($result['userID'] == $user && $result['Cameleon'] == 1)
        {
            $getCameleons = "SELECT Cameleons FROM posts WHERE ID = '$cameleon'";
            $result = $connection -> query($getCameleons);
            $result = $result -> fetch_assoc();
            $cameleonsNumber = $result['Cameleons'];
            $cameleonsNumber = $cameleonsNumber - 1;

            $updateUser = "UPDATE `cameleons` SET Cameleon = 0 WHERE userID = $user";
            $result = $connection -> query($updateUser);
        }

        $sql = "UPDATE `posts` SET `Cameleons` = '$cameleonsNumber' WHERE `posts`.`ID` = '$cameleon'";
        $result = $connection -> query($sql);



        $connection -> close();

        if($result)
        {
            header('location: ../main_page.php');
            return $cameleonsNumber;
        }
        else
        {
            header('location: ../main_page.php');
        }


    }
    else
    {
        header('location: ../main_page.php');
    }
}
else
{
    header('location: ../main_page.php');
}