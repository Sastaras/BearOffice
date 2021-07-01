<?php
session_start(); 

if (isset($_SESSION["username"])) header("Location: dashboard.php");
else if (file_exists("config.php")) header("Location: home.php");
else header("Location: bear-setup.php");