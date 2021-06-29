<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="bear.css">
</head>

<body>
    <div class="flex-center">
        <div class="container glass">
            <form action="login-form-handler.php" method="post">
                <div>
                    <label for="username">Login : </label><br/>
                    <input type="text" name="username">
                </div>
                <div>
                    <label for="password" input="password">Password : </label><br/>
                    <input type="password" name="pwd">
                </div>
                <div>
                    <input type="submit" value="Envoyer">
                    <a href="home.php"><button>Retour</button></a>
                </div>
            </form>
            
        </div>
    </div>
</body>

</html>