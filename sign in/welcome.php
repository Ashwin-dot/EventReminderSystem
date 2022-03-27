<?php
    session_start();
    session_destroy();
    if (!isset($_SESSION['SESSION_EMAIL'])) {
        header("Location: signin.php");
        die();
    }

    include 'config.php';

    $query = mysqli_query($conn, "SELECT * FROM users WHERE email='{$_SESSION['SESSION_EMAIL']}'");

    if (mysqli_num_rows($query) > 0) {
        $row = mysqli_fetch_assoc($query);

        echo "Welcome " . $row['fullname'];
    }
?>