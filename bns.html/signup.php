<?php
include 'user.class.php';
include_once 'database.class.php';
error_reporting(0);

if ($_POST["username"] != null && $_POST["password"] != null  && !empty($_POST["password"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $sign = user::signup($username, $password);
    if ($sign) {

?>
        <script>
            alert("Registration success");
            window.location.replace("http://localhost/bns.html/signin1.php");
        </script>
    <?php

    } else {
        echo "something went wrong,try again signing up";
    }
} else { ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>UTT - Login Page</title>
        <link rel="stylesheet" href="loginstyle.css">

    </head>

    <body>
        <!-- partial:index.partial.html -->
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Login Page</title>
            <link rel="stylesheet" href="css/style.css">
            <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        </head>

        <body>

            <div id="wrapper">
                <div id="table">
                    <a href="signin1.php" class="">login</a>
                    <a class="active">Sign Up</a>
                </div>
                <div id="signin">
                    <form action="<?php $_SERVER["PHP_SELF"]; ?>" method="post">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" id="username" name="username" autofocus>
                        </div>
                        <div class="form-group">
                            <label for="pass">Password</label>
                            <input type="password" id="pass" name="password">
                            <span id="showpwd" class="fa fa-eye-slash"></span>
                        </div>

                        <div class="form-group">
                            <input type="submit" value="Register">
                        </div>
                    </form>
                    <div class="hr"></div>

                </div>

            </div>
        <?php } ?>
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script>
            $(document).ready(function() {
                $("#showpwd").on("click", function() {
                    $(this).toggleClass("fa-eye fa-eye-slash");
                    $($(this).siblings()[1]).attr("type", function(index, attr) {
                        return attr == "password" ? "text" : "password"
                    });
                });
            })
        </script>
        </body>

        </html>
        <!-- partial -->

    </body>

    </html>