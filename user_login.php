<?php
include_once "./header.php";
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
            <li>
                <input type="submit" value="Prijavi me" name="submit">
            </li>
        </ul>
    </form>
</div>
<?php
include_once "./footer.php";
?>
