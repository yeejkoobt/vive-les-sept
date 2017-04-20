<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Basic Page Needs
–––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <meta charset="utf-8">
    <title>Vive Les Sept - Create Event</title>
    <meta name="description" content="A small social media web application">
    <meta name="author" content="Vive Les Sept">

    <!-- Mobile Specific Metas
    –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- FONT
    –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <link href="//fonts.googleapis.com/css?family=Raleway:400,300,600" rel="stylesheet" type="text/css">

    <!-- CSS
    –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="../css/skeleton.css">
    <style>
        table, th, td {
            border: 1px solid black;
        }
    </style
            <!-- Favicon
    –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <link rel="icon" type="image/png" href="images/favicon.png">
</head>
<body bgcolor="#AFEBBC">
<div class="container">
    <div class="row">
        <div class="one-half column">
            <?php
            /**
             * Created by PhpStorm.
             * User: Yeejkoob
             * Date: 4/19/2017
             * Time: 9:36 PM
             */
            require 'connectDB.php';

            $tableOfResults = "";
            $participantId = $_COOKIE['user_id'];

            $sql = "SELECT * FROM csc4710team7.tbl_event_participant AS eventParticipant " .
                "JOIN csc4710team7.tbl_event AS event ON eventParticipant.event_id=event.event_id\n" .
                "WHERE eventParticipant.participant_id=\"$participantId\";";

            $result = query($mysqli, $sql);
            if ($result->num_rows > 0) {
                $tableOfResults .= "<table><tr><th>Event ID</th><th>Event Name</th><th>Description</th><th>Address</th><th>Country</th><th>State</th><th>City</th><th>Participants</th></tr>";
                while ($row = $result->fetch_assoc()) {
                    $tableOfResults .= "<tr>\n<td>" .
                        $row["event_id"] . "</td>\n<td>" .
                        $row["name"] . "</td>\n<td>" .
                        $row["description"] . "</td>\n<td>" .
                        $row["address"] . "</td>\n<td>" .
                        $row["country"] . "</td>\n<td>" .
                        $row["state"] . "</td>\n<td>" .
                        $row["city"] . "</td>" .
                        "<td><form method='post' action='displayEventParticipants.php'><input type='hidden' name='eventId' value='" . $row['event_id'] . "'><input type='submit' value='Display Participants' style='width: 100%'></form></td>";
                }
                $tableOfResults .= "</table><br>";
                echo "<h2>Events You Are Participating In:</h2>";
                echo $tableOfResults;
            }

            // Display the events that are hosted by the user
            echo "<br>";
            echo "<h2>Your Hosted Events:</h2>";
            $tableOfResults = "";
            $sql = "SELECT * FROM csc4710team7.tbl_event AS event " .
                "WHERE event.host_id=\"$participantId\";";

            $result = query($mysqli, $sql);
            if ($result->num_rows > 0) {
                $tableOfResults .= "<table><tr><th>Event ID</th><th>Event Name</th><th>Description</th><th>Address</th><th>Country</th><th>State</th><th>City</th><th>Participants</th></tr>";
                while ($row = $result->fetch_assoc()) {
                    $tableOfResults .= "<tr>\n<td>" .
                        $row["event_id"] . "</td>\n<td>" .
                        $row["name"] . "</td>\n<td>" .
                        $row["description"] . "</td>\n<td>" .
                        $row["address"] . "</td>\n<td>" .
                        $row["country"] . "</td>\n<td>" .
                        $row["state"] . "</td>\n<td>" .
                        $row["city"] . "</td>" .
                        "<td><form method='post' action='displayEventParticipants.php'><input type='hidden' name='eventId' value='" . $row['event_id'] . "'><input type='submit' value='Display Participants' style='width: 100%'></form></td>";
                }
                $tableOfResults .= "</table><br>";
                echo $tableOfResults;
            }
            ?>
        </div>
    </div>
</div>
</body>
</html>