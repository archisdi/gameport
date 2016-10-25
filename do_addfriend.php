<?php
session_start();
if (isset($_SESSION["member_login"])) {
    $connect = new mysqli("localhost", "root", "", "gameport");

    $id_t = $_GET["profile"];
    $id_u = $_SESSION["member_login"];

    $call_u = $connect->query("SELECT * FROM user WHERE iduser=" . $id_u);
    $fetch_u = $call_u->fetch_assoc();

    $call_t = $connect->query("SELECT * FROM user WHERE iduser=" . $id_t);
    $fetch_t = $call_t->fetch_assoc();

    $check = $connect->query("SELECT * FROM teman WHERE iduser = '" . $id_u . "'and status = 'Berteman' and idteman = " . $id_t);
    if ($check->num_rows == 0) {
        $check = $connect->query("SELECT * FROM teman WHERE iduser = '" . $id_u . "'and status = 'Pending' and idteman = " . $id_t);
           if ($check->num_rows == 0) {
                $connect->query("INSERT INTO teman (iduser,idteman,status) VALUES ('" . $id_u . "','" . $id_t . "','Pending')");
                echo "Anda berhasil mengirim permintaan berteman<br /><a href='friend.php'><strong>back to my friends</strong></a>";
           }else{
               echo "Anda telah mengirim permintaan berteman<br /><a href='friend.php'><strong>back to my friends</strong></a>";
           }
            
    } else {
        echo "Anda telah berteman<br /><a href='friend.php'><strong>back to my friends</strong></a>";
    }
} else {
    
}
header("location :admintopup.php");
exit();
?>