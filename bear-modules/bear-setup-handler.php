<?php
session_start();

if (
    isset($_POST['server']) && !empty($_POST['server']) &&
    isset($_POST['serveruser']) && !empty($_POST['serveruser']) &&
    isset($_POST['serverpwd']) &&
    isset($_POST['dbname']) && !empty($_POST['dbname']) &&
    isset($_POST['username']) && !empty($_POST['username']) &&
    isset($_POST['email']) && !empty($_POST['email']) &&
    isset($_POST['pwd']) && !empty($_POST['pwd']) &&
    isset($_POST['pwdconf']) && !empty($_POST['pwdconf'])
) {

    $server = strip_tags($_POST['server']);
    $serveruser = strip_tags($_POST['serveruser']);
    $serverpwd = strip_tags($_POST['serverpwd']);
    $dbname = strip_tags($_POST['dbname']);

    try {
        $conn = new PDO("mysql:host=$server;dbname=$dbname", $serveruser, $serverpwd);

        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

        // sql to create table
        $sql = "CREATE TABLE Bear_users (
        id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(30) NOT NULL,
        email VARCHAR(255) NOT NULL,
        pwd VARCHAR(255) NOT NULL,
        reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        );
        
    
        CREATE TABLE Bear_projects (
        id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        project_title VARCHAR(255) NOT NULL,
        project_begin DATE NOT NULL,
        project_end DATE NOT NULL,
        project_context LONGTEXT NOT NULL,
        project_githublink LONGTEXT,
        project_link LONGTEXT
        );";

        $conn->exec($sql);

        echo "Database configured";
    } catch (PDOException $e) {
        $e->getMessage();
    }
    // Making config.php
    $configfile = fopen("config.php", "w");
    $config = "<?php ";
    fwrite($configfile, $config);
    $config = "\$server = '$server';";
    fwrite($configfile, $config);
    $config = "\$serveruser = '$serveruser';";
    fwrite($configfile, $config);
    $config = "\$serverpwd = '$serverpwd';";
    fwrite($configfile, $config);
    $config = "\$dbname = '$dbname';";
    fwrite($configfile, $config);
    fclose($configfile);

    // Create first user
    if ($_POST['pwd'] === $_POST['pwdconf']) {
        $username = strip_tags($_POST['username']);
        $email = strip_tags($_POST['email']);
        $password = strip_tags($_POST['pwd']);

        $passwordhash = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO Bear_users(username,email,pwd) VALUES(:username,:email,:password)";
        $query = $conn->prepare($sql);
        $query->bindValue(':username', $username, PDO::PARAM_STR);
        $query->bindValue(':email', $email, PDO::PARAM_STR);
        $query->bindValue(':password', $passwordhash, PDO::PARAM_STR);
        $query->execute();
        echo 'Configuration complete';
        header("Location: ../home.php");
    } else {
        $error = "Password not matching";
        $_SESSION["error"] = $error;
        header("Location: register-form.php");
    }
} else {
    $error = "Every fields must be filled";
    $_SESSION["error"] = $error;
    header("Location: register-form.php");
}
