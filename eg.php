<!DOCTYPE html>
<html>

<head>
    <title>
        How to call PHP function
        on the click of a Button ?
    </title>
</head>

<body style="text-align:center;">

    <h1 style="color:green;">
        GeeksforGeeks
    </h1>

    <h4>
        How to call PHP function
        on the click of a Button ?
    </h4>

    <?php

    if (isset($_POST['button1'])) {
        echo "This is Button1 that is selected";
    }
    if (isset($_POST['button2'])) {
        echo "This is Button2 that is selected";
    }
    ?>

    <form method="post">
        <input type="submit" name="button1" value="Button1" />

        <input type="submit" name="button2" value="Button2" />
    </form>
    </head>

</html>


<!-- <div class=" eventDetails">
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
                            </div> -->














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
<!--
                        <?php
                        if (isset($_POST['allBtn'])) { ?>
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
                        <?php } ?>

                        <?php
                        if (isset($_POST['todayBtn'])) {
                            if ($eventDate == $todayDate) {
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
                        } ?>
                        <?php
                        if (isset($_POST['tomorrowBtn'])) {
                            if ($eventDate == $tomorrowDate) { ?>
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
                        ?> -->
</div>