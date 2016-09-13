<?php
session_start();

include_once "./functions.php";
include_once "./database.php";
if (isset($_SESSION["id_user"])){
    header("Location: index.php");
    die();
}
//preverim ali je request tipa post
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    //če je bila forma submitana pridobi podatke
    if (!empty($_POST["submit"])) {
        //podatke ki jih pridobim jih sčistim z clean_data funkcijo
        $username = clean_data($_POST["username"]);
        $email    = clean_data($_POST["email"]);
        $pass1    = clean_data($_POST["password1"]);
        $pass2    = clean_data($_POST["password2"]);
        //preverim če že obstaja uporabnik s tem emailom ali uporabniškim imenom
        $query = "SELECT * FROM users WHERE username='$username' OR email='$email'";
        $result = mysqli_query($link, $query);
        if (mysqli_num_rows($result) !== 0){
            $_SESSION["errors"] = "Uporabnik s tem uporabniškim imenom ali emailom že obstaja!";
            echo "Uporabnik s tem uporabniškim imenom ali emailom že obstaja!";
            //header("Location: user_add.php");
            //die();
        } else {
            //preverim ali je uporabnik vpisal ustrezno uporabniško ime
            if (strlen($username) >= 4 && strlen($username) <= 20 && preg_match("/^[a-zA-Z0-9]+$/", $username) === 1) {
                if (preg_match("/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/", $email) === 1) {
                    if (($pass1 === $pass2) && (strlen($pass1) >= 6) && (strlen($pass1) <= 60) && (preg_match("/^[a-zA-Z0-9]+$/", $pass1))) {
                        //uporabnik je vpisal ustrezne informacije
                        $password = password_hash($pass1, PASSWORD_DEFAULT);
                        $query = "INSERT INTO users(username, email, pass) VALUES('$username', '$email', '$password')";
                        mysqli_query($link, $query);
                    } else {
                        //gesli se ne ujemata, prekratko/predolgo geslo, uporablja neustrezne znake
                        $_SESSION["errors"] = "Geslo mora biti dolgo od 6 do 60 znakov / lahko vsebuje števila, ter velike in male črke";
                    }
                } else {
                    //email ni pravilen
                    $_SESSION["errors"] = "Email lahko vsebuje števila, črke od a do z ter (-, _, .) znake!";
                }
            } else {
                //uporabniško ime mora biti dolgo od 4 do 20 znakov ter lahko vsebuje števila, ter male in velike črke a-z
                $_SESSION["errors"] = "Uporabniško ime lahko vsebuje velike in male črke ter števila, nesme biti krajše od 4ih znakov ter daljše od 20ih znakov!";
            }
        }
    }

}
?>
