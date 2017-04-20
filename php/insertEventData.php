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
header('refresh:2;url=html/eventIndexPage.html');
$hostUserName = $_COOKIE["username"]; // Assume that the username has been put into a username into a cookie
$hostId = $_COOKIE["user_id"];// Assume that the user id has been put into a cookie
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

    // Insert the event data into the DB
    $sql = "INSERT INTO csc4710team7.tbl_event " .
        "(host_id, name, description, country, city, state, address, time_begins, time_ends) " .
        "VALUES(\"$hostId\", " .
        "\"$eventName\", " .
        "\"$eventDescription\", " .
        "\"$eventCountry\", " .
        "\"$eventCity\", " .
        "\"$eventState\", " .
        "\"$eventAddress\", " .
        "\"$eventTimeBegins\", " .
        "\"$eventTimeEnd\");";
    $result = query($mysqli, $sql);

    phpAlert("$eventName was successfully created!");
//    echo "Inserted the event into tbl_event<br>";
}

function phpAlert($msg)
{
    echo '<script type="text/javascript">alert("' . $msg . '")</script>';
}

function normalizeData($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>