<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Reminder System</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<?php

include "./php/conn.php";

mysqli_select_db($conn, 'dbname');
?>


<body>
    <div class="main-container">
        <div class="sidebar">
            <div class="navTitle">
                <div class="logo">
                    <div class="img">
                        <img src="./assets/logo.png">
                    </div>
                </div>
                <div class="navTitleDetails">
                    <div class="navTitleName">
                        <?php
                        $u = "SELECT * FROM `userdetails` WHERE id=3";
                        $result = mysqli_query($conn, $u);

                        if ($dis = mysqli_fetch_array($result)) {
                            echo "<h1>Welcome $dis[fullname]</h1>";
                        }

                        ?>
                    </div>
                    <div class="navTitleDate">
                        <h1>Jan 01, 2022</h1>
                    </div>

                </div>
            </div>
            <div class="menu">
                <div class="home">
                    <a href="#">Home </a>
                </div>
                <div class="events">
                    <a href="./events.php">Events </a>
                </div>
                <div class="setting">
                    <a href="events.html">Setting </a>
                </div>
                <div class="logout">
                    <a href="events.html">Logout</a>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="content-nav">
                <button id="allBtn">All</button>
                <button id="todayBtn">Today</button>
                <button id="tommorowBtn">Tommorow</button>
            </div>

            <div class="content-all">
                <div class="eventlist">
                    <?php
                    $q = "select * from eventdetails ";
                    $query = mysqli_query($conn, $q);
                    // $res = $conn->query($q);
                    while ($res = mysqli_fetch_array($query)) {
                        if (!$res['complete'] >= 1) {
                    ?>
                    <div class="eventDetails">
                        <div class="eventDetailsTop">
                            <div class="eventTitle">
                                <h1> <?php echo $res['event_title']; ?></h1>
                            </div>
                            <div class="eventDate">
                                <h1><?php echo $res['date']; ?></h1>
                            </div>
                        </div>
                        <div class="eventDetailsDown">
                            <div class="eventDescription">
                                <h3> <?php echo $res['event_desc']; ?></h3>
                            </div>
                            <div class="eventTime">
                                <h3><?php echo $res['time']; ?></h3>
                            </div>
                        </div>

                    </div>
                    <?php
                        }
                    }
                    ?>

                </div>
            </div>
        </div>


</body>

</html>