<?php
    if(isset($_SESSION["error"])){
        $error = $_SESSION["error"];
        echo "<span class='error'>$error</span>";
        unset($_SESSION["error"]);}
