<?php
include './php/conn.php';
$msg = "";
if (isset($_POST['submit'])) {
    $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, md5($_POST['password']));
    $confirm_password = mysqli_real_escape_string($conn, md5($_POST['confirm_password']));


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
                <form action="" method="post" onsubmit="return validation()">
                    <div class="form-input">
                        <input class="fullname" name="fullname" id="fullname" type="text" placeholder="Full Name" required>
                        <span id = "fullnameerror"></span>
                    </div>
                    <div class="form-input">
                        <input class="email" name="email" id="email" type="text" placeholder="Email" required>
                        <span id = "emailerror"></span>
                    </div>
                    <div class="form-input">
                        <input class="password" name="password" id="password" type="password" placeholder="Password ">
                        <span id = "passworderror"></span>
                    </div>

                    <div class="form-input">
                        <input class="confirm-password" name="confirm_password" id="confirm-password" type="password"
                            placeholder="Confirm password">
                            <span id = "cpassworderror"></span>
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
    <script type="text/javascript">
        function validation(){
            var fullname = document.getElementById('fullname').value;
            var email = document.getElementById('email').value;
            var password = document.getElementById('password').value;
            var confirm_password = document.getElementById('confirm-password').value;

            var usercheck = /^[A-Za-z. ]{3,30}$/;
            var emailcheck = /^[A-Za-z0-9_]{3,}@[A-Za-z]{3,}[.]{1}[A-Za-z.]{2,6}$/;
            var passwordcheck = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{6,}$/;


            if(usercheck.test(fullname)){
                document.getElementById('fullnameerror').innerHTML=" ";
            }else{
                document.getElementById('fullnameerror').innerHTML="Must contain at least 3 characters";
                return false;
            }

            if(emailcheck.test(email)){
                document.getElementById('emailerror').innerHTML=" ";
            }else{
                document.getElementById('emailerror').innerHTML="Email is invalid";
                return false;
            }

            if(passwordcheck.test(password)){
                document.getElementById('passworderror').innerHTML=" ";
            }else{
                document.getElementById('passworderror').innerHTML="Include at least one number,letter with min of 6 characters";
                return false;
            }
        }

    </script>

</body>

</html>

