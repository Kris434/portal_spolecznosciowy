<?php
session_start();

print_r($_SESSION);

unset($_SESSION['loggedin']);
unset($_SESSION['userId']);
unset($_SESSION['username']);

print_r($_SESSION);

session_destroy();

header('location: ../index.html');