<?php
session_start();
include "db-connect.php"; 

$id = $_GET['id']; 

$sql = "DELETE FROM `Bear_users` WHERE `id` = $id"; // delete query
$db->exec($sql);


if($sql)
{
    header("location:dashboard.php");
    exit;	
}
else
{
    $error= "Error deleting user";
    $_SESSION["error"] = $error;
}
?>