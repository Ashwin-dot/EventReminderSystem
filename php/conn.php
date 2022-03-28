<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "event reminder system";
$conn = mysqli_connect($servername, $username, $password, $dbname);

mysqli_select_db($conn, 'dbname');
// if($conn){
//     echo"connected sucesfully";
// }
// else{
//     echo "error ";
// }