
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap-5.2.2-dist/css/bootstrap.min.css">
    <script src="bootstrap-5.2.2-dist/js/bootstrap.bundle.js"></script>
    <link rel="stylesheet" href="style.css"></link>
    <title>Register Form</title>
</head>
<body style="background-color:#00bcd4;">
    <div class="container">
        <?php
        //print_r($_POST);
        if(isset($_POST['submit'])){
            $fullname = $_POST['fullname'];
            $email = $_POST['email'];
            $user = $_POST['username'];
            $password = $_POST['password'];
            $confirmed_password = $_POST['password-repeated'];
            $erreur = [];
            
            if(empty($fullname) || empty($email) || empty($user) || empty($password) || empty($confirmed_password)){
                array_push($erreur, "All fields are required!");
            }
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                array_push($erreur, "Please enter a valid email address!");
            }
            if(strlen($password) < 4){
                array_push($erreur, "Please enter a valid password with at least 4 characters.");
            }
            if($password != $confirmed_password){
                array_push($erreur, "Please confirm your password by repeating it."); 
            }
            
            if(count($erreur) > 0){
                foreach($erreur as $error){
                    echo "<div class='alert alert-danger'>$error</div>";
                }
            }
            else {
                require_once 'connexion.php';
                
                // Vérification si l'utilisateur existe déjà dans la base de données
                $stmt = $pdo->prepare("SELECT * FROM Users WHERE email = ?");
                $stmt->execute([$email]);
                $userExists = $stmt->rowCount() > 0;
                
                if ($userExists) {
                    echo "<div class='alert alert-danger'>User with this email already exists.</div>";
                } else {
                    // Insertion des données dans la base de données
                    $sql = "INSERT INTO Users(full_name, email, password, username) VALUES (?, ?, ?, ?)";
                    $stmt = $pdo->prepare($sql);
                    
                    if ($stmt) {
                        $stmt->bindParam(1, $fullname);
                        $stmt->bindParam(2, $email);
                        $stmt->bindParam(3, $password);
                        $stmt->bindParam(4, $user);
                        
                        if ($stmt->execute()) {
                            echo "<div class='alert alert-success'>You are registered successfully</div>";
                        } else {
                            die("There is something wrong. Please try again.");
                        }
                    } else {
                        die("Failed to prepare SQL statement.");
                    }
                }
            }
        }
        ?>
        <form action="SignIn.php" method="post">
            <div class="form-group">
                <input type="text" id="fullname" name="fullname" class="form-control" autocomplete="fullname" placeholder="Full Name">
            </div>
            <div class="form-group">
                <input type="email" id="email" name="email" class="form-control" autocomplete="email" placeholder="E-mail">
            </div>
            <div class="form-group">
                <input type="text" id="username" name="username" class="form-control" autocomplete="username" placeholder="Username">
            </div>
            <div class="form-group">
                <input type="password" id="password" name="password" class="form-control" autocomplete="new-password" placeholder="Password">
            </div>
            <div class="form-group">
                <input type="password" id="password-repeated" name="password-repeated" class="form-control" autocomplete="new-password" placeholder="Confirm Password">
            </div>
            <div class="form-btn">
                <input type="submit" name="submit" class="form-control btn btn-primary" value="Register">
            </div> 
            <div class="form-btn mt-4">
                <span class="text-danger h6">You have already an Account ?</span><a href="logIn.php"> Log In</a>
            </div> 
        </form>
        <div class="mt-3"><a href="#"><img src="icons8-facebook-48.png" alt=""></a><a href="#"><img src="icons8-instagram-48.png" alt=""></a>
        <a href="#"><img src="icons8-mail-48.png" alt=""></a>
        <a href="#"><img src="icons8-twitter.gif" alt="" class="rounded-pill" style="width:40px;"></a>
        
    </div>
    </div>
</body>
</html>