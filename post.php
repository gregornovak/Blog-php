<?php
include_once "./session.php";
include_once "./header.php";
include_once "./database.php";

if (isset($_SESSION["id_user"])) {
    $session_id = (int)$_SESSION["id_user"];
}
$post_id = (int)$_GET["post"];
$query = "SELECT u.id_users, username, title, content, date_added FROM posts p INNER JOIN users u ON p.id_users=u.id_users WHERE p.id_posts='$post_id'";
$result = mysqli_query($link, $query);
$post = mysqli_fetch_array($result);
$id_user = (int)$post["id_users"];
?>
<div class="post">
    <div class="main-content">
        <div class="author">
            <p>Objavil <span><?php echo $post["username"]; ?></span>, <?php echo date("d M Y, H:i", strtotime($post["date_added"])); ?><a href="index.php"><button class="go-back">Nazaj</button></a></p>
        </div>
        <div class="title">
            <h2><?php echo $post["title"]; ?></h2>
        </div>
        <div class="content">
            <p><?php echo $post["content"]; ?></p>
        </div>
        <?php
        if (isset($session_id)) {
            if ($session_id === $id_user) {
        ?>

        <div class="edit-post">
            <div class="edit-btn">
                <a href="post_edit.php?post=<?php echo $post_id; ?>"><button type="button">Uredi</button></a>
                <a href="post_delete.php?post=<?php echo $post_id; ?>"><button type="button" class="delete">Izbriši</button></a>
            </div>
        </div>
        <?php
            }
        }
        ?>
    </div>
</div>
<div class="comments">
    <div class="c-title">
        <h3>Komentiraj</h3>
    </div>
    <div class="comment">
        <?php
        if (isset($_SESSION["id_user"])) {
        ?>
        <form action="comment_insert.php" method="POST" name="commentInsert">
            <ul>
                <li><input type="hidden" name="id_post" value="<?php echo $post_id ?>"></li>
                <li><input type="hidden" name="id_user" value="<?php echo $session_id ?>"></li>
                <li><textarea placeholder="Dodaj komentar pod to objavo" name="user_comment"></textarea></li>
                <li><input type="submit" value="Pošlji" name="submit"></li>
                <li class="comment-error">
                    <?php
                    if (isset($_SESSION["errors"])) {
                        echo $_SESSION["errors"];
                    } unset($_SESSION["errors"]);
                    ?>
                </li>
            </ul>
        </form>
        <?php
        } else {
        ?>
        <p class="comment-error">Za komentiranje morate biti prijavljeni!</p>
        <?php
        }
        ?>
    </div>
    <hr class="comment-hr">
    <?php
    $query = "SELECT username, date_added, comment FROM comments c INNER JOIN users u ON c.id_users=u.id_users WHERE id_posts='$post_id'";
    $result = mysqli_query($link, $query);
    while ($comment = mysqli_fetch_array($result)) {
    ?>
    <div class="show-comment">
        <span class="username"><?php echo $comment["username"];?></span>
        <span class="time-added"><?php echo date("d M Y, H:i", strtotime($comment["date_added"]));?>.</span>
        <p><?php echo $comment["comment"]; ?></p>
    </div>
    <?php
    }
    ?>
</div>
<?php
include_once "./footer.php";
?>
