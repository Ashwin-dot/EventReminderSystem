<?php

include './conn.php';

$id = $_GET['id'];

$q = " DELETE FROM `eventdetails` WHERE event_id = $id ";

mysqli_query($conn, $q);

header('location://localhost/project/events.php');

?>