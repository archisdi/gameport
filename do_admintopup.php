<?php

session_start();
if (isset($_SESSION["admin_login"])) {
    $connect = new mysqli("localhost", "root", "", "gameport");

    $id_user = $_GET["profile"];
    $id_admin = $_SESSION["admin_login"];

    $call_loggedin_member = $connect->query("SELECT * FROM user WHERE iduser=" . $id_user);
    $fetch_member = $call_loggedin_member->fetch_assoc();


    $check = $connect->query("SELECT * FROM topup WHERE idUser LIKE '" . $id_user . "' and status = 'Request'");
    if ($check->num_rows == 1) {
        $fetch_user = $check->fetch_assoc();

        $sum = $fetch_user["total"] + $fetch_member["saldo"];

        $connect->query("UPDATE user SET saldo = '" . $sum . "' WHERE iduser=" . $id_user);
        $connect->query("UPDATE topup SET usernameAdmin = '" . $id_admin . "', status = 'Paid', deskripsi ='top up berhasil' WHERE idUser = '" . $id_user . "' and status = 'Request'");
        
        echo "konfirmasi berhasil<br /><a href='admintopup.php'><strong>back to admin menu</strong></a>";
    } else {
        echo 'no data found';
    }
} else {
    
}
header("location :admintopup.php");
exit();
?>