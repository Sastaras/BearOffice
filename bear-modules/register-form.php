<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BearOffice - Register</title>
</head>

<body>
    <form action="register-form-handler.php" method="post">
        <div>
            <label for="username">Username: </label>
            <input type="text" name="username">
        </div>
        <div>
            <label for="e-mail">E-mail: </label>
            <input type="email" name="email">
        </div>
        <div>
            <label for="password" input="password">Password: </label>
            <input type="password" name="pwd">
        </div>
        <div>
            <label for="password-confirm">Confirm password: </label>
            <input type="password" name="pwdconf">
        </div>
        <div>
            <input type="submit" value="Submit">
        </div>
</body>

</html>