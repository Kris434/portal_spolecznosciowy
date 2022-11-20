<?php
session_start();
include("accounts/User.php");
?>

<html lang="pl">
<head>
    <title>Portal społecznościowy</title>
</head>
<body>
<?php
    $user = new User("Kris", "JestemKoksemXD");

    $user -> register();
?>
</body>
</html>
