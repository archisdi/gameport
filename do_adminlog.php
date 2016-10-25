<?php

session_start();

if (isset($_POST)) {
    $connect = new mysqli("localhost", "root", "", "gameport");
    $username = $_POST["username"];
    $password = $_POST["password"];

    $cek_member = $connect->query("SELECT * FROM admin WHERE username = '" . $username . "' AND password = '" . $password . "'");
    if ($cek_member->num_rows == 1) {
        $fetch_member = $cek_member->fetch_assoc();
        $id_member_login = $fetch_member["username"];
        $_SESSION["admin_login"] = $id_member_login;
        header("location: adminhome.php");
        exit();
    } else {
        header("location: adminlog.php");
        exit();
    }
} else {
    header("location : adminlog.php");
    exit();
}
?>