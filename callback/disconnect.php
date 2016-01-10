<?php
session_start();

unset($_SESSION['login']);
unset($_SESSION['password']);
unset($_SESSION['admin']);
unset($_SESSION['id']);

session_destroy();

header('Location: ../index.php');
?>
