<?php

session_start();
if (isset($_SESSION["member_login"])) {
    $connect = new mysqli("localhost", "root", "", "gameport");
    if (isset($_GET["profile"])) {
        $id_lihat = $_GET["profile"];
    } else {
        $id_lihat = $_SESSION["member_login"];
    }

    $cek_request = $connect->query("SELECT * FROM topup WHERE idUser LIKE '" . $id_lihat . "' and status = 'Request'");
    if ($cek_request->num_rows == 0) {
        $connect->query("INSERT INTO topup (idUser,bank,tanggal,waktu,norek,berita,transfer,total) VALUES ('" . $id_lihat . "','" . $_POST["bank"] . "','" . $_POST["tanggal"] . "','" . $_POST["waktu"] . "','" . $_POST["norek"] . "','" . $_POST["berita"] . "','" . $_POST["transfer"] . "','" . $_POST["jumlah"] . "')");

    } else {
        echo 'Pay your earlier request';
    }
} else {
    //nothing
}
header("location:topup.php");
exit();
?>