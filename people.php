<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="icon" href="icon_willow.png">
    <title>Willow NYPB</title>
</head>

<body class="people_body">
<form action = "home.php" class = "icon">
      <input type = "image" src = "willow.png" alt = "icon" class="willow_img">
    </form>
    <?php
    session_start();
    $user_id = $_SESSION["user_id"];
    require 'database.php';


    $stmt = $mysqli->prepare("SELECT first_name, last_name, class, image_id, bio, university FROM profiles");


    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();
    ?>
<div class="profiles">

    <?php
    //prints out the title, body, link, and likes of the story 
    while ($row = $result->fetch_assoc()) {
        if ($row["image_id"] == "bear") {

            echo ("<div class = 'profile_pic'><img src = 'bear.png' alt = 'bear' class='pic'></div>");
        }
        if ($row["image_id"] == "axolotl") {
            echo ("<div class = 'profile_pic'><img src = 'axolotl.png' alt = 'axolotl' class='pic'></div>");
        }
        if ($row["image_id"] == "frog") {
            echo ("<div class = 'profile_pic'><img src = 'frog.png' alt = 'frog' class='pic'></div>");
        }
        if ($row["image_id"] == "dolphin") {
            echo ("<div class = 'profile_pic_dolphin'><img src = 'dolphin.png' alt = 'dolphin' class='pic'></div>");
        }
        if ($row["image_id"] == "platypus") {
            echo ("<div class = 'profile_pic'><img src = 'platypus.png' alt = 'platypus' class='pic'></div>");
        }
    ?>
    
        <br>
        <h3>
            <?php
            echo htmlentities(($row["first_name"] . " " . $row["last_name"]));
            ?>
        </h3>
        <?php
        echo htmlentities("University: " . $row["university"]);
        ?>
        <br>
        <?php
        echo htmlentities("Class: " . $row["class"]);
        ?>
        <br>
        <?php
        if (isset($row["bio"])) {
            echo htmlentities("Bio: " . $row["bio"]);
        }
        ?>
        <br>
        <br>
        <br>
        <br>
    <?php

    }
    ?>
   
    </div>
</body>

</html>