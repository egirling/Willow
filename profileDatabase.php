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
    $image_num = $_POST["avatar"];
    $bio = $_POST["bio"];
    $university = $_POST["university"];
    $_SESSION["uni"] = $university;
   
  

    //csrf check, used 330 wiki for this
    if (!hash_equals($_SESSION['token'], $_POST['token'])) {
        die("Request forgery detected");
    }

    
    //inserting into the story data base, used 330 wiki
    $stmt = $mysqli->prepare("insert into profiles (id, first_name, last_name, class, image_id, bio, university) values (?, ?, ?, ?, ?, ?, ?)");
    if (!$stmt) {
        printf("Query Prep Failed: %s\n", $mysqli->error);
        exit;
    }

    $stmt->bind_param('issssss', $user_id, $first_name, $last_name, $class, $image_num, $bio, $university);

    $stmt->execute();

    $stmt->close();


    //return to main page
    Header("Location: home.php");


    ?>


</body>

</html>