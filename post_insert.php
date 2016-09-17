<?php
include_once "./session.php";
include_once "./database.php";
include_once "./functions.php";
if (!isset($_SESSION["id_user"])) {
    header("Location: index.php");
    die();
}
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (!empty($_POST["submit"])) {
        //pridobim podatke iz post_add forme
        $title   = clean_data($_POST["title"]);
        $content = clean_data($_POST["content"]);
        $id_user = (int)$_POST["id_user"];
        //če je uporabnik
        if ($id_user === (int)$_SESSION["id_user"]) {
            if (strlen($title) >= 2 && strlen($title) <= 45) {
                if (strlen($content) >= 20) {
                    $date_added = date("Y-m-d H:i:s");
                    $query = "INSERT INTO posts (title, content, date_added, id_users) VALUES ('$title', '$content', '$date_added', '$id_user')";
                    mysqli_query($link, $query);
                    header("Location: index.php");
                    die();
                } else {
                    $_SESSION["errors"] = "Besedilo mora biti dolgo vsaj 20 znakov!";
                    header("Location: post_add.php");
                    die();
                }
            } else {
                $_SESSION["errors"] = "Naslov objave je prekratek!";
                header("Location: post_add.php");
                die();
            }
        } else {
            $_SESSION["errors"] = "Kdo si pa ti?";
            header("Location: post_add.php");
            die();
        }
    }
} else {
    header("Location: index.php");
    die();
}



?>
