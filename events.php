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
                    <a href="#">Events </a>
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
            <div class="content-list">
                <button id="listofEventBtn">List of events</button>

            </div>
            <div class="content-features">
                <button id="addEventBtn" onclick="addevent()">Add Event</button>
            </div>
            <div class="popupAddevent" id="addDetails" style="display: none;">
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
                    <label>
                        <h3>Enter Event</h3>
                    </label>
                    <input type="text" name="eventTitle" placeholder="Event Title">
                    <input type="text" name="eventDesc" placeholder="Event Description">
                    <input type="date" name="eventDate" placeholder="Event Date">
                    <input type="time" name="eventTime" placeholder="Event Time">
                    <input name="submit" type="submit">
                </form>
            </div>
            <div class="content-all">
                <div class="eventlist">
                    <?php
                            $q = "SELECT * FROM `eventdetails` WHERE userID=$userId ORDER BY date DESC;";
                            $qy = "select event_id from eventdetails WHERE userId= $userId";
                            $query = mysqli_query($conn, $q);
                            // $res = $conn->query($q);
                            while ($res = mysqli_fetch_array($query)) {
                                if (!$res['complete'] >= 1) {
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
                            <button id="editEventBtn" onclick="editevent()">Edit event </button>
                            <!-- <?php $eventid = $res['event_id'];
                                                    echo $res['event_id']; ?> -->
                            <!-- <form method=" post" name="editEvent">
                                <input type="submit" name="editBtn" value="edit events">
                                </form> -->
                            <button id="deleteEventBtn"><a href="./php/delete.php?id=<?php echo $res['event_id']; ?>">
                                    Delete </a> </button>
                            <button id="completeEventBtn"><a
                                    href="./php/complete.php?id=<?php echo $res['event_id']; ?>">
                                    Mark as Done </a></button>
                            <button id="setReminderBtn">Set Reminder</button>


                        </div>

                    </div>

                    <div class="editEvent" id="eventDetails" style="display: none;">
                        <form action=" ./php/edit.php?id=<?php echo $res['event_id']; ?>" method="post">
                            <label>
                                <h3>Change Event</h3>
                            </label>
                            <input type="text" name="eeventTitle" placeholder="Event Title"
                                value=" <?php echo $res['event_title'] ?> ">
                            <input type="text" name="eeventDesc" placeholder="Event Description"
                                value=" <?php echo $res['event_desc'] ?> ">
                            <input type="date" name="eeventDate" placeholder="Event Date"
                                value=" <?php echo $res['date'] ?> ">
                            <input type="time" name="eeventTime" placeholder="Event Time"
                                value=" <?php echo $res['time'] ?> ">
                            <input name="esubmit" type="submit">
                        </form>
                    </div>
                    <?php }
                                // }
                            } ?>

                </div>
            </div>


            <script>
            function addevent() {
                var addDetails = document.getElementById('addDetails')
                if (addDetails.style.display === "none") {
                    addDetails.style.display = "block";
                } else {
                    addDetails.style.display = "none";
                }
            }
            // var editDetails = document.getElementById('eventDetails')
            // // console.log(e)
            // // var editDetails = e;
            // var editBtn = document.getElementById('<?php $eventid ?>').addEventListener('click', () => {
            //     console.log(" edit is clicked")
            // })

            function editevent() {
                var editDetails = document.getElementById('eventDetails')
                if (editDetails.style.display === "none") {
                    editDetails.style.display = "block";
                } else {
                    editDetails.style.display = "none";
                }
            }
            </script>
        </div>
        <?php


            if (isset($_POST['submit'])) {
                $eventTitle = $_POST['eventTitle'];
                $eventDesc = $_POST['eventDesc'];
                $eventDate = $_POST['eventDate'];
                $eventTime = $_POST['eventTime'];

                $q = "INSERT INTO `eventdetails`(`event_title`, `event_desc`, `date`, `time`,`userId`) VALUES ('$eventTitle','$eventDesc','$eventDate','$eventTime','$userId')";
                $query = mysqli_query($conn, $q);
                //    if($conn->query($q)) {
                //        echo "data inserted";
                //    }
                //    else{
                //       die(mysqli_error($conn));
                //        } 
                echo "<meta http-equiv='refresh' content='0'>";
            }
        } else {
            header('location:./signin.php');
        }
            ?>
            <script type="text/javascript">
                function validation(){
                    var status = 0;
                    var eventTitle = document.addEvent.eventTitle.value.trim();
                    var eventDesc = document.addEvent.eventDesc.value.trim();
                    var eventDate = document.addEvent.eventDate.value.trim();
                    var eventTime = document.addEvent.eventTime.value.trim();
                    if(eventTitle == ""){
                        document.getElementById('titleerror').innerHTML="Please include title";
                        status++;
                    }
                    if(eventTitle.length>100){
                        document.getElementById('titleerror').innerHTML="cannot be maximm then 100";
                        return false;
                    }
                    if(eventDesc == ""){
                        document.getElementById('descerror').innerHTML="Please include description";
                        return false;
                    }
                    if(eventDesc.length>500){
                        document.getElementById('descerror').innerHTML="Please include less description";
                        return false;
                    }
                    if(eventDate ==""){
                        document.getElementById('dateerror').innerHTML="Please select date";
                        return false;
                    }
                    if(eventTime ==""){
                        document.getElementById('timeerror').innerHTML="Please select time";
                        return false;
                    }
                    if (status==0){
                        return true;
                    }else 
                    return false;

                }
            
            </script>

<script type="text/javascript">
                function evalidation(){
                    var status = 0;
                    var eeventTitle = document.editEvent.eeventTitle.value.trim();
                    var eeventDesc = document.editEvent.eeventDesc.value.trim();
                    var eeventDate = document.editEvent.eeventDate.value.trim();
                    var eeventTime = document.editEvent.eeventTime.value.trim();
                    if(eventTitle == ""){
                        document.getElementById('etitleerror').innerHTML="Please include title";
                        status++;
                    }
                    if(eventTitle.length>100){
                        document.getElementById('etitleerror').innerHTML="cannot be maximm then 100";
                        return false;
                    }
                    if(eventDesc == ""){
                        document.getElementById('edescerror').innerHTML="Please include description";
                        return false;
                    }
                    if(eventDesc.length>500){
                        document.getElementById('edescerror').innerHTML="Please include less description";
                        return false;
                    }
                    if(eventDate ==""){
                        document.getElementById('edateerror').innerHTML="Please select date";
                        return false;
                    }
                    if(eventTime ==""){
                        document.getElementById('etimeerror').innerHTML="Please select time";
                        return false;
                    }
                    if (status==0){
                        return true;
                    }else 
                    return false;

                }
            
            </script>

<script src="./today-date.js"></script>
</body>

</html>

