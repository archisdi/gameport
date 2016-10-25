<?php

if (isset($_POST)) {
    $connect = new mysqli("localhost", "root", "", "gameport");
    $cek_username = $connect->query("SELECT * FROM user WHERE username LIKE '" . $_POST["username"] . "'");
    if ($cek_username->num_rows == 1) {
        echo "username sudah digunakan, tidak dapat digunakan kembali<br /><a href='signup.php'>klik disini untuk mendaftar kembali</a>";
    } else {
        $connect->query("INSERT INTO user (nama,username,password) VALUES ('" . $_POST["nama"] . "','" . $_POST["username"] . "','" . $_POST["password"] . "')");
        echo "registrasi berhasil<br /><a href='index.php'>klik disini untuk login</a>";
    }
} else {
    header("location : /");
    exit();
}
header("location : /index.php");
exit();
?>