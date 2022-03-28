<?php
session_start();
include './php/conn.php';
$msg = "";

if (isset($_POST['submit'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, md5($_POST['password']));

    $sql = "SELECT * FROM users WHERE email='{$email}' AND password='{$password}'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['SESSION_EMAIL'] = $email;
        $_SESSION['SESSION_ID'] = $row['id'];
        header("Location: ./dashbord.php");
    } else {
        $msg = "Email or password donot match";
    }
}
?>






<!DOCTYPE html>
<html>

<head>
    <title>Signin</title>
    <link rel="stylesheet" href="./sign in/CSS/style.css">
</head>

<body>
    <div class="Full-container">
        <div class="First-container">
            <div class="Inner-firstcontainer">
                <div class="image">
                    <img src="./sign in/Images/logo.png">
                </div>
                <div class="links">
                    <ul>
                        <a href="#" class="login-link">Login</a>
                        <a href="signup.php" class="signup-link">Sign up</a>
                    </ul>
                </div>
            </div>
            <div class="text">
                <p class="signintxt">SIGN IN</p>
                <p class="signindesc">Sign in to continue to our application</p>
            </div>
            <div class="form">
                <form action="" method="post">
                    <div class="form-input">
                        <input class="email" name="email" type="email" placeholder="youremail@gmail.com">
                    </div>
                    <div class="form-input">
                        <input class="password" name="password" type="password" placeholder="password">
                    </div>
                    <div class="form-input">
                        <button name="submit" class="btn" type="submit">Sign In</button>
                    </div>
                </form>
            </div>
            <?php echo $msg; ?>
        </div>
        <div class="Second-container">
            <div class="Inner-secondcontainer">
                <img class="secondcontainerimg" src="./sign in/Images/events.png">
            </div>
        </div>
    </div>
</body>

</html>