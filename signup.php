<?php
include './php/conn.php';
$msg = "";
if (isset($_POST['submit'])) {
    $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, md5($_POST['password']));
    $confirm_password = mysqli_real_escape_string($conn, md5($_POST['confirm-password']));


    if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM users WHERE email='{$email}'")) > 0) {
        $msg = "{$email}-This email has been already exists";
    } else {
        if ($password === $confirm_password) {
            $sql = "INSERT INTO users (fullname, email, password) VALUES('{$fullname}','{$email}','{$password}')";
            $result = mysqli_query($conn, $sql);
            $msg = "Successfully registered your account";
        } else {
            $msg = "Password and confirm password donot match.";
        }
    }
}
?>




<!DOCTYPE html>
<html>

<head>
    <title>Sign Up</title>
    <link rel="stylesheet" href="./sign in/CSS/signup.css">
</head>

<body>
    <div class="Full-container">
        <div class="First-container">
            <div class="Inner-firstcontainer">
                <div class="image">
                    <img src="./sign in/Images/logo.png">
                </div>
                <div class="head">
                    <h3>Create account</h3>
                </div>
            </div>

            <div class="form">
                <form action="" method="post">
                    <div class="form-input">
                        <input class="fullname" name="fullname" type="text" placeholder="Full Name" required>
                    </div>
                    <div class="form-input">
                        <input class="email" name="email" type="text" placeholder="Email" required>
                    </div>
                    <div class="form-input">
                        <input class="password" name="password" type="password" placeholder="password">
                    </div>

                    <div class="form-input">
                        <input class="confirm-password" name="confirm-password" type="password"
                            placeholder="Confirm password">
                    </div>

                    <div class="form-input">
                        <button name="submit" class="btn" type="submit">Register</button>

                    </div>
                </form>
            </div>
            <div class="footer">
                <p class="firstsentence">Already have an account?<button class="secondword"><a
                            href="./signin.php">Login</a></button></p>
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