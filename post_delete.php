<?php
include_once "./session.php";
include_once "./database.php";

if (!isset($_SESSION["id_user"])) {
    header("Location: user_login.php");
    die();
}

$post_id = (int)$_GET["post"];
$user_id = (int)$_SESSION["id_user"];
$query = "SELECT * FROM posts WHERE id_users = '$user_id' AND id_posts = '$post_id'";
$result = mysqli_query($link, $query);
if (mysqli_num_rows($result) === 1){
    $query = "DELETE FROM posts WHERE id_posts='$post_id' AND id_users='$user_id'";
    mysqli_query($link, $query);
    $_SESSION["errors"] = "Objava je bila izbrisana!";
    header("Location: index.php");
    die();
} else {
    $_SESSION["errors"] = "Te objave nemorete izbrisati!";
    header("Location: post.php?post=$post_id");
    die();
}
?>
