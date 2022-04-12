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
                            <h1><?php echo "Welcome, " . $row['fullname']; ?></h1>
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
                        <a href="./completed.php">Completed Events </a>
                    </div>
                    <div class="setting">
                        <a href="#">Setting </a>
                    </div>
                    <div class="logout">
                        <a href="./logout.php">Logout</a>
                    </div>
                </div>
            </div>
            <div class="content">
                <div class="changeName">
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
                        <label>Change Name </label>
                        <input type="text" name="newName" value="<?php echo $row['fullname'] ?> ">
                        <br>
                        <input name="submit" type="submit">
                    </form>
                    <!-- <form>

                        <label>New Password </label>
                        <input type="password" name="newPassword" placeholder="*******">

                        <label>Confirm Password </label>
                        <input type="password" name="confirmPassword" placeholder="*******">
                    </form> -->
                </div>
            </div>
        </div>
        <?php
            if (isset($_POST['submit'])) {
                $newName = $_POST['newName'];
                // $confirmPassword = md5($_POST['confirmPassword']);
                // $q = "UPDATE `users` SET `fullname`='$newName', `password`='$confirmPassword' WHERE `id`='$userId' ";
                $q = "UPDATE `users` SET `fullname`='$newName' WHERE `id`='$userId' ";
                $query = mysqli_query($conn, $q);
                // if ($conn->query($q)) {
                //     echo "data inserted";
                // } else {
                //     die(mysqli_error($conn));
                // }
                echo "<meta http-equiv='refresh' content='0'>";
            }
        }
    } else {
        header('location:./signin.php');
    }
        ?>
    </body>

    </html>