<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ERS Events</title>
    <link rel="stylesheet" href="./css/style.css">
</head>

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
                    <div class="eventDetails">
                        <div class="eventDetailsTop">
                            <div class="eventTitle">
                                <h1>Birthday</h1>
                            </div>
                            <div class="eventDate">
                                <h1>Jan 13, 2022</h1>
                            </div>
                        </div>
                        <div class="eventDetailsDown">
                            <div class="eventDescription">
                                <h3> Ashwin Birthday Party at kapan</h3>
                            </div>
                            <div class="eventTime">
                                <h3>8:00 AM</h3>
                            </div>
                        </div>

                    </div>
                    <div class="eventDetails">
                        <div class="eventDetailsTop">
                            <div class="eventTitle">
                                <h1>Project Defense</h1>
                            </div>
                            <div class="eventDate">
                                <h1>Mar 13, 2022</h1>
                            </div>
                        </div>
                        <div class="eventDetailsDown">
                            <div class="eventDescription">
                                <h3>Defense of college project</h3>
                            </div>
                            <div class="eventTime">
                                <h3>10:00 AM</h3>
                            </div>
                        </div>
                    </div>

                    <div class="eventDetails">
                        <div class="eventDetailsTop">
                            <div class="eventTitle">
                                <h1>Wedding</h1>
                            </div>
                            <div class="eventDate">
                                <h1>Apr 13, 2022</h1>
                            </div>
                        </div>
                        <div class="eventDetailsDown">
                            <div class="eventDescription">
                                <h3>Wedding of Subash</h3>
                            </div>
                            <div class="eventTime">
                                <h3>8:00 AM</h3>
                            </div>
                        </div>
                    </div>

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
                <form>

                    <label>Enter Event </label>
                    <input type="text" name="eventTitle" placeholder="Event Title">
                    <input type="text" name="eventDesc" placeholder="Event Description">
                    <input type="date" name="eventDate" placeholder="Event Date">
                    <input type="time" name="eventTime" placeholder="Event Time">
                </form>
            </div>
        </div>

</body>

</html>