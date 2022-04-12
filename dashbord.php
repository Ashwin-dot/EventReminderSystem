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
    // session_start();
    // session_destroy();
    // if (!isset($_SESSION['SESSION_EMAIL'])) {
    //     header("Location: ./signin.php");
    //     die();
    // }

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
                        <a href="#">Home </a>
                    </div>
                    <div class="events">
                        <a href="./events.php">Events </a>
                    </div>
                    <div class="completed">
                        <a href="./completed.php">Completed Events </a>
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
                <div class="content-nav">
                    <form method="post" id='btnForm'>
                        <input type="submit" onload="autosubmit()" name="allBtn" value="all" id="allBtn">
                        <input type="submit" name="todayBtn" value="today" id="todayBtn">
                        <input type="submit" name="tomorrowBtn" value="tomorrow" id="tomorrowBtn">
                    </form>
                </div>

                <div class="content-all">
                    <div class="eventlist">
                        <?php
                                $q = "SELECT * FROM `eventdetails` WHERE userID=$userId ORDER BY date DESC;";
                                $query = mysqli_query($conn, $q);
                                $res = mysqli_fetch_array($query);

                                $todayDate =  date('Y-m-d');
                                $tomorrowDate = date("Y-m-d", strtotime("+1 days"));
                                // echo $todayDate . '</br>';
                                // echo $eventDate . '</br>';
                                // echo $tomorrowDate;
                                // if (isset($_POST['today'])) {
                                //     if($eventDate == $todayDate){
                                ?>

                        <?php
                                if (isset($_POST['todayBtn'])) {
                                    $num = 0;
                                    while (($res = mysqli_fetch_array($query)) && ($num <= 7)) {
                                        $eventDate =  $res['date'];
                                        if ($eventDate == $todayDate) {
                                            if (!$res['complete'] >= 1) {
                                                $num = $num + 1;
                                                $title = $res['event_title'];
                                                $date = $res['date'];
                                                $desc = $res['event_desc'];
                                                $time = $res['time'];
                                ?>
                        <div class="eventDetails">
                            <div class="eventDetailsTop">
                                <div class="eventTitle">
                                    <h1>
                                        <?php echo $title ?></h1>
                                </div>
                                <div class="eventDate">
                                    <h1> <?php echo $date ?></h1>
                                </div>
                            </div>
                            <div class="eventDetailsDown">
                                <div class="eventDescription">
                                    <h3>
                                        <?php echo $desc ?></h3>
                                </div>
                                <div class="eventTime">
                                    <h3><?php echo $time ?></h3>
                                </div>
                            </div>
                        </div>
                        <?php }
                                        }
                                    }
                                }
                                ?>
                        <?php
                                if (isset($_POST['tomorrowBtn'])) {
                                    $num = 0;
                                    while (($res = mysqli_fetch_array($query)) && ($num <= 7)) {
                                        $eventDate =  $res['date'];
                                        if ($eventDate == $tomorrowDate) {
                                            if (!$res['complete'] >= 1) {
                                                $num = $num + 1;
                                                $title = $res['event_title'];
                                                $date = $res['date'];
                                                $desc = $res['event_desc'];
                                                $time = $res['time'];
                                ?>
                        <div class="eventDetails">
                            <div class="eventDetailsTop">
                                <div class="eventTitle">
                                    <h1>
                                        <?php echo $title ?></h1>
                                </div>
                                <div class="eventDate">
                                    <h1> <?php echo $date ?></h1>
                                </div>
                            </div>
                            <div class="eventDetailsDown">
                                <div class="eventDescription">
                                    <h3>
                                        <?php echo $desc ?></h3>
                                </div>
                                <div class="eventTime">
                                    <h3><?php echo $time ?></h3>
                                </div>
                            </div>
                        </div>
                        <?php }
                                        }
                                    }

                                    ?> <?php
                                    } else { ?>
                        <?php
                                        $num = 0;
                                        while (($res = mysqli_fetch_array($query)) && ($num <= 7)) {
                                            $num = $num + 1;
                                            if (!$res['complete'] >= 1) {
                                                $title = $res['event_title'];
                                                $date = $res['date'];
                                                $desc = $res['event_desc'];
                                                $time = $res['time'];
                                    ?>
                        <div class="eventDetails">
                            <div class="eventDetailsTop">
                                <div class="eventTitle">
                                    <h1>
                                        <?php echo $title ?></h1>
                                </div>
                                <div class="eventDate">
                                    <h1> <?php echo $date ?></h1>
                                </div>
                            </div>
                            <div class="eventDetailsDown">
                                <div class="eventDescription">
                                    <h3>
                                        <?php echo $desc ?></h3>
                                </div>
                                <div class="eventTime">
                                    <h3><?php echo $time ?></h3>
                                </div>
                            </div>
                        </div>
                        <?php }
                                        }
                                    } ?>


                    </div>
                </div>
            </div>
        </div>
        </div>
    </body>
    <script>
// // document.getElementById("allbtnform").submit();
// window.onload = function() {
//     document.forms['allbtnfrom'].submit();
// }
// function autoSubmit() {
//     document.allbtnform.submit();
// }
    </script>
    <?php


    } else {
        header('location:./signin.php');
    }
        ?>

    </html>