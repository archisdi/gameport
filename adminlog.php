<?php
session_start();
if (!isset($_SESSION["member_login"])) {
    ?>
    <html>
        <head>
            <title>GamePort Login</title>
            <meta charset="utf-8">
            <link href="css/style.css" rel='stylesheet' type='text/css' />
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
            <!--webfonts-->
            <link href='http://fonts.googleapis.com/css?family=Oxygen:400,300,700|Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
            <!--//webfonts-->

        </head>

        <body>
            <div class="main">
                <div class="user">
                    <a href="index.php"><img src="images/user.png" alt=""></a>
                </div>
                <div class="login">
                    <div class="inset">
                        <!-----start-main---->
                        <form name="formL" action="do_adminlog.php" method="post">
                            <div>
                                <span><label>ADMIN Login</label></span>
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                            <div>
                                <span><label for="username">Username</label></span>
                                <span><input type="text" class="textbox" id="active" name="username" required=""></span>
                            </div>
                            <div>
                                <span><label for="password">Password</label></span>
                                <span><input type="password" class="password" id="active" name="password" required=""></span>
                            </div>
                            <div class="sign">
                                <div class="submit">
                                    <input type="submit" value="LOGIN">
                                </div>
                                <span class="forget-pass">

                                </span>

                                <div class="clear"> </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-----//end-main---->
            </div>
            <!-----start-copyright---->
            <div class="copy-right">

            </div>
            <!-----//end-copyright---->

        </body>
    </html>
    <?php
} else {
    header("location: home.php");
    exit();
}
?>
