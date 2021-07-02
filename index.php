<?php
session_start();
$errors = array();
include('bear-modules/errors.php');

if (isset($_SESSION["username"])) header("Location: bear-modules/dashboard.php");
else if (file_exists("bear-modules/config.php")) header("Location: home.php");
else header("Location: bear-modules/bear-setup.php");