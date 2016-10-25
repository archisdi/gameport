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
                                        Tambah Game
                                    </h2>
                                </div>
                            </div>
                            <div class="fb-item fb-100-item-column" id="item1">
                                <div class="fb-grouplabel">
                                    <label id="item1_label_0" style="display: inline;">Nama Game</label>
                                </div>
                                <div class="fb-input-box">
                                    <input name="namagame" id="item1_text_1" type="text" maxlength="254" placeholder=""
                                           autocomplete="off" data-hint="" required=""/>
                                </div>
                            </div>
                            <div class="fb-item fb-100-item-column" id="item2" style="opacity: 1;">
                                <div class="fb-grouplabel">
                                    <label id="item2_label_0" style="display: inline;">Harga</label>
                                </div>
                                <div class="fb-input-box">
                                    <input name="harga" id="item2_text_1" type="number" min="5000" max="10000000" maxlength="254" placeholder=""
                                           autocomplete="off" data-hint="" required="">
                                </div>
                            </div>
                            <div class="fb-item fb-100-item-column" id="item3" style="opacity: 1;">
                                <div class="fb-grouplabel">
                                    <label id="item2_label_0" style="display: inline;">Kategori</label>
                                </div>
                                <div class="fb-input-box">
                                    <select name="kategori" id="item8_select_1" required data-hint="">
                                                <option id="item8_0_option" selected value="">
                                                    Choose one
                                                </option>
                                                <option id="item8_1_option" value="FPS">
                                                    FPS
                                                </option>
                                                <option id="item8_2_option" value="Open World">
                                                    Open World
                                                </option>
                                                <option id="item8_3_option" value="Racing">
                                                    Racing
                                                </option>
                                                <option id="item8_4_option" value="RPG">
                                                    RPG
                                                </option>
                                                <option id="item8_5_option" value="Indie">
                                                    Indie
                                                </option>
                                                <option id="item8_6_option" value="Sandbox">
                                                    Sandbox
                                                </option>
                                                <option id="item8_7_option" value="Simulation">
                                                    Simulation
                                                </option>
                                                <option id="item8_8_option" value="coop">
                                                    Coop
                                                </option>
                                                <option id="item8_9_option" value="Strategy">
                                                    Strategy
                                                </option>
                                            </select>
                                </div>
                            </div>
                            <div class="fb-item fb-100-item-column" id="item4" style="opacity: 1;">
                                <div class="fb-grouplabel">
                                    <label id="item2_label_0" style="display: inline;">Rilis</label>
                                </div>
                                <div class="fb-input-box">
                                    <input name="rilis" id="item4_text_1" type="number" min="1990"
                                                   max="2015" maxlength="254" placeholder=""
                                           autocomplete="off" data-hint="" required="">
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <div class="fb-captcha fb-item-alignment-center" id="fb-captcha_control"
                         style="display: none; cursor: default;">
                        <img src="editordata/images/recaptchawhite.png" />
                    </div>
                    <div class="fb-footer fb-item-alignment-center" id="fb-submit-button-div"
                         style="min-height: 0px;">
                        <input class="fb-button-special non-standard" id="fb-submit-button" style="border-width: 0px; font-family: Helvetica, Arial; font-size: 13px;"
                               type="submit"
                               value="Tambah Game" />
                    </div>
                </form>

            </div>

        </div>
    </div>
</body>
</html>
