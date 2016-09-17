<?php
include_once "./session.php";
include_once "./header.php";
include_once "./database.php";
//pridobim id userja iz urlja ter id userja iz seje
$id_user = (int)$_GET["id"];
$session_id = (int)$_SESSION["id_user"];
//če sta idja različna preusmerim, drugače pa prikažem uporabnikov profil
if ($id_user !== $session_id) {
    header("Location: index.php");
    die();
}
//pri where pogoju sem moral določiti iz katere tabele želim id od userja, ker imata obe tabeli isto ime
$query = "SELECT username, email, COUNT(id_posts) FROM posts p INNER JOIN users u ON p.id_users=u.id_users WHERE u.id_users='$session_id'";
$result = mysqli_query($link, $query);
$details = mysqli_fetch_array($result);
?>
<div class="user-profile">
    <ul>
        <h2>Podatki o vašem profilu</h2>
        <li><span>Uporabniško ime: </span><?php echo $details[0];?></li>
        <li><span>Elektronski naslov: </span><?php echo $details[1];?></li>
        <li><span>Število objav: </span><?php echo $details[2];?></li>
    </ul>
</div>
<?php
include_once "./footer.php";
?>
