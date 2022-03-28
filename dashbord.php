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
    session_start();
    // session_destroy();
    // if (!isset($_SESSION['SESSION_EMAIL'])) {
    //     header("Location: ./signin.php");
    //     die();
    // }

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


                            <h1><?php echo "Welcome " . $row['fullname'];
                                }
                                    ?></h1>
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
                        <a href="./logout.php">Logout</a>
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
                            $q = "select * from eventdetails WHERE userId= $userId";
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