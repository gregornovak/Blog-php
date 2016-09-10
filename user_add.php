<?php
include_once "./header.php";
?>
<div class="add-post">
    <form action="user_insert.php" method="POST" name="userInsert" onsubmit="return isInsertValid();">
        <ul>
            <li>
                <h2>Registracija uporabnika</h2>
            </li>
            <li class="user-add">
                <label for="username">Uporabniško ime:</label>
                <input type="text" name="username">
                <span class="add-err1"></span>
            </li>
            <li class="user-add">
                <label for="email">E-mail:</label>
                <input type="email" name="email">
                <span class="add-err2"></span>
            </li>
            <li class="user-add">
                <label for="password1">Geslo:</label>
                <input type="password" name="password1">
                <span class="add-err3"></span>
            </li>
            <li class="user-add">
                <label for="password2">Ponovi geslo:</label>
                <input type="password" name="password2">
                <span class="add-err3"></span>
            </li>
            <li>
                <input type="submit" name="submit" value="Registriraj me">
            </li>

        </ul>
    </form>

</div>
<?php
include_once "./footer.php";
?>
