<?php
session_start();
if (isset($_SESSION["member_login"])) {
    $connect = new mysqli("localhost", "root", "", "gameport");

        $id_game = $_GET["profile"];
        $id_lihat = $_SESSION["member_login"];
    
    $call_loggedin_member = $connect->query("SELECT * FROM user WHERE iduser=" . $id_lihat);
    $fetch_member = $call_loggedin_member->fetch_assoc();
    
    $checkgame = $connect->query("SELECT * FROM listgame WHERE iduser='" . $id_lihat . "' and idgame =" . $id_game);
    $check = $checkgame->fetch_assoc();
    ?>
    <!DOCTYPE html>
    <html>
        <head>
            <meta charset="utf-8">
            <meta name="Description" content="Kids Theme">
            <meta name="author" content="CoffeeCup Software, Inc.">
            <title>Gameport Home</title>
            <link rel="stylesheet" href="stylesheets/default.css" />
            <link rel="stylesheet" type="text/css" href="theme/default/css/default.css" id="theme" />
        </head>
        <body>
            <header>
                <div id="logoTxt">
                </div>
            </header>
            <section id="mainRight" class="clear">
                <nav>
                    <ul>
                        <li><a href="home.php">Home</a></li>
                        <li><a href="mygames.php" class="selected">My Games</a></li>
                        <li><a href="profile.php"><?php echo $fetch_member["username"]; ?></a></li>
                        <li><a href="friend.php">My Friends</a></li>
                        <li><a href="topup.php">Rp <?php echo $fetch_member["saldo"]; ?></a></li>
                        <li><a href="logout.php">Logout</a></li>
                    </ul>
                </nav>
                <section class="columns clear">
                    <center>
                    </center>
                    <br><br><br>
                    <form class="fb-toplabel fb-100-item-column selected-object" id="docContainer"
                          action="" enctype="multipart/form-data" method="post" novalidate="novalidate"
                          data-form="preview">
                        
                        <div class="section" id="section1">
                            <div class="column ui-sortable" id="column1">

                                <div class="fb-item fb-100-item-column" id="item2">
                                    
                                    <div class="fb-input-box">
                                        <br>
                                        <h>
                                            <?php
                                            $call_all_data = $connect->query("SELECT * FROM game where idgame =" . $id_game);
                                            while ($fetch_all_data = $call_all_data->fetch_assoc()) {
                                                echo "<tr>";
                                                echo "<td><p>" . $fetch_all_data["nama"] . "</p><br></td>";
                                                echo "<td>Harga     : Rp." . $fetch_all_data["harga"] . "<br></td>";
                                                echo "<td>Kategori  : " . $fetch_all_data["kategori"] . "<br></td>";
                                                echo "<td>Rilis     : " . $fetch_all_data["rilis"] . "<br><br></td>";
                                                echo "</tr>";
                                                if ($checkgame->num_rows == 0) {
                                                    echo "<td><a href='do_buygame.php?profile=" . $fetch_all_data["idgame"] . "'>Buy</a><br></td>";
                                                    echo "<td><a href='buyforfriend.php?game=" . $fetch_all_data["idgame"] . "'>Buy for friend</a><br><br></td>";
                                                }else{
                                                    echo "<td><a href='buyforfriend.php?game=" . $fetch_all_data["idgame"] . "'>Buy for friend</a><br><br></td>";
                                                }
                                            }
                                            ?>
                                        </h>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </section>
                <!-- end columns -->
                <footer>

                    <p>&copy; 2015 GamePort, Inc. All rights reserved.</p>

                </footer>
            </section>
            <!-- end mainRight -->
        </body>
    </html>

    <?php
} else {
    header("location:index.php");
    exit();
}
?>