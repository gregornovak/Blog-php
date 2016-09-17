<?php
if (!isset($_SESSION)) {
    session_start();
}
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
            <?php
            if (!isset($_SESSION["id_user"])) {
            ?>
                <div class="auth">
                    <a href="user_login.php" class="login">Prijava</a>
                    <span class="slash"> / </span>
                    <a href="user_add.php" class="register">Registracija</a>
                </div>
            <?php
            } else {
            ?>
                <div class="auth">
                    <a href="user_profile.php?id=<?php echo $_SESSION["id_user"];?>" class="profile">Moj profil</a>
                    <span class="slash"> / </span>
                    <a href="user_logout.php" class="profile">Odjava</a>
                </div>
            <?php
            }
            ?>

        </div>
    </header>
    <div class="q-container">
        <div class="q-inner">
