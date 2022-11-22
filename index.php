<?php
session_start();
?>

<html lang="pl">
<head>
    <title>Portal społecznościowy</title>
</head>
<body>
<form action="accounts/register.php" method="post">
    Login: <input type="text" name="login"><br>
    Hasło: <input type="password" name="password1"><br>
    Powtórz Hasło: <input type="password" name="password2"><br>
    E-mail: <input type="email" name="email"><br>
    Data urodzenia: <input type="date" name="birthday"><br>
    Imię: <input type="text" name="name"><br>
    Nazwisko: <input type="text" name="surname"><br>
    <button type="submit" name="registerBtn">Zarejestruj</button>
</form>
<hr>
<form action="accounts/login.php" method="post">
    Login: <input type="text" name="login"><br>
    Hasło: <input type="password" name="password"><br>
    <button type="submit" name="registerBtn">Zaloguj</button>
</form>
<?php
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)
    {
        echo $_SESSION['username'];
    }
?>
</body>
</html>
