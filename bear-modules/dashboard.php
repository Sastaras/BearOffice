<?php
session_start();
$errors = array();  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BearOffice - Dashboard</title>
</head>
<body>
<?php include('errors.php'); ?>
<div>
<?php
require_once("db-connect.php");
if(isset($_SESSION["username"])){  
    echo '<h3>Login Success, Welcome - '.$_SESSION["username"].'</h3>';  
    echo '<br /><br /><a href="logout.php">Logout</a><br/><br/>';  
}  

$query = $db->query("SELECT username, email, reg_date FROM Bear_users ORDER BY reg_date DESC");

if($query->rowCount() > 0){
    while($row = $query->fetch(PDO::FETCH_ASSOC)){
        $user = $row["username"];
        $mail = $row["email"];
        $regdate = $row["reg_date"];

?>
    <?php echo "user: $user | e-mail: $mail | registered: $regdate <br/><br/>"; ?>
<?php }
}else{ ?>
    <p>Users not found...</p>
<?php } 

?>
</div>
    
</body>
</html>
