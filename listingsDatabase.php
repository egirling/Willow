<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Listings Database</title>
</head>

<body>
    <?php

    //this page is used to upload a story to the data base 
    session_start();
    require 'database.php';

    $user_id = $_SESSION["user_id"];
    $time = $_POST["time"];
    $year = $_POST["year"];
    $description = $_POST["description"];
    $address = $_POST["address"];
    $bedrooms = $_POST["bedrooms"];
    $bathrooms = $_POST["bathrooms"];
    $price = $_POST["price"];
    $link = $_POST["zillow_link"];
    $profile_id = 1;

    echo($user_id);
    echo(" ");
    echo($time);
    echo(" ");
    echo($description);
    echo(" ");
    echo($address);
    echo(" ");
    echo($bedrooms);
    echo(" ");
    echo($bathrooms);
    echo(" ");
    echo($price);
    echo(" ");
    echo($link);

    //csrf check, used 330 wiki for this
    if (!hash_equals($_SESSION['token'], $_POST['token'])) {
        die("Request forgery detected");
    }

    //inserting into the story data base, used 330 wiki
    //$stmt = $mysqli->prepare("insert into listings (user_id, time, price, year, bedrooms, description, address, zillow_link, bathrooms) values (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt = $mysqli->prepare("insert into listings (user_id, time, price, year, bedrooms, description, address, zillow_link, bathrooms) values (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    if (!$stmt) {
        printf("Query Prep Failed: %s\n", $mysqli->error);
        exit;
    }
    $stmt->bind_param('isiiisssi', $user_id, $time, $price, $year, $bedrooms, $description, $address, $link, $bathrooms);
    $stmt->execute();
    $stmt->close();
    //return to main page
    Header("Location: listings.php");


    ?>


</body>

</html>