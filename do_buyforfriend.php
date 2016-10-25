<?php

session_start();
if (isset($_SESSION["member_login"])) {
    $connect = new mysqli("localhost", "root", "", "gameport");

    $id_them = $_GET["profile"];
    $id_us = $_SESSION["member_login"];
    $id_game = $_SESSION["game_id"];

    $call_loggedin_member = $connect->query("SELECT * FROM user WHERE iduser=" . $id_us);
    $fetch_member = $call_loggedin_member->fetch_assoc();
    
    $call_them = $connect->query("SELECT * FROM user WHERE iduser=" . $id_them);
    $fetch_them = $call_them->fetch_assoc();

    $call_game = $connect->query("SELECT * FROM game WHERE idgame=" . $id_game);
    $fetch_game = $call_game->fetch_assoc();

    $check = $connect->query("SELECT * FROM listgame WHERE iduser = '" . $id_them . "' and idgame = " . $id_game);
    if ($check->num_rows == 0) {

        if (($fetch_member["saldo"]) > ($fetch_game["harga"])) {
            $sum = $fetch_member["saldo"] - $fetch_game["harga"];
            $connect->query("UPDATE user SET saldo = '" . $sum . "' WHERE iduser=" . $id_us);
            $connect->query("INSERT INTO listgame (iduser,idgame) VALUES ('" . $id_them . "','" . $id_game . "')");
            echo "Pembelian game berhasil<br /><a href='mygames.php'><strong>back to my games</strong></a>";
        } else {
            echo "Saldo anda tidak mencukupi<br /><a href='mygames.php'><strong>back to my games</strong></a>";
        }
        
    } else {
        echo "Teman anda telah memiliki game ini<br /><a href='mygames.php'><strong>back to my games</strong></a>";
    }
} else {
    
}
header("location :admintopup.php");
exit();
?>