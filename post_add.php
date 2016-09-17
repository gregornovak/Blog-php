<?php
include_once "./session.php";
include_once "./header.php";
if (isset($_SESSION["id_user"])) {
?>
    <div class="add-post">
        <form action="post_insert.php" method="POST" name="addPost">
            <ul>
                <li>
                    <h2>Dodaj objavo!</h2>
                </li>
                <li>
                    <input type="hidden" name="id_user" value="<?php echo $_SESSION["id_user"] ?>">
                </li>
                <li>
                    <label for="title">Naslov objave:</label>
                    <input type="text" name="title">
                </li>
                <li>
                    <label for="content">Vsebina objave:</label>
                    <textarea name="content"></textarea>
                </li>
                <li class="error-text">
                    <?php
                    if (isset($_SESSION["errors"])) {
                        echo $_SESSION["errors"];
                    }
                    unset($_SESSION["errors"]);
                    ?>
                </li>
                <li>
                    <input type="submit" value="Dodaj" name="submit">
                </li>
            </ul>
        </form>
    </div>
<?php
} else {
?>
    <div class="add-post">
        <p>Za dodajanje objav se morate prijaviti!</p>
    </div>
<?php
}
include_once "./footer.php";
?>
