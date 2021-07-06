<?php
session_start();
require_once("db-connect.php");

$sql = 'SELECT id,username,pwd FROM bear_users WHERE username=:username';
$query = $db->prepare($sql);
$query->execute(array('username' => $_POST['username']));
$result = $query->fetch();

if (!$result) {
    $error = "Username or password incorrect";
    $_SESSION["error"] = $error;
    header("Location: login-form.php");
} else {
    $verif = password_verify($_POST['pwd'], $result['pwd']);
    if (!$verif) {
        $error = "Username or password incorrect";
        $_SESSION["error"] = $error;
        header("Location: login-form.php");
    } else {

        $query = $db->prepare("SELECT active FROM Bear_users WHERE username like :username ");
        $query->bindParam(':username', $_POST['username']);

        if ($query->execute(array(':username' => $_POST['username']))  && $row = $query->fetch()) {
            $active = $row['active'];
        }

        if ($active == '1') {

            $_SESSION['id'] = $result['id'];
            $_SESSION['username'] = $result['username'];
            $_SESSION['success'] = 'Connected';
            header('Location:dashboard.php');
        } else {
            $error = "Your account has not been activated.";
            $_SESSION["error"] = $error;
            header('Location:login-form.php');
        }
    }
}
