<?php
require_once("db-connect.php");

if (
    isset($_POST['username']) && !empty($_POST['username']) && 
    isset($_POST['email']) && !empty($_POST['email']) && 
    isset($_POST['pwd']) && !empty($_POST['pwd']) &&
    isset($_POST['pwdconf']) && !empty($_POST['pwdconf'])
    ){
        if ($_POST['pwd'] === $_POST['pwdconf']) {
            $username = strip_tags( $_POST['username']);
            $email = strip_tags($_POST['email']);
            $password = strip_tags($_POST['pwd']);
            
                    $passwordhash = password_hash($password, PASSWORD_DEFAULT);

                    $sql = "INSERT INTO Bear_users(username,email,pwd) VALUES(:username,:email,:password)";
                    $query = $db->prepare($sql);
                    $query->bindValue(':username', $username, PDO::PARAM_STR);
                    $query->bindValue(':email', $email, PDO::PARAM_STR);
                    $query->bindValue(':password', $passwordhash, PDO::PARAM_STR);
                    $query->execute();
                    echo 'Your account has been created';
                    header("Location: ../home.php");
        }
        else echo 'Passwords not matching';
            
}
else echo 'Every fields must be completed';   

        