<?php

// Setup the connection info and connect
require 'connectDB.php';

$loginResultString = "";

// Check if any POST information has been sent
// If so, we can submit that to the DB
if ( isset($_POST["username"]) && !empty($_POST["username"]) && isset($_POST["password"]) && !empty($_POST["password"])) {

    // htmlspecialchars() is required to prevent HTML and Javascript injection attacks
    // Should really check for SQL injection attacks too, but I don't know how to do that yet.
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);

    $sql = 'SELECT * FROM tbl_user WHERE username = "' . $username . '";';

    $result = query($mysqli, $sql);

    // Check to see if no rows were returned, if so display a message
    if ($result->num_rows === 0) {
        $loginResultString = 'No user found with the username: ' . $username;
    } else {

        $row = $result->fetch_assoc();

        if ( $row['password'] === $_POST["password"] ) {
            // Success, print out the link to the user's profile and set a cookie with their username
            $loginResultString = 'Success!<br/>\n<a href="profile.php?username=' . $row['username'] . '">Go to your profile page ' . $row['username'] . '.</a></br>';

            setcookie("username", $username, time()+(60*60*24)); 
        } else {
            $loginResultString = "Incorrect Password!\n";
        }            
    }

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

    <style>
        body {
            font-family: sans-serif;
        }

        table {
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid black;
        }

        th {
            font-weight: bold;
        }
    </style>

</head>
<body>

    <h1>Login</h1>
    <form action="login.php" method="post">
        <label for="username">Username:</label>
        <input id="username" name="username" type="text" /><br/>

        <label for="password">Password:</label>
        <input id="password" name="password" type="password" /><br/>

        <button id="loginButton" type="submit">Login</button>
        <div><?php echo $loginResultString; ?></div>
    </form>
    <div>
    </div>
</body>
</html>
