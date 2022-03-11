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

include "./php/conn.php";

mysqli_select_db($conn,'dbname');
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
                        <h1>Welcome, Ashwin!</h1>
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
                    <a href="events.html">Logout</a>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="content-list">
                <button id="listofEventBtn">List of events</button>
                <button id="setReminderBtn">Set Reminder</button>
            </div>

            <div class="content-all">
                <div class="eventlist">
                    <?php
                 $q = "select * from eventdetails ";
                  $query = mysqli_query($conn,$q);
                    // $res = $conn->query($q);
                    while($res = mysqli_fetch_array($query)){
            ?>
                    <div class="eventDetails">
                        <div class="eventDetailsTop">
                            <div class="eventTitle">
                                <h1><?php   echo $res['event_title']; ?></h1>
                            </div>
                            <div class="eventDate">
                                <h1><?php   echo $res['date']; ?></h1>
                            </div>
                        </div>
                        <div class="eventDetailsDown">
                            <div class="eventDescription">
                                <h3><?php   echo $res['event_desc']; ?></h3>
                            </div>
                            <div class="eventTime">
                                <h3><?php   echo $res['time']; ?></h3>
                            </div>
                        </div>
                    </div>
                    <?php } ?>


                </div>
                <div class="times">
                    <div class="calender">

                    </div>
                    <div class="time">

                    </div>
                </div>


            </div>
            <div class="content-features">
                <button id="addEventBtn">Add Event</button>
                <button id="editEventBtn">Edit Event</button>
                <button id="deleteEventBtn">Delete Event</button>
                <button id="completeEventBtn">Mark as Done</button>
            </div>
            <div class="popupAddevent">
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
                    <label>Enter Event </label>
                    <input type="text" name="eventTitle" placeholder="Event Title">
                    <input type="text" name="eventDesc" placeholder="Event Description">
                    <input type="date" name="eventDate" placeholder="Event Date">
                    <input type="time" name="eventTime" placeholder="Event Time">
                    <input name="submit" type="submit">
                </form>
            </div>
        </div>
        <?php
if(isset($_POST['submit'])){    
    $eventTitle=$_POST['eventTitle'];
    $eventDesc=$_POST['eventDesc']; 
    $eventDate=$_POST['eventDate'];
    $eventTime=$_POST['eventTime'];
   
   $q = "INSERT INTO `eventdetails`(`event_title`, `event_desc`, `date`, `time`) VALUES ('$eventTitle','$eventDesc','$eventDate','$eventTime')";
           $query = mysqli_query($conn,$q);
    //    if($conn->query($q)) {
    //        echo "data inserted";
    //    }
    //    else{
    //       die(mysqli_error($conn));
    //        } 
}
?>

</body>

</html>