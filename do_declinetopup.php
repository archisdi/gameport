<?php

session_start();
if (isset($_SESSION["admin_login"])) {
    $connect = new mysqli("localhost", "root", "", "gameport");

    $deskripsi = $_POST["deskripsi"];
    $id_user = $_SESSION["userid"];
    $id_admin = $_SESSION["admin_login"];

    $call_loggedin_member = $connect->query("SELECT * FROM user WHERE iduser=" . $id_user);
    $fetch_member = $call_loggedin_member->fetch_assoc();


    $check = $connect->query("SELECT * FROM topup WHERE idUser LIKE '" . $id_user . "' and status = 'Request'");
    if ($check->num_rows == 1) {
        $fetch_user = $check->fetch_assoc();

        $connect->query("UPDATE topup SET usernameAdmin = '" . $id_admin . "', status = 'Rejected', deskripsi ='" . $deskripsi . "' WHERE idUser = '" . $id_user . "' and status = 'Request'");
        
        echo "rejected<br /><a href='admintopup.php'><strong>back to admin menu</strong></a>";
    } else {
        echo 'no data found';
    }
} else {
    
}
header("location :admintopup.php");
exit();
?>