<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ERS Events</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<?php
session_start();

if ($_SESSION['loggedIn']) {

    include "./php/conn.php";

    $query = mysqli_query($conn, "SELECT * FROM users WHERE email='{$_SESSION['SESSION_EMAIL']}'");

    if (mysqli_num_rows($query) > 0) {
        $row = mysqli_fetch_assoc($query);
        $userId = $row['id'];
        // echo "Welcome " . $row['fullname'] . $row['id'];

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
                        <h1><?php echo "Welcome, " . $row['fullname'];
                                }
                                    ?></h1>
                    </div>
                    <div class="navTitleDate">
                        <script>
                        var today = new Date();
                        var todayDate = today.getFullYear() + '-' + (today.getMonth() + 1) + '-' + today.getDate();
                        document.write(`<h1>${todayDate} </h1>`)
                        </script>
                        <div id="timer">
                            <script>
                            setInterval(function() {
                                var currentTime = new Date();
                                var currentHours = currentTime.getHours();
                                var currentMinutes = currentTime.getMinutes();
                                var currentSeconds = currentTime.getSeconds();
                                currentMinutes = (currentMinutes < 10 ? "0" : "") + currentMinutes;
                                currentSeconds = (currentSeconds < 10 ? "0" : "") + currentSeconds;
                                var timeOfDay = (currentHours < 12) ? "AM" : "PM";
                                currentHours = (currentHours > 12) ? currentHours - 12 : currentHours;
                                currentHours = (currentHours == 0) ? 12 : currentHours;
                                var currentTimeString = currentHours + ":" + currentMinutes + ":" +
                                    currentSeconds + " " + timeOfDay;
                                document.getElementById("timer").innerHTML = currentTimeString;
                            }, 10);
                            </script>
                        </div>
                    </div>

                </div>
            </div>
            <div class="menu">
                <div class="home">
                    <a href="./dashbord.php">Home </a>
                </div>
                <div class="events">
                    <a href="./events.php">Events </a>
                </div>
                <div class="completed">
                    <a href="#">Completed Events </a>
                </div>
                <div class="setting">
                    <a href="./setting.php">Setting </a>
                </div>
                <div class="logout">
                    <a href="./logout.php">Logout</a>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="content-list">
                <button id="listofEventBtn">List of events</button>
            </div>

            <div class="content-all">
                <div class="eventlist">
                    <?php

                            $q = "SELECT * FROM `eventdetails` WHERE userID=$userId ORDER BY date DESC;";
                            $query = mysqli_query($conn, $q);
                            // $res = $conn->query($q);
                            while ($res = mysqli_fetch_array($query)) {
                                if ($res['complete'] == 1) {
                            ?>
                    <div class="eventDetails">
                        <div class="eventDetailsTop">
                            <div class="eventTitle">
                                <h1><?php echo $res['event_title']; ?></h1>
                            </div>
                            <div class="eventDate">
                                <h1><?php echo $res['date']; ?></h1>
                            </div>
                        </div>
                        <div class="eventDetailsDown">
                            <div class="eventDescription">
                                <h3><?php echo $res['event_desc']; ?></h3>
                            </div>
                            <div class="eventTime">
                                <h3><?php echo $res['time']; ?></h3>
                            </div>
                        </div>
                        <div class="btnevents">

                            <button id="deleteEventBtn"><a href="./php/delete.php?id=<?php echo $res['event_id']; ?>">
                                    Delete </a> </button>
                            <button id="completeEventBtn"><a href="./php/undo.php?id=<?php echo $res['event_id']; ?>">
                                    Undo </a></button>



                        </div>

                    </div>


                    <?php }
                            }
                        } ?>

                </div>
            </div>

        </div>


</body>

</html>