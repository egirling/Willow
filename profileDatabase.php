<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Profile Database</title>
</head>

<body>
    <?php

    //this page is used to upload a story to the data base 
    session_start();
    require 'database.php';

    $user_id = $_SESSION["user_id"];
    //$imagePic = $_POST["image"];
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $class = $_POST["class"];

    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if ($check !== false) {
        $image = $_FILES['image']['tmp_name'];
        $imgContent = addslashes(file_get_contents($image));
    }
    //  $title = $_POST["title"];
    //  $story = $_POST["body"];
    //  $link = $_POST["link"];
    //  $likes = 0;

    //csrf check, used 330 wiki for this
    if (!hash_equals($_SESSION['token'], $_POST['token'])) {
        die("Request forgery detected");
    }

    //STACKOVERFLOW
    // if (isset($_POST["image"])) {
    // $check = getimagesize($_FILES["image"]["tmp_name"]);
    // if ($check !== false) {
    //     $image = $_FILES['image']['tmp_name'];
    //     $imgContent = addslashes(file_get_contents($image));

    /*
           * Insert image data into database
           */

    //DB details
    // $dbHost     = 'localhost';
    // $dbUsername = 'hack';
    // $dbPassword = '*****';
    // $dbName     = 'codexworld';

    //Create connection and select DB
    // $db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
    // Check connection
    // if ($db->connect_error) {
    //     die("Connection failed: " . $db->connect_error);
    // }

    // $dataTime = date("Y-m-d H:i:s");

    //Insert image content into database
    //     $insert = $db->query("INSERT into profiles (image, created) VALUES ('$imgContent', '$dataTime')");
    //     if ($insert) {
    //         echo "File uploaded successfully.";
    //     } else {
    //         echo "File upload failed, please try again.";
    //     }
    // } else {
    //     echo "Please select an image file to upload.";
    // }
    //}
    // $target_path = $_SESSION["path"] . "/";
    // $target_path = $target_path . basename($_FILES['fileUpload']['name']);

    // if (move_uploaded_file($_FILES['fileUpload']['tmp_name'], $target_path)) { //puts uploaded file in the correct directory
    //     echo htmlentities("The file has been uploaded");
    // } else {
    //     echo htmlentities("There was an error uploading the file, please try again!");
    // }

    //inserting into the story data base, used 330 wiki
    $stmt = $mysqli->prepare("insert into profiles (id, first_name, last_name, class, image) values (?, ?, ?, ?, ?)");
    if (!$stmt) {
        printf("Query Prep Failed: %s\n", $mysqli->error);
        exit;
    }

    $stmt->bind_param('isssi', $user_id, $first_name, $last_name, $class, $image);

    $stmt->execute();

    $stmt->close();



    //grabbing profile_id
    $stmt3 = $mysqli->prepare("SELECT profile_id FROM profiles WHERE first_name=? AND last_name=?");

    // Bind the parameter
    $stmt3->bind_param('ss', $profilefirst, $$profilelast);
    $profilefirst = $first_name;
    $profilelast = $last_name;
    $stmt3->execute();



    // Bind the results
    $stmt3->bind_result($profile_id);
    $stmt3->fetch();
    $stmt3->close();
    $_SESSION["profile_id"] = $profile_id;
    ?>
    <!-- <form action="people.php" method="POST">
        <input type="hidden" name="profile_id" value="<?php echo $profile_id; ?>" />
    </form> -->
    <?php

    //return to main page
    Header("Location: home.php");


    ?>


</body>

</html>