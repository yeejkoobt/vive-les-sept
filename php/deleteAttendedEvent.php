<?php
/**
 * Created by PhpStorm.
 * User: Yeejkoob
 * Date: 4/20/2017
 * Time: 4:26 PM
 */
require 'connectDB.php';
header('refresh:2;url=../html/eventIndexPage.html');
$userId = $_COOKIE['user_id'];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $eventId = $_POST["eventId"];
    $sql = "DELETE FROM csc4710team7.tbl_event_participant WHERE csc4710team7.tbl_event_participant.event_id=\"$eventId\" AND csc4710team7.tbl_event_participant.participant_id=\"$userId\";";
    $result = query($mysqli, $sql);
}


?>