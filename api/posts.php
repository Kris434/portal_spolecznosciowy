<?php

header('Content-Type: application/json');

include '../accounts/connection.php';

$postArray = [];

$sql = "SELECT dane_podstawowe.imie AS imie, dane_podstawowe.nazwisko AS nazwisko, posts.PostDate AS PostDate, posts.Post AS Post, posts.Cameleons AS Cameleons FROM dane_podstawowe JOIN posts ON dane_podstawowe.id = posts.userID";

$result = $connection -> query($sql);

if($result -> num_rows > 0)
{
    while($row = $result -> fetch_assoc())
    {
        $post = [
            "imie" => $row['imie'],
            "nazwisko" => $row['nazwisko'],
            "postDate" => $row['PostDate'],
            "post" => $row['Post'],
            "cameleons" => $row['Cameleons']
        ];

        array_push($postArray, $post);
    }
}


echo json_encode($postArray);