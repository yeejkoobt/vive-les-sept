<?php

// Setup the connection info and connect
require 'connectDB.php';

$postString = "";

// Check if any POST information has been sent
// If so, we can submit that to the DB
if ( isset($_COOKIE["user_id"]) && !empty($_COOKIE["user_id"]) && isset($_POST["title"]) && !empty($_POST["title"]) && isset($_POST["postText"]) && !empty($_POST["postText"])) {

    // htmlspecialchars() is required to prevent HTML and Javascript injection attacks
    // Should really check for SQL injection attacks too, but I don't know how to do that yet.
    $username = htmlspecialchars($_COOKIE["username"]);
    $user_id = htmlspecialchars($_COOKIE["user_id"]);
    $title = htmlspecialchars($_POST['title']);
    $text = htmlspecialchars($_POST['postText']);


    $sql = 'INSERT INTO tbl_post (author_id, title, text) VALUES( "' . $user_id . '", "' . $title . '", "' . $text . '");';
    $result = query($mysqli, $sql);
    $postString = "Post added: " . $text;

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

        <h1>Writing a post as <?php echo $_COOKIE["username"]; ?>:</h1>
        <form action="addPost.php" method="post">
            <label for="title">Title:</label>
            <input id="title" name="title" type="text" size="60" maxlength="100"/><br/>

            <label for="postText">Post:</label>
            <textarea id="postText" name="postText" maxlength="1000" rows="8" cols="60"></textarea><br/>

            <label for="postButton"></label>
            <button id="postButton" type="submit">Submit Post</button><br/>
        </form>
        <div><?php echo $postString; ?></div>

    </div>

</body>
</html>
