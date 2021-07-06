<?php   
 //logout.php  
 session_start();  
 $errors = array();
 session_destroy();  
 header("location:login-form.php");
