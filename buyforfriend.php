<?php
session_start();
if (isset($_SESSION["member_login"])) {
    $connect = new mysqli("localhost", "root", "", "gameport");
    
    $id_lihat = $_SESSION["member_login"];
    $_SESSION["game_id"] = $_GET["game"];

    $call_loggedin_member = $connect->query("SELECT * FROM user WHERE iduser=" . $id_lihat);
    $fetch_member = $call_loggedin_member->fetch_assoc();
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
                        <li><a href="mygames.php">My Games</a></li>
                        <li><a href="profile.php" class="selected"><?php echo $fetch_member["username"]; ?></a></li>
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
                        <div class="fb-form-header" id="fb-form-header1" style="min-height: 0px;">
                            <a class="fb-link-logo" id="fb-link-logo1" target="_blank"><img title="Alternative text" class="fb-logo" id="fb-logo1" style="display: none;" alt="Alternative text" src="common/images/image_default.png"/></a>
                        </div>
                        <div class="section" id="section1">
                            <div class="column ui-sortable" id="column1">

                                <div class="fb-item fb-100-item-column" id="item2">
                                    
                                    <div class="fb-input-box">
                                        <br>
                                       
                                            <p>Select friend</p>
                                            <br>
                                            <?php
                                            $call_all_data = $connect->query("SELECT * FROM teman where iduser = '" . $id_lihat ."' and status = 'Berteman'");
                                            while ($fetch_all_data = $call_all_data->fetch_assoc()) {

                                                $call_teman = $connect->query("SELECT * FROM user WHERE iduser=" . $fetch_all_data["idteman"]);
                                                $fetch_teman = $call_teman->fetch_assoc();

                                                echo "<tr>";
                                                echo "<td><a href='do_buyforfriend.php?profile=" . $fetch_teman["iduser"] .  "'>-" . $fetch_teman["nama"] . "</a><br></td>";
                                                echo "</tr>";
                                            }
                                            echo '<br>';
                                            ?>
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="fb-captcha fb-item-alignment-center" id="fb-captcha_control"
                             style="display: none; cursor: default;">
                            <img src="editordata/images/recaptchawhite.png" />
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