<?php
include_once "./session.php";
include_once "./database.php";
include_once "./functions.php";

if (!isset($_SESSION["id_user"])) {
    header("Location: index.php");
    die();
}
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["submit"])) {
        $session_id = (int)$_SESSION["id_user"];
        $id_user = (int)$_POST["id_user"];
        $id_post = (int)$_POST["id_post"];
        if ($session_id === $id_user) {
            $comment = clean_data($_POST["user_comment"]);
            if (strlen($comment) >= 2) {
                $date_added = date("Y-m-d H:i:s");
                $query = "INSERT INTO comments(comment, date_added, id_posts, id_users) VALUES('$comment', '$date_added', '$id_post', '$id_user')";
                mysqli_query($link, $query);
                header("Location: post.php?post=$id_post");
                die();
            } else {
                $_SESSION["errors"] = "Vaš komentar je prekratek!";
                header("Location: post.php?post=$id_post");
                die();
            }

        } else {
            header("Location: post.php?post=$id_post");
            die();
        }
    }
} else {
    $_SESSION["errors"] = "Ti ti...";
    header("Location: post.php?post=$id_post");
    die();
}

?>
