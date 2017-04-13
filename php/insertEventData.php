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
$hostUsername = $_SESSION["username"]; // Assume that the username has been put into a username Session Key
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
    // Get the user's id and use that as the poster's id
    $sql = "SELECT users.user_id FROM csc4710team7 AS users WHERE users.username=$hostUsername";
    $result = query($mysqli, $sql);
    $row = $result->fetch_assoc();
    $hostId = $row["user_id"];

    $eventName = normalizeData($_POST["eventName"]);
    $eventDescription = normalizeData($_POST["eventDescription"]);
    $eventTimeBegins = normalizeData($_POST["eventTimeBegins"]);
    $eventTimeEnd = normalizeData($_POST["eventTimeEnds"]);
    $eventCountry = normalizeData($_POST["eventCountry"]);
    $eventAddress = normalizeData($_POST["eventAddress"]);
    $eventState = normalizeData($_POST["eventState"]);
    $eventCity = normalizeData($_POST["eventCity"]);

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