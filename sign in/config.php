<?php
$conn = mysqli_connect("localhost", "root", "","event reminder system");
if (!$conn) {
    echo "Connection Failed";
}