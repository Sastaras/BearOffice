<?php
if (file_exists("config.php")) {
    header("Location: home.php");
}
else header("Location: bear-setup.php");