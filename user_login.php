<?php
include_once "./session.php";
include_once "./header.php";
if (isset($_SESSION["id_user"])) {
    header("Location: index.php");
}
?>
<div class="add-post">
    <form action="login_check.php" method="POST" name="userLogin">
        <ul>
            <li>
                <h2>Prijava uporabnika</h2>
            </li>
            <li class="user-add">
                <label for="email">Elektronski naslov:</label>
                <input type="email" name="email">
                <span class="add-err1"></span>
            </li>
            <li class="user-add">
                <label for="password">Geslo:</label>
                <input type="password" name="password">
                <span class="add-err2"></span>
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
                <input type="submit" value="Prijavi me" name="submit">
            </li>
        </ul>
    </form>
</div>
<?php
include_once "./footer.php";
?>
