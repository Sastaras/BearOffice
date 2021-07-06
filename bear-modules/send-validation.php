<?php
require_once("db-connect.php");

$validkey = md5(microtime(TRUE)*100000);

$query = $db->prepare("UPDATE Bear_users SET validkey=:validkey WHERE username like :username");
$query->bindParam(':validkey', $validkey);
$query->bindParam(':username', $username);
$query->execute();

$subject="BearOffice - activate your account now!";
$from = "From : BearOffice";

$hosturl = 'http://'.$_SERVER['HTTP_HOST'].'/BearOffice';

$message="Thanks for your registration. 

Please activate your account by clicking the link below:
$hosturl/bear-modules/validation.php?log=".urlencode($username)."&key=".urlencode($validkey)."

This this e-mail was sent automatically, do not reply.";

mail($email, $subject, $message, $from);

