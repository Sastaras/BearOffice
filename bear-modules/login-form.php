<?php
session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BearOffice - Login</title>
    <link rel="stylesheet" href="../bear-css/bear.css">
</head>

<body>
    <div class="flex-center">
        <div class="container glass">
            <form action="login-form-handler.php" method="post">
                <?php include('errors.php'); ?>
                <div>
                    <label for="username">Login : </label><br />
                    <input type="text" name="username" required>
                </div>
                <div>
                    <label for="password" input="passwrd">Password : </label><br />
                    <input type="password" name="pwd" required>
                </div>
                <div>
                    <input type="submit" value="Submit">
                    <a href="../home.php"><button type="button">Back</button></a>
                </div>
            </form>

        </div>
    </div>
</body>

</html>