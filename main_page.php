<?php
session_start();

if(!isset($_SESSION['loggedin']))
{
    header('../index.html');
}
?>

<!DOCTYPE HTML>
<html lang="pl">
<head>
    <meta charset="utf-8" />
    <Title> Cameleon - Najlepszy portal! </title>
    <meta name= "description" content="Serwis prezentuje portal spolecznosciowy. Sprawdz go odrazu, nie zwlekaj" />
    <meta name= "keywords" content="portal, portal spolecznosciowy, znajomi, posty" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

</head>

<body>

<header>

    <div>

    </div>

    <div>
        <nav>

        </nav>
    </div>

</header>

<main>
    <div id="posty">
        
    </div>
</main>

<script>

</script>

</body>
</html>