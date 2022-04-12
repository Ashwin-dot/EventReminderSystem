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
                    <a href="./dashbord.php">Home </a>
                </div>
                <div class="events">
                    <a href="#">Events </a>
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
            <div class="content-list">
                <button id="listofEventBtn">List of events</button>

            </div>
            <div class="content-all">
                <div class="eventlist">
                    <?php
                            $q = "select * from eventdetails WHERE userId= $userId ";
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
                            <button id="editEventBtn" onclick="editevent()">Edit Event</button>
                            <button id="deleteEventBtn"><a href="./php/delete.php?id=<?php echo $res['event_id']; ?>">
                                    Delete </a> </button>
                            <button id="completeEventBtn"><a
                                    href="./php/complete.php?id=<?php echo $res['event_id']; ?>">
                                    Mark as Done </a></button>
                            <button id="setReminderBtn">Set Reminder</button>


                        </div>

                    </div>

                    <div class="editEvent" id="eventDetails" style="display: none;">
                        <form name="editEvent" action=" ./php/edit.php?id=<?php echo $res['event_id']; ?>" method="post" onsubmit="return evalidation()">
                            <label>Enter Event </label>
                            <input type="text" id="eeventTitle" name="eeventTitle" placeholder="Event Title"
                                value=" <?php echo $res['event_title'] ?> "><span id = "etitleerror"></span>
                            <input type="text" id="eeventDesc" name="eeventDesc" placeholder="Event Description"
                                value=" <?php echo $res['event_desc'] ?> "><span id = "edescerror"></span>
                            <input type="date" id="eeventDate" name="eeventDate" placeholder="Event Date"
                                value=" <?php echo $res['date'] ?> "><span id = "edateerror"></span>
                            <input type="time" id="eeventTime" name="eeventTime" placeholder="Event Time"
                                value=" <?php echo $res['time'] ?> "><span id = "etimeerror"></span>
                            <input name="esubmit" type="submit">
                        </form>
                    </div>
                    <?php }
                            }
                     ?>

                </div>
            </div>

            <div class="content-features">
                <button id="addEventBtn" onclick="addevent()">Add Event</button>
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

            function editevent() {
                var editDetails = document.getElementById('eventDetails')
                if (editDetails.style.display === "none") {
                    editDetails.style.display = "block";
                } else {
                    editDetails.style.display = "none";
                }
            }
            </script>


            <div class="popupAddevent"  id="addDetails" style="display: none;">
                <form name="addEvent" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" onsubmit="return validation()">
                    <label>Enter Event </label>
                    <input type="text" id="eventTitle" name="eventTitle" placeholder="Event Title"><span id = "titleerror"></span>
                    <input type="text" id="eventDesc" name="eventDesc" placeholder="Event Description"><span id = "descerror"></span>
                    <input type="date" id="eventDate" name="eventDate" placeholder="Event Date" ><span id = "dateerror"></span>
                    <input type="time" id="eventTime" name="eventTime" placeholder="Event Time" ><span id = "timeerror"></span>
                    <input name="submit" type="submit">
                </form>
            </div>
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



</body>
</html>