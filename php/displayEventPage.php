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
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="../css/skeleton.css">
    <!-- Favicon
    –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <link rel="icon" type="image/png" href="images/favicon.png">
</head>
<body bgcolor="#AFEBBC">
<div class="container">
    <div class="row">
        <div class="one-half column">
            <form name="getEvent" method="post" action="getEvent.php">
                Event Name: <input type="text" name="eventName"><br>
                Event Address: <input type="text" name="eventAddress"><br>
                Event Country: <input type="text" name="eventCountry"><br>
                Event State: <input type="text" name="eventState"><br>
                Event City: <input type="text" name="eventCity"><br>
                <input type="submit" id="submitButton">
            </form>
        </div>
    </div>
</div>

</body>
</html>