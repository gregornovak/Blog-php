<?php
if (!isset($_SESSION)){
    session_start();
}
$not_allowed = [
    "/Blog-php/header.php",
    "/Blog-php/footer.php",
    "/Blog-php/database.php",
    "/Blog-php/session.php",
    "/Blog-php/functions.php"
];

if (in_array($_SERVER["REQUEST_URI"], $not_allowed)) {
    header("Location: index.php");
    die();
}
?>
