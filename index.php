<?php
session_start();
?>

<html lang="pl">
<head>
    <title>Portal społecznościowy</title>
</head>
<body>
<form action="<?php htmlspecialchars('http://localhost/portal/portal_spolecznosciowy/accounts/register.php') ?>" method="post">
    Login: <input name="login"><br>
    Hasło: <input name="password"><br>
    Powtórz Hasło: <input name="password2"><br>
    <button type="submit" name="registerBtn">Zarejestruj</button>
</form>
<?php

?>
</body>
</html>
