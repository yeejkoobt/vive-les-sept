<?php
/**
 * Created by PhpStorm.
 * User: Yeejkoob
 * Date: 4/19/2017
 * Time: 8:27 PM
 *
 * Description:
 * Add the user's id to the tbl_event_participant which takes in the event id and the user's id as the participant id
 */
require 'connectDB.php';
// define variables and set to empty values
header('refresh:2;url=displayEventPage.php');

$participantId = $_COOKIE["user_id"];// Assume that the user id has been put into a cookie

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $eventId = normalizeData($_POST["eventId"]);

    // Insert the event data into the DB
    $sql = "INSERT INTO csc4710team7.tbl_event_participant " .
        "(event_id, participant_id) " .
        "VALUES(\"$eventId\", " .
        "\"$participantId\");";
    $result = query($mysqli, $sql);
    phpAlert("You are attended!");
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