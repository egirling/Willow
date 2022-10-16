<?php
//echo "hello world";


 session_start();
 $user_id = $_SESSION["user_id"];
 require 'database.php';



 $stmt2 = $mysqli->prepare("select university from uni");
 $stmt2->execute();
 $stmt2->bind_result($allUnis);

?>
<label for="uni">Choose a University:</label>
<select name="uni">
<?php
while($stmt2->fetch()){
    echo "<option value = '$allUnis'>$allUnis</option>";
}
echo "</select>";

 $stmt2->close();

echo "<br>";
echo "<br>";
echo "<br>";

 $stmt = $mysqli->prepare("select time, price, year, bedrooms, description, address, zillow_link, bathrooms, profiles.first_name, profiles.last_name from listings join profiles on (listings.user_id=profiles.id) ");

if (!$stmt) {
    printf("Query Prep Failed: %s\n", $mysqli->error);
    exit;
}
 $stmt->execute();
 $result = $stmt->get_result();
 $stmt->close();

 


 //prints out the title, body, link, and likes of the story 
while($row = $result->fetch_assoc()){
    echo htmlentities("Price: ".$row["price"]);
    ?>
    <br>
    <?php
    echo htmlentities("Beds, Baths: " . $row["bedrooms"]. "bd |  ". $row["bathrooms"]. "ba")
    
    ?>
    <?php
    echo htmlentities("Address: ".( $row["address"]));
    ?>
    <br>
    <?php
    echo htmlentities("Time: ".$row["time"]. " ". $row["year"]);
    ?>
    <br>
    <?php
    echo htmlentities(("Current Renter: ". $row["first_name"] . " ". $row["last_name"]))
    ?>
    <br>
    <?php
    echo htmlentities(("Description: ". $row["description"]))
    ?>
    <br>
    <?php
    echo "Zillow Link: <a href='".htmlentities($row["zillow_link"])."'>".htmlentities($row["zillow_link"])."</a>";
    ?>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <?php

}





if(isset($_SESSION['user_id'])){

echo "<form action='uploadListing.php'>
                 <input type='submit' value='Upload Listing' id='uploadButton' />
      </form>";
}
?>