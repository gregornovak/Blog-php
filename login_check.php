<?php
include_once "./session.php";
include_once "./database.php";
include_once "./functions.php";
if (isset($_SESSION["id_user"])) {
    header("Location: index.php");
}
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (!empty($_POST["submit"])) {
        //pridobim podatke iz login_check forme
        $email    = clean_data($_POST["email"]);
        $password = clean_data($_POST["password"]);
        //preverim če email naslov ne vsebuje nepravilnih znakov
        if (preg_match("/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/", $email) === 1) {
            //preverim če geslo ne vsebuje nepravilnih znakov ter je daljše od 6ih znakov ter krajše od 60ih znakov
            if ((strlen($password) >= 6) && (strlen($password) <= 60) && preg_match("/^[a-zA-Z0-9]+$/", $password) === 1) {
                //preverim ali obstaja uporabnik s tem emailom in geslom
                $query = "SELECT * FROM users WHERE email='$email'";
                $result = mysqli_query($link, $query);
                if (mysqli_num_rows($result) === 1) {
                    //če je našlo uporabnika -> dodaj njegove podatke v sejo
                    $user = mysqli_fetch_array($result);
                    $password = password_verify($password, $user["pass"]);
                    if ($password === true) {
                        $_SESSION["id_user"] = $user["id_users"];
                        $_SESSION["username"] = $user["username"];
                        header("Location: index.php");
                        die();
                    } else {
                        $_SESSION["errors"] = "Vpisali ste napačno geslo!";
                        header("user_login.php");
                        die();
                    }
                } else {
                    //uporabnik ne obstaja
                    $_SESSION["errors"] = "Ta uporabnik ne obstaja!";
                    header("user_login.php");
                    die();
                }
            } else {
                //geslo vsebuje nepravilne znake
                $_SESSION["errors"] = "Dovoljene so same črke a do z ter števila";
                header("Location: user_login.php");
                die();
            }
        } else {
            //email vsebuje nepravilne znake
            $_SESSION["errors"] = "Email vsebuje prepovedane znake!";
            header("Location: user_login.php");
            die();
        }

    }
}
?>
