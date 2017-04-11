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

?>
<body bgcolor="#AFEBBC">

<!-- Primary Page Layout
–––––––––––––––––––––––––––––––––––––––––––––––––– -->
<div class="container">
    <div class="row">
        <div class="one-half column">
            <form>
                Event Name:<br>
                <input type="text" name="eventName"><br>
                Event Description:<br>
                <input type="text" name="eventDescription"><br>
                <input type="submit">
            </form>
        </div>
    </div>
</div>

<!-- End Document
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
</body>
</html>
