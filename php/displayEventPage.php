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
                    $eventAddress = normalizeData($_POST["eventAddress"]);
                }
                if (empty($_POST["eventCountry"])) {
                    $eventNameError = "Event country is required";
                    $isAllDataFieldsSet = false;
                } else {
                    $eventCountry = normalizeData($_POST["eventCountry"]);
                }
                if (empty($_POST["eventState"])) {
                    $eventNameError = "Event state is required";
                    $isAllDataFieldsSet = false;
                } else {
                    $eventState = normalizeData($_POST["eventState"]);
                }
                if (empty($_POST["eventCity"])) {
                    $eventNameError = "Event city is required";
                    $isAllDataFieldsSet = false;
                } else {
                    $eventCity = normalizeData($_POST["eventCity"]);
                }

                if ($isAllDataFieldsSet == true) {
                    $sql = "SELECT * FROM csc4710team7.tbl_event AS event " .
                        "WHERE event.name = \"$eventName\" AND " .
                        "event.address = \"$eventAddress\" AND " .
                        "event.country = \"$eventCountry\" AND " .
                        "event.state = \"$eventState\" AND " .
                        "event.city = \"$eventCity\";";

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
            } ?>
            <form name="getEvent" method="post" action="displayEventPage.php">
                Event Name: <input type="text" name="eventName">
                <span class="error">* <?php echo $eventNameError; ?></span><br><br>
                Event Address: <input type="text" name="eventAddress">
                <span class="error">* <?php echo $eventAddressError; ?></span><br><br>
                Event Country: <input type="text" name="eventCountry">
                <span class="error">* <?php echo $eventCountryError; ?></span><br><br>
                Event State: <select name="eventState">
                    <option value="AL">Alabama</option>
                    <option value="AK">Alaska</option>
                    <option value="AZ">Arizona</option>
                    <option value="AR">Arkansas</option>
                    <option value="CA">California</option>
                    <option value="CO">Colorado</option>
                    <option value="CT">Connecticut</option>
                    <option value="DE">Delaware</option>
                    <option value="DC">District Of Columbia</option>
                    <option value="FL">Florida</option>
                    <option value="GA">Georgia</option>
                    <option value="HI">Hawaii</option>
                    <option value="ID">Idaho</option>
                    <option value="IL">Illinois</option>
                    <option value="IN">Indiana</option>
                    <option value="IA">Iowa</option>
                    <option value="KS">Kansas</option>
                    <option value="KY">Kentucky</option>
                    <option value="LA">Louisiana</option>
                    <option value="ME">Maine</option>
                    <option value="MD">Maryland</option>
                    <option value="MA">Massachusetts</option>
                    <option value="MI">Michigan</option>
                    <option value="MN">Minnesota</option>
                    <option value="MS">Mississippi</option>
                    <option value="MO">Missouri</option>
                    <option value="MT">Montana</option>
                    <option value="NE">Nebraska</option>
                    <option value="NV">Nevada</option>
                    <option value="NH">New Hampshire</option>
                    <option value="NJ">New Jersey</option>
                    <option value="NM">New Mexico</option>
                    <option value="NY">New York</option>
                    <option value="NC">North Carolina</option>
                    <option value="ND">North Dakota</option>
                    <option value="OH">Ohio</option>
                    <option value="OK">Oklahoma</option>
                    <option value="OR">Oregon</option>
                    <option value="PA">Pennsylvania</option>
                    <option value="RI">Rhode Island</option>
                    <option value="SC">South Carolina</option>
                    <option value="SD">South Dakota</option>
                    <option value="TN">Tennessee</option>
                    <option value="TX">Texas</option>
                    <option value="UT">Utah</option>
                    <option value="VT">Vermont</option>
                    <option value="VA">Virginia</option>
                    <option value="WA">Washington</option>
                    <option value="WV">West Virginia</option>
                    <option value="WI">Wisconsin</option>
                    <option value="WY">Wyoming</option>
                </select>
                <span class="error">* <?php echo $eventStateError; ?></span><br><br>
                Event City: <input type="text" name="eventCity">
                <span class="error">* <?php echo $eventCityError; ?></span><br><br>
                <input type="submit" id="submitButton">
            </form>
        </div>
    </div>
</div>
</body>
</html>