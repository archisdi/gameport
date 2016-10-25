<?php
session_start();
if (isset($_SESSION["admin_login"])) {
    $connect = new mysqli("localhost", "root", "", "gameport");
    if (isset($_GET["profile"])) {
        $id_lihat = $_GET["profile"];
    } else {
        $id_lihat = $_SESSION["admin_login"];
    }
    //$call_loggedin_member = $connect->query("SELECT * FROM admin WHERE username=" . $id_lihat);
    //$fetch_member = $call_loggedin_member->fetch_assoc();
    ?>

    <!DOCTYPE html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="Copyright" content="Copyright (c) 2011 CoffeeCup, all rights reserved." />
        <title></title>

        <link href="new_menu/stylesheets/menu_builder.css" media="screen" rel="stylesheet" type="text/css" />
        <link href="new_menu/stylesheets/style.css" media="screen" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="new_menu/js/jquery-1.8.2.min.js"></script>
        <script type="text/javascript" src="new_menu/js/modernizr-2.6.2-respond-1.1.0.min.js"></script>
        <script type="text/javascript" src="new_menu/js/tinynav.js"></script>
        <script type="text/javascript" src="new_menu/js/mb.js"></script>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <script type="text/javascript" src="common/js/form_init.js" id="form_init_script"data-name=""></script>
        <link rel="stylesheet" type="text/css" href="theme/default/css/default.css"id="theme" />


    </head>
    <body>
        <div id="menuBuilderContainer">
            <div id="menuBuilder">
                <button class="nav-button button bar"><i class="icon_menu_handle"></i><span class="text_menu_link">MENU</span></button>
                <div id="nav" class="nav">
                    <ul id="mainmenu" class="nav-collapse">
                        <li id="menu_1" class="menu_1 menu_items">
                            <a href="addgame.php">
                                <span class="icon_menu_handle"></span>
                                <span class="text_menu_link">Tambah Game</span>
                            </a></li>
                        <li id="menu_2" class="has-flyout menu_2 menu_items">
                            <a href="admingame.php">
                                <span class="icon_menu_handle"></span>
                                <span class="text_menu_link">Lihat Game</span>
                            </a>

                        </li><li id="menu_6" class="menu_6 menu_items">
                            <a href="admintopup.php">
                                <span class="icon_menu_handle"></span>
                                <span class="text_menu_link">Top Up Request</span>
                            </a>
                        </li>
                        <li id="menu_7" class="menu_7 menu_items">
                            <a href="logout.php">
                                <span class="icon_menu_handle"></span>
                                <span class="text_menu_link">Logout</span>
                            </a>
                        </li>
                    </ul>
                    <form class="fb-toplabel fb-100-item-column selected-object" id="docContainer" action="do_addgame.php" enctype="multipart/form-data" method="post" data-form="preview">
                        <div class="fb-form-header" id="fb-form-header1" style="min-height: 0px;">
                            <a class="fb-link-logo" id="fb-link-logo1" target="_blank"><img title="Alternative text" class="fb-logo" id="fb-logo1" style="display: none;" alt="Alternative text" src="common/images/image_default.png"/></a>
                        </div>
                        <div class="section" id="section1">
                            <div class="column ui-sortable" id="column1">
                                <div class="fb-item fb-100-item-column" id="item5">
                                    <div class="fb-header fb-item-alignment-center">
                                        <h2 style="display: inline;">
                                            Daftar Game
                                        </h2>
                                    </div>
                                </div>
                                <div class="fb-item fb-100-item-column" id="item1">
                                </div>
                                <div class="fb-item fb-100-item-column" id="item2">
                                    <?php
                                    $call_all_data = $connect->query("SELECT * FROM game");
                                    while ($fetch_all_data = $call_all_data->fetch_assoc()) {
                                        echo "<tr>";
                                        echo "<td>Name Game : " . $fetch_all_data["nama"] . "<br></td>";
                                        echo "<td>Harga     : Rp." . $fetch_all_data["harga"] . "<br></td>";
                                        echo "<td>Kategori  : " . $fetch_all_data["kategori"] . "<br></td>";
                                        echo "<td>Rilis     : " . $fetch_all_data["rilis"] . "<br><br></td>";
                                        echo "</tr>";
                                    }
                                    ?>
                                    <br>
                                </div>

                            </div>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </body>
    </html>

    <?php
} else {
    header("location:adminlog.php");
    exit();
}
?>
