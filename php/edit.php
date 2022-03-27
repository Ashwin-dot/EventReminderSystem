<?php

include './conn.php';
if(isset($_POST['esubmit'])){  
    $id = $_GET['id'];  
    $eeventTitle=$_POST['eeventTitle'];
    $eeventDesc=$_POST['eeventDesc']; 
    $eeventDate=$_POST['eeventDate'];
    $eeventTime=$_POST['eeventTime'];
   
   $q = "UPDATE `eventdetails` SET `event_title`='$eeventTitle',`event_desc`='$eeventDesc',`date`='$eeventDate',`time`='$eeventTime' WHERE `event_id`=$id";
           $query = mysqli_query($conn,$q);
    //    if($conn->query($q)) {
    //        echo "data inserted";
    //    }
    //    else{
    //       die(mysqli_error($conn));
    //        } 
header('location://localhost/project/events.php');
}
?>