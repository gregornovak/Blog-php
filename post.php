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
            <p>Objavil <span><?php echo $post["username"]; ?></span>, <?php echo date("d M Y, H:i", strtotime($post["date_added"])); ?>.</p>
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
                <button type="button"><a href="post_edit.php">Uredi</a></button>
                <button type="button" class="delete">Izbriši</button>
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
        <form action="comment_insert.php" method="POST">
            <ul>
                <li><input type="hidden" name="id_post" value="<?php echo $post_id ?>"></li>
                <li><input type="hidden" name="id_user" value="<?php echo $session_id ?>"></li>
                <li><textarea placeholder="Dodaj komentar pod to objavo" name="user_comment"></textarea></li>
                <li><input type="submit" value="Pošlji" name="submit"></li>
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
    <div class="show-comment">
        <span class="username">Test</span>
        <span class="time-added">1.9.2016, 14:20</span>
        <p>Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum!</p>
    </div>
    <div class="show-comment">
        <span class="username">Test2</span>
        <span class="time-added">31.8.2016, 18:45</span>
        <p>Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum!</p>
    </div>
</div>
<?php
include_once "./footer.php";
?>
