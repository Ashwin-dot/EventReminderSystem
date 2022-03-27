<?php
include './conn.php';
$id = $_REQUEST['id'];
$qy = "UPDATE `eventdetails` SET `complete`='1' WHERE event_id = $id";
$query = mysqli_query($conn, $qy);

header('location://localhost/project/events.php');