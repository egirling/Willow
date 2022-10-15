<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Upload Profile</title>
</head>
<body>
    <?php
    //this file is the form that allows users to enter in the story they want to upload
        session_start();
    ?>
    <form action="profileDatabase.php" method="POST">
        <label for="avatar">Avatar:</label>
        <select name = "avatar">
            <option value = "bear">Bear</option>
            <option value = "frog">Frog</option>
            <option value = "axolotl">Axolotl</option>
            <option value = "platypus">Platypus</option>
            <option value = "dolphin">Dolphin</option>
        </select>

        <label for="first_name">First Name:</label>
        <input type="text" name="first_name" id="first_name" />
      
        <label for="last_name">Last Name:</label>
        <input type="text" name="last_name" id="last_name" />

        <!--DROPDOWN-->
        <label for="class">Class:</label>
        <select name = "class">
            <option value = "Freshman">Freshman</option>
            <option value = "Sophomore">Sophomore</option>
            <option value = "Junior">Junior</option>
            <option value = "Senior">Senior</option>
            <option value = "Grad">Grad</option>
        </select>


        <label for="bio">Bio:</label>
        <input type="text" name="bio" placeholder = "Tell us about yourself!" id="bio"/>

        <input type="hidden" name="token" value="<?php echo $_SESSION['token'];?>" />
       
        <input type="submit" value="Upload Profile" />
        
    </form>
  
   
</body>
</html>