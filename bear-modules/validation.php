<?php
session_start();
require_once("db-connect.php");

$username = $_GET["log"];
$validkey = $_GET["key"];

$query= $db->prepare("SELECT validkey,active FROM Bear_users WHERE username like :username");
if($query->execute(array(":username" => $username)) && $row = $query->fetch()){

    $rowkey = $row["validkey"];
    $active = $row["active"];
}

if($active =="1"){ echo "Account has already been activated, you will be redirected on login page in 5 seconds.";
    header( "refresh:5;url=login-form.php" );}
else {
    if ($validkey == $rowkey){
        $query = $db->prepare("UPDATE Bear_users SET active = 1 WHERE username like :username");
        $query->bindParam(":username", $username);
        $query->execute();

        echo "Your account has been activated, you will be redirected on login page in 5 seconds.";
        header( "refresh:5;url=login-form.php" );
    }
    else {
        echo "Your account can't be activated";
    }
}