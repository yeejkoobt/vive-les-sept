<?php
/**
 * Created by PhpStorm.
 * User: Yeejkoob
 * Date: 4/12/2017
 * Time: 12:40 PM
 */
require "connectDB.php";
// Assume that the searched event page saved the searched event's host id into a session key named
// searchedEventHostId
//$searchedEventHostId = $_SESSION["searchedEventHostId"];
function normalizeData($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$eventName = "";
$eventAddress = "";
$eventCountry = "";
$eventState = "";
$eventCity = "";

// Initialize the errors to empty strings
$eventNameError = "";
$eventAddressError = "";
$eventCountryError = "";
$eventStateError = "";
$eventCityError = "";

$isAllDataFieldsSet = true;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["eventName"])) {
        $eventNameError = "Event name is required";
        $isAllDataFieldsSet = false;
    } else {
        $eventName = normalizeData($_POST["eventName"]);
    }
    if (empty($_POST["eventAddress"])) {
        $eventNameError = "Event address is required";
        $isAllDataFieldsSet = false;
    } else {
        $eventName = normalizeData($_POST["eventAddress"]);
    }
    if (empty($_POST["eventCountry"])) {
        $eventNameError = "Event country is required";
        $isAllDataFieldsSet = false;
    } else {
        $eventName = normalizeData($_POST["eventCountry"]);
    }
    if (empty($_POST["eventState"])) {
        $eventNameError = "Event state is required";
        $isAllDataFieldsSet = false;
    } else {
        $eventName = normalizeData($_POST["eventState"]);
    }
    if (empty($_POST["eventCity"])) {
        $eventNameError = "Event city is required";
        $isAllDataFieldsSet = false;
    } else {
        $eventName = normalizeData($_POST["eventCity"]);
    }

    if ($isAllDataFieldsSet == true) {
        $sql = "SELECT * FROM csc4710team7.tbl_event AS event 
        WHERE event.name = $eventName AND
              event.address = $eventAddress AND
              event.country = $eventCountry AND
              event.state = $eventState AND
              event.city = $eventCity";

        $result = query($mysqli, $sql);
        while ($row = $result->fetch_assoc()) {
            echo "<tr>\n<td>" .
                $row["name"] . "</td>\n<td>" .
                $row["address"] . "</td>\n<td>" .
                $row["country"] . "</td>\n<td>" .
                $row["state"] . "<td>\n</td><td>" .
                $row["city"] . "</td></tr>\n";
        }
    }
}


