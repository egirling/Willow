<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="icon" href="icon_willow.png">
    <title>Upload Listing</title>
</head>
<body>
<form action = "home.php" class = "icon">
      <input type = "image" src = "willow.png" alt = "icon">
    </form>
<?php
session_start()
?>

<div class="profiles">
<form action="listingsDatabase.php" method="POST" class="upload_profile">
        <label for="time">Subletting Season:</label>
        <select name = "time">
            <option value = "Summer">Summer</option>
            <option value = "Spring">Spring</option>
            <option value = "Fall">Fall</option>
            <option value = "Full Year">Full Year</option>
        </select>
<br>
        <label for="price">Price:</label>
        <input type="text" name="price" id="price" />
        <br>
        <label for="year">Year:</label>
        <input type="text" name="year" id="year" />
        <br>
        <label for="bedrooms">Number of bedrooms:</label>
        <input type="text" name="bedrooms" id="bedrooms"/>
        <br>
        <label for="bathrooms">Number of bathrooms:</label>
        <input type="text" name="bathrooms" id="bathrooms"/>
        <br>
        <label for="description">Description:</label>
        <input type="text" name="description" id="description"/>
        <br>
        <label for="zillow_link">Link to zillow listing</label>
        <input type="text" name="zillow_link" id="zillow_link"/>
        <br>
        <label for="address">Address</label>
        <input type="text" name="address" id="address"/>
        <br>
        <input type="hidden" name="token" value="<?php echo $_SESSION['token'];?>" />
       <br>
        <input type="submit" value="Upload Listing" class="button-33" />
</form>
</div>
</body>
</html>
        