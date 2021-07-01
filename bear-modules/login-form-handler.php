<?php

require_once("db-connect.php");
// cherche une entrée dans la base de données (username) qui correspond avec ce que l'utilisateur a renseigné dans le formulaire.
$sql = 'SELECT id,username,pwd FROM bear_users WHERE username=:username';
$query = $db->prepare($sql);
$query->execute (array('username'=>$_POST['username']));
$result = $query->fetch();

if(!$result){
    echo 'l\'identifiant et/ou le Mot de passe sont incorrects';
}else{
    $verif = password_verify($_POST['pwd'],$result['pwd']); 
    if(!$verif){
        echo 'l\'identifiant et/ou le Mot de passe sont incorrects';
    }else{
        session_start();
        $_SESSION['id']=$result['id'];
        $_SESSION['username']=$result['username'];
        $_SESSION['success']='Connexion réussie';
        header('Location:dashboard.php');
    }

}