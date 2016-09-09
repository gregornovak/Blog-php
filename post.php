<?php
include_once "./header.php";
?>
<div class="post">
    <div class="main-content">
        <div class="author">
            <p>Objavil <span>Gregor Novak</span>, 15.8.2016</p>
        </div>
        <div class="title">
            <h2>Moja prva objava!</h2>
        </div>
        <div class="content">
            <p>Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum</p>
        </div>
        <div class="edit-post">
            <div class="edit-btn">
                <button type="button"><a href="post_edit.php">Uredi</a></button>
                <button type="button" class="delete">Izbriši</button>
            </div>
        </div>
    </div>
</div>
<div class="comments">
    <div class="c-title">
        <h3>Komentiraj</h3>
    </div>
    <div class="comment">
        <form action="" method="POST">
            <ul>
                <li><textarea placeholder="Dodaj komentar pod to objavo" name="user_comment"></textarea></li>
                <li><input type="submit" value="Pošlji"></li>
            </ul>
        </form>
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
