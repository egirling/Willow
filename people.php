<?php
 session_start();
 $user_id = $_SESSION["user_id"];
 require 'database.php';

 $profile_id = $_SESSION["profile_id"];
     //Get image data from database
    //  $result = $mysqli->query("SELECT image FROM profiles WHERE id = $_SESSION['user_id']");

    //  if($result->num_rows > 0){
    //     $imgData = $result->fetch_assoc();

    //     //Render image
    //     header("Content-type: image/jpg"); 
    //     echo $imgData['image']; 
    // }else{
    //     echo 'Image not found...';
    // }
    
    if (isset($_GET['image_id'])) {
        $sql = "SELECT imageType,imageData FROM tbl_image WHERE imageId=?";
        $statement = $conn->prepare($sql);
        $statement->bind_param("i", $_GET['image_id']);
        $statement->execute() or die("<b>Error:</b> Problem on Retrieving Image BLOB<br/>" . mysqli_connect_error());
        $result = $statement->get_result();
    
        $row = $result->fetch_assoc();
        header("Content-type: " . $row["imageType"]);
        echo $row["imageData"];
    }

    $stmt = $mysqli->prepare("SELECT image FROM profiles WHERE profile_id = ?");
    if (!$stmt) {
        printf("Query Prep Failed: %s\n", $mysqli->error);
        exit;
    }

    $stmt->bind_param('i', $profile_id);

    $stmt->execute();

    $stmt->close();

    if($stmt->num_rows > 0){
        $imgData = $stmt->fetch();

        //Render image
        header("Content-type: image/jpg"); 
        echo $imgData['image']; 
    }else{
        echo 'Image not found...';
    }
?>
