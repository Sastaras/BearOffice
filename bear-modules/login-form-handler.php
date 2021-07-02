<?php
session_start();

require_once("db-connect.php");
// cherche une entrée dans la base de données (username) qui correspond avec ce que l'utilisateur a renseigné dans le formulaire.
$sql = 'SELECT id,username,pwd FROM bear_users WHERE username=:username';
$query = $db->prepare($sql);
$query->execute (array('username'=>$_POST['username']));
$result = $query->fetch();

if(!$result){
    $error= "Username or password incorrect";
    $_SESSION["error"] = $error;
    header("Location: login-form.php");
}else{
    $verif = password_verify($_POST['pwd'],$result['pwd']); 
    if(!$verif){
        $error= "Username or password incorrect";
        $_SESSION["error"] = $error;
        header("Location: login-form.php");
    }else{
        $_SESSION['id']=$result['id'];
        $_SESSION['username']=$result['username'];
        $_SESSION['success']='Connexion réussie';
        header('Location:dashboard.php');
    }

}