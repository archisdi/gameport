<?php
session_start();
if (isset($_SESSION["member_login"])) {
    $connect = new mysqli("localhost", "root", "", "gameport");
    if (isset($_POST["namauser"])) {
        $id_teman = $_POST["namauser"];
    }
    $id_lihat = $_SESSION["member_login"];

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
                        <li><a href="mygames.php" >Games</a></li>
                        <li><a href="profile.php"><?php echo $fetch_member["username"]; ?></a></li>
                        <li><a href="friend.php" class="selected">My Friends</a></li>
                        <li><a href="topup.php">Rp <?php echo $fetch_member["saldo"]; ?></a></li>
                        <li><a href="logout.php">Logout</a></li>

                    </ul>
                </nav>
                <section class="columns clear">
                    <center>
                    </center>
                    <div class="colLeft">
                        <form class="fb-toplabel fb-100-item-column selected-object" id="docContainer"
                              action="friend.php" enctype="multipart/form-data" method="post"
                              data-form="preview">
                            <div class="fb-form-header" id="fb-form-header1" style="min-height: 0px;">
                                <a class="fb-link-logo" id="fb-link-logo1" target="_blank"><img title="Alternative text" class="fb-logo" id="fb-logo1" style="display: none;" alt="Alternative text" src="common/images/image_default.png"/></a>
                            </div>
                            <div class="section" id="section1">
                                <div class="column ui-sortable" id="column1">
                                    <div class="fb-item fb-100-item-column" id="item1">
                                        <div class="fb-header fb-item-alignment-center">
                                            <h2 style="display: inline;">
                                                Search User
                                            </h2>
                                        </div>
                                    </div>
                                    <div class="fb-item fb-100-item-column" id="item2">
                                        <div class="fb-grouplabel">
                                            <label id="item2_label_0" style="display: inline;">Masukkan Nama User</label>
                                        </div>
                                        <div class="fb-input-box">
                                            <input name="namauser" id="item2_text_1" type="text" maxlength="254" placeholder=""
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
                        if (isset($_POST["namauser"])) {
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
                                                if (isset($_POST["namauser"])) {
                                                    $call_all_data = $connect->query("SELECT * FROM user WHERE nama like '" . $id_teman . "'");
                                                    if ($fetch_all_data = $call_all_data->fetch_assoc()) {
                                                        echo "<tr>";
                                                        echo "<p>User ditemukan </p><br>";
                                                        echo "<td>Nama User : " . $fetch_all_data["nama"] . "<br></td>";
                                                        echo "<td>ID User   : " . $fetch_all_data["iduser"] . "<br></td>";
                                                        echo "<td>Username  : " . $fetch_all_data["username"] . "<br><br></td>";
                                                        $checkfriend = $connect->query("SELECT * FROM teman WHERE iduser='" . $id_lihat . "' and idteman =" . $fetch_all_data["iduser"]);
                                                        if ($checkfriend->num_rows == 0) {
                                                        echo "<td><a href='do_addfriend.php?profile=" . $fetch_all_data["iduser"] . "'>Add</a><br><br></td>";
                                                        echo "</tr>";
                                                        }else{
                                                            echo "Anda telah berteman<br><br></td>";
                                                            echo "</tr>";
                                                        }
                                                    } else {
                                                        echo '<p>User Tidak Ditemukan</p>';
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
                        } else {
                            
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
                                            <p>My Friend</p>
                                            <br>
                                            <?php
                                            $call_all_data = $connect->query("SELECT * FROM teman where iduser = '" . $id_lihat . "' and status = 'Berteman'");
                                            if ($call_all_data->num_rows >= 1) {
                                            while ($fetch_all_data = $call_all_data->fetch_assoc()) {

                                                $call_teman = $connect->query("SELECT * FROM user WHERE iduser=" . $fetch_all_data["idteman"]);
                                                $fetch_teman = $call_teman->fetch_assoc();

                                                echo "<tr>";
                                                echo "<td><a href='profile.php?profile=" . $fetch_teman["iduser"] . "'>-" . $fetch_teman["nama"] . "</a><br></td>";
                                                echo "</tr>";
                                            }
                                            }else{
                                            echo 'Anda tidak memiliki teman';
                                            echo '<br>';
                                            echo '<br>';
                                            }
                                            ?>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
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
                                            <p>Friend Request</p>
                                            <br>
                                            <?php
                                            $call_all_data = $connect->query("SELECT * FROM teman where status = 'Pending' and idteman = " . $id_lihat);
                                            if ($call_all_data->num_rows >= 1) {
                                            while ($fetch_all_data = $call_all_data->fetch_assoc()) {
                                            
                                                $call_user = $connect->query("SELECT * FROM user WHERE iduser=" . $fetch_all_data["iduser"]);
                                                $fetch_user = $call_user->fetch_assoc();

                                                echo "<tr>";
                                                echo "<td>Nama user : " . $fetch_user["nama"] . "<br></td>";
                                                echo "<td>ID user   : " . $fetch_user["iduser"] . "<br></td>";
                                                echo "<td><a href='do_confirmfriend.php?profile=" . $fetch_all_data["iduser"] . "'>Accept Friend Request</a><br></td>";
                                                echo "<td><a href='do_declinefriend.php?profile=" . $fetch_all_data["iduser"] . "'>Decline Friend Request</a><br><br></td>";
                                                echo "</tr>";
                                                
                                            }
                                            }else{
                                                echo "Tidak ada friend request";
                                                echo"<br>";echo"<br>";
                                            }
                                            ?>
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