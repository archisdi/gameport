<?php
session_start();
if (isset($_SESSION["member_login"])) {
    $connect = new mysqli("localhost", "root", "", "gameport");
    if (isset($_GET["profile"])) {
        $id_lihat = $_GET["profile"];
    } else {
        $id_lihat = $_SESSION["member_login"];
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
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
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
                        <li><a href="profile.php"><?php echo $fetch_member["username"]; ?></a></li>
                        <li><a href="friend.php">My Friends</a></li>
                        <li><a href="topup.php" class="selected">Rp <?php echo $fetch_member["saldo"]; ?></a></li>
                        <li><a href="logout.php">Logout</a></li>

                    </ul>
                </nav>
                <section class="columns clear">
                    <center>
                    </center>
                    <br>
                    <div class="colLeft">
                        <form class="fb-toplabel fb-100-item-column selected-object" id="docContainer"
                              style="border-style: ridge; max-width: 500px; background-color: rgb(246, 246, 246);"
                              action="do_topup.php" enctype="multipart/form-data" method="POST"
                              data-form="preview">
                            <div class="fb-form-header" id="fb-form-header1">
                                <a class="fb-link-logo" id="fb-link-logo1" style="max-width: 104px;" target="_blank"><img title="Alternative text" class="fb-logo" id="fb-logo1" style="width: 100%; display: none;" alt="Alternative text" src="common/images/image_default.png"/></a>
                            </div>
                            <div class="section" id="section1">
                                <div class="column ui-sortable" id="column1">
                                    <div class="fb-item fb-100-item-column" id="item1">
                                        <div class="fb-header fb-item-alignment-center">
                                            <h2 style="display: inline;">
                                                Top Up Saldo
                                            </h2>
                                        </div>
                                    </div>
                                    <div class="fb-item fb-100-item-column" id="item3">
                                        <div class="fb-grouplabel">
                                            <label id="item3_label_0" style="display: inline;">Bank Tujuan</label>
                                        </div>
                                        <div class="fb-dropdown">
                                            <select name="bank" id="item3_select_1" required data-hint="">
                                                <option id="item3_0_option" selected value="">
                                                    Choose one
                                                </option>
                                                <option id="item3_1_option" value="BCA - Archie Atrie I - 0255706611">
                                                    BCA - Archie Atrie I - 0255706611
                                                </option>
                                                <option id="item3_2_option" value="BNI - Archie Atrie I - 0330140431">
                                                    BNI - Archie Atrie I - 0330140431
                                                </option>
                                                <option id="item3_3_option" value="MANDIRI - Archie Atrie I - 21344723451">
                                                    MANDIRI - Archie Atrie I - 21344723451
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="fb-item fb-100-item-column" id="item4">
                                        <div class="fb-grouplabel">
                                            <label id="item4_label_0" style="display: inline;">Pemilik - No.rek</label>
                                        </div>
                                        <div class="fb-input-box">
                                            <input name="norek" id="item4_text_1" required type="text" maxlength="254"
                                                   placeholder="ghassan amanullah - 0244581172" data-hint="" autocomplete="off"
                                                   />
                                        </div>
                                    </div>
                                    <div class="fb-item fb-100-item-column" id="item10">
                                        <div class="fb-grouplabel">
                                            <label id="item10_label_0" style="display: inline;">Tanggal Transfer</label>
                                        </div>
                                        <div class="fb-input-date">
                                            <input name="tanggal" class="datepicker" id="item10_date_1" required type="date"
                                                   data-hint="" />
                                        </div>
                                    </div>
                                    <div class="fb-item fb-100-item-column" id="item12">
                                        <div class="fb-grouplabel">
                                            <label id="item12_label_0" style="display: inline;">Waktu Transfer</label>
                                        </div>
                                        <div class="fb-input-box">
                                            <input name="waktu" id="item12_text_1" required type="time" maxlength="254"
                                                   placeholder="" data-hint="" autocomplete="off" />
                                        </div>
                                    </div>
                                    <div class="fb-item fb-100-item-column" id="item6">
                                        <div class="fb-grouplabel">
                                            <label id="item6_label_0" style="display: inline;">Jumlah</label>
                                        </div>
                                        <div class="fb-input-number">
                                            <input name="jumlah" id="item6_number_1" required type="number" min="25000"
                                                   max="10000000" step="1" placeholder="50000" data-hint="minimal topup Rp.25.000 dan maksimal topup Rp.10.000.000"
                                                   autocomplete="off" />
                                            <div class="fb-hint" style="color: rgb(136, 136, 136); font-style: normal; font-weight: normal;">
                                                minimal topup Rp.25.000 dan maksimal topup Rp.10.000.000
                                            </div>
                                        </div>
                                    </div>
                                    <div class="fb-item fb-100-item-column" id="item7">
                                        <div class="fb-grouplabel">
                                            <label id="item7_label_0" style="display: inline;">Berita</label>
                                        </div>
                                        <div class="fb-input-box">
                                            <input name="berita" id="item7_text_1" type="text" maxlength="254" placeholder=""
                                                   data-hint="masukkan no.telp atau kosongkan" autocomplete="off" />
                                            <div class="fb-hint" style="color: rgb(136, 136, 136); font-style: normal; font-weight: normal;">
                                                masukkan no.telp atau kosongkan
                                            </div>
                                        </div>
                                    </div>
                                    <div class="fb-item fb-100-item-column" id="item8">
                                        <div class="fb-grouplabel">
                                            <label id="item8_label_0" style="display: inline;">Cara Transfer</label>
                                        </div>
                                        <div class="fb-dropdown">
                                            <select name="transfer" id="item8_select_1" required data-hint="">
                                                <option id="item8_0_option" selected value="">
                                                    Choose one
                                                </option>
                                                <option id="item8_1_option" value="ATM">
                                                    ATM
                                                </option>
                                                <option id="item8_2_option" value="E-Banking">
                                                    E-Banking
                                                </option>
                                                <option id="item8_3_option" value="Internet Banking">
                                                    Internet Banking
                                                </option>
                                                <option id="item8_4_option" value="Setoran tunai">
                                                    Setoran tunai
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="fb-captcha fb-item-alignment-center" id="fb-captcha_control"
                                 style="display: none; cursor: default;">
                                <img src="editordata/images/recaptchawhite.png" />
                            </div>
                            <div class="fb-footer fb-item-alignment-center" id="fb-submit-button-div"
                                 style="min-height: 1px;">
                                <input class="fb-button-special" id="fb-submit-button" style="border-width: 0px; font-family: Helvetica, Arial; background-image: url('theme/default/images/btn_submit.png');"
                                       type="submit" data-regular="url('file:///C:/Users/Archie/AppData/Local/Temp/FormBuilder/theme/default/images/btn_submit.png')"
                                       value="Request" />
                            </div>
                        </form>
                    </div>

                    <div class="colRight">
                        <form class="fb-toplabel fb-100-item-column selected-object" id="docContainer"
                              style="border-style: ridge; max-width: 500px; background-color: rgb(246, 246, 246);"
                              action="do_topup.php" enctype="multipart/form-data" method="POST"
                              data-form="preview">
                            <div class="fb-form-header" id="fb-form-header1">
                                <a class="fb-link-logo" id="fb-link-logo1" style="max-width: 104px;" target="_blank"><img title="Alternative text" class="fb-logo" id="fb-logo1" style="width: 100%; display: none;" alt="Alternative text" src="common/images/image_default.png"/></a>
                            </div>
                            <div class="section" id="section1">
                                <div class="column ui-sortable" id="column1">
                                    <div class="fb-item fb-100-item-column" id="item1">
                                        <div class="fb-header fb-item-alignment-center">
                                            <h2 style="display: inline;">
                                                Top Up History
                                            </h2>
                                            <br><br>
                                            <?php
                                            $call_all_data = $connect->query("SELECT * FROM topup where idUser = '" . $id_lihat . "' limit 5");
                                            if ($call_all_data->num_rows >= 1) {
                                                while ($fetch_all_data = $call_all_data->fetch_assoc()) {

                                                    echo "<tr>";
                                                    echo "<td>ID Topup  : " . $fetch_all_data["idtransaksi"] . "<br></td>";
                                                    echo "<td>Jumlah    : RP. " . $fetch_all_data["total"] . "<br></td>";
                                                    echo "<td>Status    : " . $fetch_all_data["status"] . "<br></td>";
                                                    echo "<td>Deskripsi : " . $fetch_all_data["deskripsi"] . "<br><br></td>";
                                                    echo "</tr>";
                                                }
                                            } else {
                                                echo 'No topup history';
                                            }
                                            echo "<td><a href='allhistory.php'>View all top up history</a><br></td>";
                                            ?>



                                        </div>
                                    </div>                         
                                </div>
                            </div>
                            <br>
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