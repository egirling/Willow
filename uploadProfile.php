<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="icon" href="icon_willow.png">
    <title>Upload Profile</title>
</head>
<body>
<form action = "home.php" class = "icon">
      <input type = "image" src = "willow.png" alt = "icon">
    </form>
    <?php
    //this file is the form that allows users to enter in the story they want to upload
        session_start();
    ?>
    <div class="profiles">
    <form action="profileDatabase.php" method="POST" class="upload_profile">
        <label for="avatar">Avatar:</label>
        <select name = "avatar">
            <option value = "bear">Bear</option>
            <option value = "frog">Frog</option>
            <option value = "axolotl">Axolotl</option>
            <option value = "platypus">Platypus</option>
            <option value = "dolphin">Dolphin</option>
        </select>
<br>
        <label for="first_name">First Name:</label>
        <input type="text" name="first_name" id="first_name" />
      <br>
        <label for="last_name">Last Name:</label>
        <input type="text" name="last_name" id="last_name" />
        <br>
        <!--DROPDOWN-->
        <label for="class">Class:</label>
        <select name = "class">
            <option value = "Freshman">Freshman</option>
            <option value = "Sophomore">Sophomore</option>
            <option value = "Junior">Junior</option>
            <option value = "Senior">Senior</option>
            <option value = "Grad">Grad</option>
        </select>
        <br>

        <label for="bio">Bio:</label>
        <input type="text" name="bio" placeholder = "Tell us about yourself!" id="bio"/>
        <br>
        <label for="university">University:</label>
        <input type="text" name="university" placeholder = "Hamburger Uni" id="university"/>

        <input type="hidden" name="token" value="<?php echo $_SESSION['token'];?>" />
        <br>
       
        <input type="submit" value="Upload Profile" class="button-33" />
        
    </form>
</div>
   
</body>
</html>