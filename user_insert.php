<?php
//preverim ali je request tipa post
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    //če je bila forma submitana pridobi podatke
    if ($_POST["submit"]) {

        $username = clean_data($_POST["username"]);
        $email    = clean_data($_POST["email"]);
        $pass1    = clean_data($_POST["password1"]);
        $pass2    = clean_data($_POST["password2"]);

        if (strlen($username) >= 4 && strlen($username) <= 20 && preg_match("/^[a-zA-Z0-9]+$/", $username) === 1) {

        }
    }
}
?>
