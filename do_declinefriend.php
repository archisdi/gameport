<?php

session_start();
if (isset($_SESSION["member_login"])) {
    $connect = new mysqli("localhost", "root", "", "gameport");

    $id_t = $_GET["profile"];
    $id_u = $_SESSION["member_login"];

    $connect->query("DELETE FROM teman WHERE iduser = '" . $id_t . "' and idteman = '" . $id_u . "' and `status`= 'Pending'");
    
    echo "Anda mendelete permintaan pertemanan<br /><a href='friend.php'><strong>back to my friends</strong></a>";
} else {
    
}
header("location :admintopup.php");
exit();
?>