<?php
class User
{
    public $username;
    private $password;

    function __construct($userName, $pass)
    {
        $password = $pass;
        $username = $userName;   
    }

    public function register()
    {
        
    }
}