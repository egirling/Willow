<?php
 session_start();
 $user_id = $_SESSION["user_id"];
 require 'database.php';


 $stmt = $mysqli->prepare("SELECT first_name, last_name, class, image_id, bio FROM profiles");


 $stmt->execute();
 $result = $stmt->get_result();
 $stmt->close();

 //prints out the title, body, link, and likes of the story 
while($row = $result->fetch_assoc()){
    if($row["image_id"]== "bear"){
        echo("<img src = 'bear.png' alt = 'bear'>");
    }
    if($row["image_id"]== "axolotl"){
        echo("<img src = 'axolotl.png' alt = 'axolotl'>");
    }
    if($row["image_id"]== "frog"){
        echo("<img src = 'frog.png' alt = 'frog'>");
    }
    if($row["image_id"]== "dolphin"){
        echo("<img src = 'dolphin.png' alt = 'dolphin'>");
    }
    if($row["image_id"]== "platypus"){
        echo("<img src = 'platypus.png' alt = 'platypus'>");
    }
    ?>
    <br>
    <?php
    echo htmlentities("Name: ".( $row["first_name"]. " ". $row["last_name"]));
    ?>
    <br>
    <?php
    echo htmlentities("Class: ".$row["class"]);
    ?>
    <br>
    <?php
    if(isset($row["bio"])){
     echo htmlentities("Bio: ".$row["bio"]);
    }
    ?>
    <br>
    <br>
    <br>
    <br>
    <?php

}
?>
