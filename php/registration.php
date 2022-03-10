<?php 
// $con= mysqli_connect('localhost','root');
// if($con){
//     echo"Connection Successful";
// }
// else{
//     die("error");
// }
include 'conn.php';


mysqli_select_db($con,'dbname');

$email = $_POST['email'];
$password=$_POST['password']; 
$fullname=$_POST['fullname'];
$q = "Select * FROM userdetails where email='$email' && password='$password'";
$result=mysqli_query($con,$q);
$num=mysqli_num_rows($result);
if($num==1){
    echo"Duplicate Data";
}
else{
    $qy = "insert into userdetails(email,password,fullname)values('".$email."','".$password."','".$fullname."')";
    mysqli_query($con,$qy);

    echo "<script>alert(1);</script>";

}
?>