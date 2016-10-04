<?php
include_once "./session.php";
include_once "./database.php";
include_once "./functions.php";

if (!isset($_SESSION["id_user"])) {
    header("Location: index.php");
    die();
}

if (!empty($_POST["submit"])){
    $user_id = (int)$_SESSION["id_user"];
    $post_id = (int)$_POST["id_post"];
    $title = clean_data($_POST["title"]);
    $content = clean_data($_POST["content"]);
    if (!empty($user_id) && !empty($post_id) && !empty($title) && !empty($content)){
        $query = "SELECT id_users, id_posts FROM posts WHERE id_posts='$post_id'";
        $result = mysqli_query($link, $query);
        $post = mysqli_fetch_array($result);
        if ($post_id === (int)$post["id_posts"] && $user_id === (int)$post["id_users"]) {
            $query = "UPDATE posts SET title='$title', content='$content' WHERE id_posts='$post_id' AND id_users='$user_id'";
            mysqli_query($link, $query);
            $_SESSION["errors"] = "Objava je bila posodobljena!";
            header("Location: post.php?post=$post_id");
            die();
        } else {
            $_SESSION["errors"] = "Ti pobalin ti!";
            header("Location: post.php?post=$post_id");
            die();
        }
    } else {
        $_SESSION["errors"] = "Polja nesmejo biti prazna!";
        header("Location: post_edit.php?post=$post_id");
        die();
    }

}

?>
