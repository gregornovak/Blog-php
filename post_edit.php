<?php
include_once "./session.php";
include_once "./database.php";
include_once "./header.php";

if (!isset($_SESSION["id_user"])) {
    header("Location: user_login.php");
    die();
}
$post_id = (int)$_GET["post"];
$query = "SELECT id_users, id_posts, title, content FROM posts WHERE id_posts='$post_id'";
$result = mysqli_query($link, $query);
$post = mysqli_fetch_array($result);

if ($post["id_users"] === $_SESSION["id_user"]) {
?>
    <div class="add-post">
        <form action="post_update.php" method="POST">
            <ul>
                <li>
                    <h2>Uredi objavo!</h2>
                </li>
                <li><input type="hidden" name="id_post" value="<?php echo $post["id_posts"]; ?>"></li>
                <li>
                    <label for="title">Naslov objave:</label>
                    <input type="text" name="title" value="<?php echo $post["title"]; ?>">
                </li>
                <li>
                    <label for="content">Vsebina objave:</label>
                    <textarea name="content"><?php echo $post["content"];?></textarea>
                </li>
                <li>
                    <input type="submit" value="Uredi" name="submit">
                </li>
            </ul>
        </form>
    </div>
<?php
} else {
    header("Location: post.php?post=$post_id");
    die();
}


include_once "./footer.php";
?>
