<?php

session_start();

if (isset($_POST)) {
    $connect = new mysqli("localhost", "root", "", "gameport");
    $username = $_POST["username"];
    $password = $_POST["password"];

    $cek_member = $connect->query("SELECT * FROM user WHERE username LIKE '" . $username . "' AND password LIKE '" . $password . "'");
    if ($cek_member->num_rows == 1) {
        $fetch_member = $cek_member->fetch_assoc();
        $id_member_login = $fetch_member["iduser"];
        $_SESSION["member_login"] = $id_member_login;
        header("location: home.php");
        exit();
    } else {
        echo "member belum terdaftar, silahkan<br /><a href='signup.php'><strong>registrasi disini</strong></a> atau <a href='index.php'><strong>coba login kembali disini</strong></a>";
    }
} else {
    header("location : login.php");
    exit();
}
?>