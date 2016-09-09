<?php
//določim spremenljivke, ki so potrebne za povezavo z podatkovno bazo
$host = 'localhost';
$user = 'admin';
$pass = 'geslo123';
$db   = 'blog';
//se povežem na bazo, ter nato preverim ali je bila povezava uspešna
$link = mysqli_connect($host, $user, $pass, $db);
if(!$link) {
    echo 'Prišlo je do napake: ' . mysqli_connect_errno();
    die();
}
//če je bila povezava uspešna nastavim charset na utf8
mysqli_set_charset($link, "utf8");
mysqli_close($link);
?>
