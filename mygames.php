<?php
session_start();
if (isset($_SESSION["member_login"])) {
    $connect = new mysqli("localhost", "root", "", "gameport");
    $id_lihat = $_SESSION["member_login"];
    if (isset($_POST["namagame"])) {
        $id_games = $_POST["namagame"];
    }


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
                        <li><a href="mygames.php" class="selected" >Games</a></li>
                        <li><a href="profile.php"><?php echo $fetch_member["username"]; ?></a></li>
                        <li><a href="friend.php">My Friends</a></li>
                        <li><a href="topup.php">Rp <?php echo $fetch_member["saldo"]; ?></a></li>
                        <li><a href="logout.php">Logout</a></li>

                    </ul>
                </nav>
                <section class="columns clear">
                    <center>
                    </center>
                    <div class="colLeft">
                        <form class="fb-toplabel fb-100-item-column selected-object" id="docContainer"
                              action="mygames.php" enctype="multipart/form-data" method="post"
                              data-form="preview">
                            <div class="fb-form-header" id="fb-form-header1" style="min-height: 0px;">
                                <a class="fb-link-logo" id="fb-link-logo1" target="_blank"><img title="Alternative text" class="fb-logo" id="fb-logo1" style="display: none;" alt="Alternative text" src="common/images/image_default.png"/></a>
                            </div>
                            <div class="section" id="section1">
                                <div class="column ui-sortable" id="column1">
                                    <div class="fb-item fb-100-item-column" id="item1">
                                        <div class="fb-header fb-item-alignment-center">
                                            <h2 style="display: inline;">
                                                Search Game
                                            </h2>
                                        </div>
                                    </div>
                                    <div class="fb-item fb-100-item-column" id="item2">
                                        <div class="fb-grouplabel">
                                            <label id="item2_label_0" style="display: inline;">Masukkan Nama Game</label>
                                        </div>
                                        <div class="fb-input-box">
                                            <input name="namagame" id="item2_text_1" type="text" maxlength="254" placeholder=""
                                                   autocomplete="off" data-hint="" required=""/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="fb-captcha fb-item-alignment-center" id="fb-captcha_control"
                                 style="display: none; cursor: default;">
                                <img src="editordata/images/recaptchawhite.png" />
                            </div>
                            <div class="fb-item-alignment-left fb-footer" id="fb-submit-button-div"
                                 style="min-height: 0px;">
                                <input class="fb-button-special" id="fb-submit-button" type="submit" data-regular="url('file:///C:/Users/Archisdiningrat/AppData/Local/Temp/FormBuilder/theme/default/images/btn_submit.png')"
                                       value="Search" />
                            </div>
                        </form>
    <?php
    if (isset($_POST["namagame"])) {
        ?>
                            
                            <form class="fb-toplabel fb-100-item-column selected-object" id="docContainer"
                                  action="" enctype="multipart/form-data" method="post" novalidate="novalidate"
                                  data-form="preview">
                                <div class="fb-form-header" id="fb-form-header1" style="min-height: 0px;">
                                    <a class="fb-link-logo" id="fb-link-logo1" target="_blank"><img title="Alternative text" class="fb-logo" id="fb-logo1" style="display: none;" alt="Alternative text" src="common/images/image_default.png"/></a>
                                </div>
                                <div class="section" id="section1">
                                    <div class="column ui-sortable" id="column1">

                                        <div class="fb-item fb-100-item-column" id="item2">
                                            <div class="fb-grouplabel">

                                            </div>
                                            <div class="fb-input-box">
        <?php
        if (isset($_POST["namagame"])) {
            $call_all_data = $connect->query("SELECT * FROM game WHERE nama like '" . $id_games . "'");
            if ($fetch_all_data = $call_all_data->fetch_assoc()) {
                echo "<tr>";
                echo "<p>Game ditemukan </p><br>";
                echo "<td>Nama Game : " . $fetch_all_data["nama"] . "<br></td>";
                echo "<td>Harga     : Rp." . $fetch_all_data["harga"] . "<br></td>";
                echo "<td>Kategori  : " . $fetch_all_data["kategori"] . "<br></td>";
                echo "<td>Rilis     : " . $fetch_all_data["rilis"] . "<br><br></td>";
                $checkgame = $connect->query("SELECT * FROM listgame WHERE iduser='" . $id_lihat . "' and idgame =" . $fetch_all_data["idgame"]);
                if ($checkgame->num_rows == 0) {
                    echo "<td><a href='do_buygame.php?profile=" . $fetch_all_data["idgame"] . "'>Buy</a><br></td>";
                    echo "<td><a href='buyforfriend.php?game=" . $fetch_all_data["idgame"] . "'>Buy for friend</a><br><br></td>";
                } else {
                    echo "<td><a href='buyforfriend.php?game=" . $fetch_all_data["idgame"] . "'>Buy for friend</a><br><br></td>";
                }
                echo "</tr>";
            } else {
                echo '<p>Game Tidak Ditemukan</p>';
                echo '<br>';
                
            }
        } else {
            echo '<br>';
            echo '<br>';
        }
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
        <?php
    }else{
        
    }
    ?>

                    </div>
                    <div class="colRight">
                        <form class="fb-toplabel fb-100-item-column selected-object" id="docContainer"
                              action="" enctype="multipart/form-data" method="post" novalidate="novalidate"
                              data-form="preview">
                            <div class="fb-form-header" id="fb-form-header1" style="min-height: 0px;">
                                <a class="fb-link-logo" id="fb-link-logo1" target="_blank"><img title="Alternative text" class="fb-logo" id="fb-logo1" style="display: none;" alt="Alternative text" src="common/images/image_default.png"/></a>
                            </div>
                            <div class="section" id="section1">
                                <div class="column ui-sortable" id="column1">

                                    <div class="fb-item fb-100-item-column" id="item2">
                                        <div class="fb-grouplabel">

                                        </div>
                                        <div class="fb-input-box">
                                            <p>My Games</p>
                                            <br>
    <?php
    $call_all_data = $connect->query("SELECT * FROM listgame where iduser =" . $id_lihat);
    if ($call_all_data->num_rows >= 1) {
        while ($fetch_all_data = $call_all_data->fetch_assoc()) {

            $call_game = $connect->query("SELECT * FROM game WHERE idgame=" . $fetch_all_data["idgame"]);
            $fetch_game = $call_game->fetch_assoc();

            echo "<tr>";
            echo "<td><a href='gamedetails.php?profile=" . $fetch_game["idgame"] . "'>-" . $fetch_game["nama"] . "</a><br></td>";
            echo "</tr>";
        }
    } else {
        echo 'Kamu tidak memiliki Game';
        echo '<br>';
    }
    echo '<br>';
    ?>

                                        </div>
                                    </div>
                                </div>
                                <div class="fb-captcha fb-item-alignment-center" id="fb-captcha_control"
                                     style="display: none; cursor: default;">
                                    <img src="editordata/images/recaptchawhite.png" />
                                </div>

                        </form>
                    </div>
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