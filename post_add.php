<?php
include_once "./header.php";
?>
<div class="add-post">
    <form action="" method="">
        <ul>
            <li>
                <h2>Dodaj objavo!</h2>
            </li>
            <li>
                <label for="title">Naslov objave:</label>
                <input type="text" name="title">
            </li>
            <li>
                <label for="content">Vsebina objave:</label>
                <textarea name="content"></textarea>
            </li>
            <li>
                <input type="submit" value="Dodaj">
            </li>
        </ul>
    </form>
</div>
<?php
include_once "./footer.php";
?>
