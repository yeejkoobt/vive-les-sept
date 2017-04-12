<!--
    This page is a form for when users want to create an event on vive-les-sept
-->
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
    <link rel="stylesheet" href=".././css/normalize.css">
    <link rel="stylesheet" href=".././css/skeleton.css">
    <!-- Favicon
    –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <link rel="icon" type="image/png" href="images/favicon.png">

</head>
<?php
/**
 * Created by PhpStorm.
 * User: Yeejkoob
 * Date: 4/10/2017
 * Time: 11:35 PM
 */
// Setup the connection info and connect - Keep the connectDB.php file off of Github
require 'connectDB.php';
// define variables and set to empty values
$hostId = "";
$eventName = "";
$eventDescription = "";
$eventTimeBegins = "";
$eventTimeEnd = "";
$eventCountry = "";
$eventAddress = "";
$eventState = "";
$eventCity = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $eventName = normalizeData($_POST["eventName"]);
    $eventDescription = normalizeData($_POST["eventDescription"]);
    $eventTimeBegins = normalizeData($_POST["eventTimeBegins"]);
    $eventTimeEnd = normalizeData($_POST["eventTimeEnds"]);
    $eventCountry = normalizeData($_POST["eventCountry"]);
    $eventAddress = normalizeData($_POST["eventAddress"]);
    $eventState = normalizeData($_POST["eventState"]);
    $eventCity = normalizeData($_POST["eventCity"]);

    // Get the user's id and use that as the poster's id
    $sql = "SELECT users.user_id FROM csc4710team7 AS users WHERE users.id=1";
    $result = query($mysqli, $sql);
    $row = $result->fetch_assoc();
    $hostId = $row["user_id"];

    // Insert the event data into the DB
    $sql = "INSERT INTO csc4710team7.tbl_event " .
        "(host_id, name, description, country, city, state, address, time_begins, time_ends) " .
        "VALUES($hostID, 
                $eventName, 
                $eventDescription, 
                $eventCountry, 
                $eventCity, 
                $eventAddress, 
                $eventTimeBegins, 
                $eventTimeEnd)";
    $result = query($mysqli, $sql);
    echo "Inserted the event into tbl_event<br>";
}

function normalizeData($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>
<body bgcolor="#AFEBBC">

<!-- Primary Page Layout
–––––––––––––––––––––––––––––––––––––––––––––––––– -->
<div class="container">
    <div class="row">
        <div class="one-half column">
            <form id="eventCreationForm" method="post" action="createEventPage.php">
                Event Name: <input type="text" name="eventName"><br>
                Event Description:<br>
                <textarea name="eventDescription"></textarea><br>
                Event Time Begins: <input type="datetime" name="eventTimeBegins"><br>
                Event Time Ends: <input type="datetime" name="eventTimeEnds"><br>
                Event Country: <input type="text" name="eventCountry"><br>
                Event Address: <input type="text" name="eventAddress"><br>
                Event State:
                <select name="eventState">
                    <option value="AL">Alabama</option>
                    <option value="AK">Alaska</option>
                    <option value="AZ">Arizona</option>
                    <option value="AR">Arkansas</option>
                    <option value="CA">California</option>
                    <option value="CO">Colorado</option>
                    <option value="CT">Connecticut</option>
                    <option value="DE">Delaware</option>
                    <option value="DC">District Of Columbia</option>
                    <option value="FL">Florida</option>
                    <option value="GA">Georgia</option>
                    <option value="HI">Hawaii</option>
                    <option value="ID">Idaho</option>
                    <option value="IL">Illinois</option>
                    <option value="IN">Indiana</option>
                    <option value="IA">Iowa</option>
                    <option value="KS">Kansas</option>
                    <option value="KY">Kentucky</option>
                    <option value="LA">Louisiana</option>
                    <option value="ME">Maine</option>
                    <option value="MD">Maryland</option>
                    <option value="MA">Massachusetts</option>
                    <option value="MI">Michigan</option>
                    <option value="MN">Minnesota</option>
                    <option value="MS">Mississippi</option>
                    <option value="MO">Missouri</option>
                    <option value="MT">Montana</option>
                    <option value="NE">Nebraska</option>
                    <option value="NV">Nevada</option>
                    <option value="NH">New Hampshire</option>
                    <option value="NJ">New Jersey</option>
                    <option value="NM">New Mexico</option>
                    <option value="NY">New York</option>
                    <option value="NC">North Carolina</option>
                    <option value="ND">North Dakota</option>
                    <option value="OH">Ohio</option>
                    <option value="OK">Oklahoma</option>
                    <option value="OR">Oregon</option>
                    <option value="PA">Pennsylvania</option>
                    <option value="RI">Rhode Island</option>
                    <option value="SC">South Carolina</option>
                    <option value="SD">South Dakota</option>
                    <option value="TN">Tennessee</option>
                    <option value="TX">Texas</option>
                    <option value="UT">Utah</option>
                    <option value="VT">Vermont</option>
                    <option value="VA">Virginia</option>
                    <option value="WA">Washington</option>
                    <option value="WV">West Virginia</option>
                    <option value="WI">Wisconsin</option>
                    <option value="WY">Wyoming</option>
                </select><br>
                Event City: <input type="text" name="eventCity"><br>
                <input type="submit" name="submitButton">
            </form>
        </div>
    </div>
</div>

<!-- End Document
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
</body>
</html>
