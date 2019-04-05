<?php session_start(); ?>
<?php include 'db.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up</title>

<!--   Font Icon  -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

<!--    Main css -->
    <link rel="stylesheet" href="../css/signup_style.css">
    <link rel="stylesheet" href="../css/style.css">
    
</head>
<body>

<?php

    if(isset($_POST['signup'])){
        $username = $_POST['name'];
        $password = $_POST['pass'];
        $email = $_POST['email'];
        $query = "INSERT INTO users (username, password, email) VALUES ('$username', '$password', '$email') ";
        $signup = mysqli_query($connection, $query);
        if($signup){
            $_SESSION['username'] = $username;
            echo $_SESSION['username'];
        }
        else{
            echo mysqli_error($connection );
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
                    <h2 class="text-primary">Sign up</h2>
                    <form method="POST" class="register-form" id="register-form" action="registration.php">
                        <div class="form-group">
                            <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                            <input type="text" name="name" id="name" placeholder="Your Name"/>
                        </div>
                        <div class="form-group">
                            <label for="email"><i class="zmdi zmdi-email"></i></label>
                            <input type="email" name="email" id="email" placeholder="Your Email"/>
                        </div>
                        <div class="form-group">
                            <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                            <input type="password" name="pass" id="pass" placeholder="Password"/>
                        </div>
                        <div class="form-group">
                            <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                            <input type="password" name="re_pass" id="re_pass" placeholder="Repeat your password"/>
                        </div>
                        <div class="form-group">
                            <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                            <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
                        </div>
                        <div class="form-group form-button">
                            <input type="submit" name="signup" id="signup" class="form-submit" value="Register"/>
                        </div>
                    </form>
                </div>
                <div class="signup-image">
                    <figure><img src="../images/signup-image.jpg" alt="sing up image"></figure>
                </div>
            </div>
        </div>
    </section>
</div>
</body>
</html>
