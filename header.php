<?php
include_once "./database.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Moj blog</title>
    <link rel="stylesheet" type="text/css" href="./assets/css/styles.css">
    <link href="https://fonts.googleapis.com/css?family=Exo+2" rel="stylesheet">
</head>
<body>
    <header>
        <div class="nav-inner">
            <div class="logo">
                <a href="index.php" class="title">Moj blog</a>
            </div>
            <div class="contribute">
                <a href="post_add.php">Dodaj objavo</a>
            </div>
            <div class="auth">
                <a href="user_login.php" class="login">Prijava</a>
                <span class="slash"> / </span>
                <a href="user_add.php" class="register">Registracija</a>
            </div>
        </div>
    </header>
    <div class="q-container">
        <div class="q-inner">
