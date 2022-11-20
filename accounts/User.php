<?php /** @noinspection PhpUndefinedVariableInspection */

class User
{
    public $username;
    private $password;

    function __construct($userNm, $pass)
    {
        $this -> username = $userNm;
        $this -> password = $pass;
    }

    public function register()
    {
        // Potrzebna baza danych, inaczej nie ruszę z tym dalej :/
        //$sql = "SELECT * FROM users WHERE username =" . $this -> username;

        //include('accounts/connection.php');

        //$result = $connection -> query($sql);

        //if($result -> num_rows > 0)
        //{
        //    die();
        //}
        //else
        //{
            if(preg_match('/^[a-z]\w{2,25}$/i', $this -> username))
            {
                echo $this -> username . "<br>" . sha1($this -> password);
            }
        //}


    }
}