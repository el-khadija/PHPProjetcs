<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap-5.2.2-dist/css/bootstrap.min.css">
    <script src="bootstrap-5.2.2-dist/js/bootstrap.bundle.js"></script>
    <link rel="stylesheet" href="style.css">
    <title>Log In Form</title>
</head>
<body style="background-color:#00bcd4;">
<div class="container">
    <?php
    if(isset($_POST['login'])){
        $email=$_POST['email'];
        $password=$_POST['password'];
        require_once 'connexion.php';
        $sql="SELECT * FROM Users WHERE email=?";
        $stmt = $pdo->prepare($sql);
        if ($stmt) {
            $stmt->bindParam(1, $email);
            if ($stmt->execute()) {
                $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
                if(count($rows) > 0) {
                    // L'utilisateur existe dans la base de données
                    // Vous pouvez vérifier le mot de passe ici
                    // ...
                    echo "<div class='alert alert-success'>You are logged in successfully</div>";
                } else {
                    echo "<div class='alert alert-danger'>Invalid email or password</div>";
                }
            } else {
                die("There is something wrong. Please try again.");
            }
        } else {
            die("Failed to prepare SQL statement.");
        }
    }
    ?>
    <form action="logIn.php" method="post">
        <div class="form-group">
            <input type="email" id="email" name="email" class="form-control" autocomplete="email" placeholder="E-mail">
        </div>
        <div class="form-group">
            <input type="password" id="password" name="password" class="form-control" autocomplete="new-password" placeholder="Password">
        </div>
        <div class="form-btn">
            <input type="submit" name="login" class="form-control btn btn-primary" value="Log In">
        </div>
        <div class="form-btn mt-4">
                <span class="text-danger h6">You don't have an Account yet ?</span><a href="SignIn.php"> Sign In</a>
            </div>   
    </form>
</div>
</body>
</html>