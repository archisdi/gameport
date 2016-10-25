<?php
if (isset($_POST)) {
    $connect = new mysqli("localhost", "root", "", "gameport");
    $cek_username = $connect->query("SELECT * FROM game WHERE nama LIKE '" . $_POST["namagame"] . "'");
    if ($cek_username->num_rows == 1) {
        echo "Game sudah ada !<br /><a href='addgame.php'>back</a>";
    } else {
        $connect->query("INSERT INTO game (nama,harga,kategori,rilis) VALUES ('" . $_POST["namagame"] . "','" . $_POST["harga"] . "','" . $_POST["kategori"] . "','" . $_POST["rilis"] . "')");
        header("location : /addgame.php");
        echo "add game berhasil<br /><a href='addgame.php'>back</a>";
    }
} else {
    header("location : /");
    exit();
}
?>