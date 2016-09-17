<?php
include_once "./session.php";
include_once "./database.php";
include_once "./header.php";

$query = "SELECT username, id_posts, title, content, date_added FROM posts p INNER JOIN users u ON p.id_users=u.id_users ORDER BY date_added DESC";
$result = mysqli_query($link, $query);
while ($post = mysqli_fetch_array($result)) {
?>
<div class="post">
    <a href="post.php?post=<?php echo $post["id_posts"]?>" class="main-content">
        <div class="author">
            <p>Objavil <span><?php echo $post["username"] ?></span>, <?php echo date("d M Y, H:i", strtotime($post["date_added"])); ?>.</p>
        </div>
        <div class="title">
            <h2><?php echo $post["title"]; ?></h2>
        </div>
        <div class="content">
            <p><?php $truncated = substr($post["content"],0,strpos($post["content"],' ',300)); echo $truncated; ?> ...</p>
        </div>
    </a>
</div>
<?php
}
include_once "./footer.php";
?>
