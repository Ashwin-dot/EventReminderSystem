<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ERS Signup</title>
</head>

<body>
    <div class="container">
        <div class="loginForm">
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
                <div class="form-group-username">
                    <label id="fullName">Full Name</label>
                    <input type="text" name="fullname" class="fullName" placeholder="Full Name">
                </div>
                <div class="form-group-username">
                    <label id="email">Email</label>
                    <input type="text" name="email" class="email" placeholder="email">
                </div>
                <div class="form-group-password">
                    <label id="username">Password</label>
                    <input type="password" name="password" class="password" placeholder="********">
                </div>
                <input name="submit" type="submit">
            </form>
        </div>
        <div class="SignupImg"></div>
    </div>
</body>

<?php 

include "./php/conn.php";

mysqli_select_db($conn,'dbname');

if(isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password=$_POST['password']; 
    $fullname=$_POST['fullname'];
    $q = "Select * FROM userdetails where email='$email' && password='$password'";
    $result=mysqli_query($conn,$q);
    $num=mysqli_num_rows($result);
    if($num==1){
    echo"Duplicate Data";
    }
    else{
        $qy = "insert into userdetails(email,password,fullname)values('".$email."','".$password."','".$fullname."')";
        mysqli_query($conn,$qy);

}

}

?>

</html>