<?php
/**
 
 */
// Setup the connection info and connect - Keep the connectDB.php file off of Github
require 'connectDB.php';


// variables defined

header('refresh:1;url=login.php');

$hostUserName = $_COOKIE["username"]; // username and userid both in a cookie
$hostId = $_COOKIE["user_id"]; 
$schoolName = "";
$schoolCountry = "";
$schoolCity = "";
$schoolState = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // we want to Normalize  the input provided by the user of the social network and have the script return the normalized string
    $schoolName = normalizeData($_POST["schoolName"]);
    $schoolCountry = normalizeData($_POST["schoolCountry"]);
    $schoolCity = normalizeData($_POST["schoolCity"]);
    $schoolState = normalizeData($_POST["schoolState"]);
    

    // To insert data into the database
    $sql = "INSERT INTO csc4710team7.tbl_school " .
        "(host_id, name, country, city, state) " .
        "VALUES(\"$hostId\", " .
        "\"$schoolName\", " .
        "\"$schoolCountry\", " .
        "\"$schoolCity\", " .
        "\"$schoolState\");";

    $result = query($mysqli, $sql);
    phpAlert("$schoolName  successfully added");
 
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