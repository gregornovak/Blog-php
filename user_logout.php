<?php
include_once "./session.php";
session_destroy();
header("Location: user_login.php");
die();
?>
