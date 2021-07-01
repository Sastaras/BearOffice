<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BearOffice Setup</title>
</head>

<body>
    <form action="bear-setup-handler.php" method="post">
        <div>
            <label for="server">Server address: </label>
            <input type="text" name="server">
        </div>
        <div>
            <label for="server-user">Server username: </label>
            <input type="text" name="serveruser">
        </div>
        <div>
            <label for="server-pwd" input="password">Server password: </label>
            <input type="password" name="serverpwd">
        </div>
        <div>
            <label for="db-name">Database name: </label>
            <input type="text" name="dbname">
        </div>
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
    </form>
</body>

</html>