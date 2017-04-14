<?php

// Setup the connection info and connect
require 'connectDB.php';

$statusString = "";

// Check if any POST information has been sent
// If so, we can submit that to the DB
if ( isset($_COOKIE["user_id"]) && !empty($_COOKIE["user_id"]) && isset($_POST["status"]) && !empty($_POST["status"])) {

    // htmlspecialchars() is required to prevent HTML and Javascript injection attacks
    // Should really check for SQL injection attacks too, but I don't know how to do that yet.
    $username = htmlspecialchars($_COOKIE["username"]);
    $user_id = htmlspecialchars($_COOKIE["user_id"]);
    $status = htmlspecialchars($_POST['status']);

    $sql = 'INSERT INTO tbl_status (author_id, text) VALUES( "' . $user_id . '", "' . $status . '");';
    $result = query($mysqli, $sql);
    $statusString = "Status added: " . $status;

}

?>

<!DOCTYPE html>

<!--
Team 7
CSC4710 Database Systems
-->

<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Login</title>

    <!-- Load external CSS to make things look a little nicer -->   
    <link href="style.css" rel="stylesheet">

    <!-- Google Fonts-->
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans|Roboto+Slab" rel="stylesheet">
</head>
<body>

    <div class="container">

        <h1>Writing a status as <?php echo $_COOKIE["username"]; ?>:</h1>
        <form action="addStatus.php" method="post">
            <label for="status">Status:</label>
            <input id="status" name="status" type="text" size="100" maxlength="100"/><br/>

            <label for="statusButton"></label>
            <button id="statusButton" type="submit">Submit Status</button><br/>
        </form>
        <div><?php echo $statusString; ?></div>

    </div>

</body>
</html>
