<?php

include "config.php";

try{

$db = new PDO("mysql:host=$server; dbname=$dbname", $serveruser, $serverpwd);
$db-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
/* echo 'success'; */
 }catch (PDOException $e){
  echo 'connexion fail: '.$e->getMessage();
}