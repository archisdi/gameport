<?php

session_start();
if (isset($_SESSION["member_login"])) {
    $connect = new mysqli("localhost", "root", "", "gameport");

    $id_t = $_GET["profile"];
    $id_u = $_SESSION["member_login"];

    $connect->query("UPDATE teman SET status = 'Berteman' where iduser = '" . $id_t . "' and idteman =" . $id_u);
    $connect->query("INSERT INTO teman (iduser,idteman,status) VALUES ('" . $id_u . "','" . $id_t . "','Berteman')");
    
    echo "Anda berhasil berteman<br /><a href='friend.php'><strong>back to my friends</strong></a>";
} else {
    
}
header("location :admintopup.php");
exit();
?>