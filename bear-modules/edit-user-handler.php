<?php
session_start();
include "db-connect.php"; 

$id = $_SESSION["edit-user-ID"]; 

if(isset($_POST['submit'])) 
{
    $username = strip_tags($_POST['username']);
    $email = strip_tags($_POST['email']);
    $pwd = strip_tags($_POST['pwd']);
    $pwdconf = strip_tags($_POST['pwdconf']);
	
    if (!empty($pwd) || !empty($pwdconf)){
        if ($pwd === $pwdconf) {
            $passwordhash = password_hash($pwd, PASSWORD_DEFAULT);
            $update= "UPDATE Bear_users SET pwd = :pwdhash WHERE id=$id";
            $query= $db->prepare($update);
            $query->bindParam(':pwdhash', $passwordhash, PDO::PARAM_STR);
            $query->execute(); 
        }
        else {$error="Passwords not matching";
            $_SESSION["error"] = $error;
            header("location:edit-user.php?id=<?php echo $id;?>");}
    } 
    
    if(isset($username)){
        $update= "UPDATE Bear_users SET username = :username WHERE id=$id";
        $query= $db->prepare($update);
        $query->bindParam(':username', $username, PDO::PARAM_STR);
        $query->execute(); }

    if(isset($email)) {
        $update= "UPDATE Bear_users SET email = :email WHERE id=$id";
        $query= $db->prepare($update);
        $query->bindParam(':email', $email, PDO::PARAM_STR);
        $query->execute(); }


    header("location:edit-user.php?id=<?php echo $id;?>");
    
}
else echo "Error Submitting changes";