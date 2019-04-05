<?php session_start(); ?>
<?php include 'db.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Log In</title>

<!--   Font Icon  -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

<!--    Main css -->
    <link rel="stylesheet" href="../css/signup_style.css">
    <link rel="stylesheet" href="../css/style.css">
    
</head>
<script>
    function warning(){
        alert("wrong email or password");
    }
</script>
<body>

<?php

    if(isset($_POST['login'])){
        $password = $_POST['pass'];
        $email = $_POST['email'];
        $query = "SELECT * FROM users WHERE email = '$email' " ;
        $login = mysqli_query($connection, $query);
        if($login){
            $row = mysqli_fetch_assoc($login);
            $user_password = $row['password'];
            $username = $row['username'];
            if($password == $user_password){
                $_SESSION['username'] = $username;
            }
            else{
                echo "<script> warning(); </script>";
            }
        }
    }
    if(isset($_SESSION["username"])) {
        header("Location:../index.php");
        exit();
}

?>

<div class="main">
    <!-- Sign up form -->
    <section class="signup">
        <div class="container">
            <div class="signup-content">
                <div class="signup-form">
                    <h2 class="text-primary">Login</h2>
                    <form method="POST" class="register-form" id="register-form" action="login.php">
                        <div class="form-group">
                            <label for="email"><i class="zmdi zmdi-email"></i></label>
                            <input type="email" name="email" id="email" placeholder="Your Email"/>
                        </div>
                        <div class="form-group">
                            <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                            <input type="password" name="pass" id="pass" placeholder="Password"/>
                        </div>
                        <div class="form-group form-button">
                            <input type="submit" name="login" id="login" class="form-submit" value="Login"/>
                        </div>
                    </form>
                </div>
                <div class="signup-image">
                    <figure><img src="../images/signup-image.jpg" alt="sing up image"></figure>
                    <a href="registration.php" class="signup-image-link">Create new account</a>
                </div>
            </div>
        </div>
    </section>
</div>
</body>
</html>
