<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="icon" href="icon_willow.png">
    <title>Willow NYPB</title>
</head>
<body>
<form action = "home.php" class = "icon">
      <input type = "image" src = "willow.png" alt = "icon">
    </form>
<?php
//echo "hello world";


session_start();
$user_id = $_SESSION["user_id"];
require 'database.php';



$stmt2 = $mysqli->prepare("select university from uni");
$stmt2->execute();
$stmt2->bind_result($allUnis);

?>
<div class="profiles">
<form action="listings.php" method="POST">
    <label for="uni">Choose a University:</label>
    <select name="uni">
        <?php
        while ($stmt2->fetch()) {
            echo "<option value = '$allUnis'>$allUnis</option>";
        }
        echo "</select>";
        echo "<input type='submit'/>";
        echo "</form>";
        $stmt2->close();

        echo "<br>";
        echo "<br>";
        echo "<br>";

        $uni = "fake";
        if (isset($_POST["uni"])) {
            $uni = $_POST["uni"];
        }
        // echo $uni;
        echo "<br>";

        $stmt = $mysqli->prepare("select user_id, time, price, year, bedrooms, description, address, zillow_link, bathrooms, profiles.first_name, profiles.last_name from listings join profiles on (listings.user_id=profiles.id) where profiles.university = ? ");
        $stmt->bind_param('s', $uni);

        if (!$stmt) {
            printf("Query Prep Failed: %s\n", $mysqli->error);
            exit;
        }
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();

        echo "<br>";
        echo "<div class= 'lefty'>";
        //prints out the title, body, link, and likes of the story 
        while ($row = $result->fetch_assoc()) {
            ?>
            <strong>Price: </strong>
            <?php
            echo htmlentities($row["price"]);
        ?>
            <br>
            <strong>Beds, Baths: </strong>
            <?php
            echo htmlentities($row["bedrooms"] . "bd |  " . $row["bathrooms"] . "ba")
            ?>
            <br>
            <strong>Address: </strong>
            <?php
            echo htmlentities(($row["address"]));
            ?>
            <br>
            <strong>Time: </strong>
            <?php
            echo htmlentities($row["time"] . " " . $row["year"]);
            ?>
            <br>
            <strong>Current Renter: </strong>
            <?php
            echo htmlentities(($row["first_name"] . " " . $row["last_name"]))
            ?>
            <br>
            <strong>Description: </strong>
            <?php
            echo htmlentities(($row["description"]))
            ?>
            <br>
            <?php
            echo "<strong>Zillow Link: </strong><a href='" . htmlentities($row["zillow_link"]) . "'>" . htmlentities($row["zillow_link"]) . "</a>";
            ?>
            <br>
            <form action='messageDatabase.php' method='POST' class="message_form">
                <textarea name='message' placeholder='Type your message here'> </textarea>
                <br>
                <input type='submit' value='Send Message' class='loginBtn'/>
                <input type='hidden' name='sender_id' value="<?php echo $_SESSION['user_id']; ?>" />
                <input type='hidden' name='reciever_id' value="<?php echo $row['user_id']; ?>" />
                <input type="hidden" name="token" value="<?php echo $_SESSION['token'];?>" />
            </form>

            <br>
            <br>
            <br>
            <br>
            <br>
        <?php

        }
        echo "</div>";
        if (isset($_SESSION['user_id'])) {

            echo "<form action='uploadListing.php'>
                 <input type='submit' value='Upload New Listing' id='uploadButton' class='loginBtn' />
      </form>";
        }
        ?>
        </div>
        </body>
        </html>