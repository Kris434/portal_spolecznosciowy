<?php
include 'config.php';

if(isset($_POST['username']) && isset($_POST['password1']) && isset($_POST['password2']))
{
    $username = $_POST['username'];
    $password1 = $_POST['password1'];
    $password2 = $_POST['password2'];

    if(!preg_match('/^[a-z]\w{2,25}$/i', $username))
    {
        echo 
    }
}