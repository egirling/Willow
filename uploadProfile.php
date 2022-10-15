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
    <form action="profileDatabase.php" method="POST" enctype="multipart/form-data">
        <label for="image">Profile Picture:</label>
        <input type="file" name="image" id="image" />

        <label for="first_name">First Name:</label>
        <input type="text" name="first_name" id="first_name" />
      
        <label for="last_name">Last Name:</label>
        <input type="text" name="last_name" id="last_name" />
      
        <!--DROPDOWN-->
        <label for="class">Class:</label>
        <input type="text" name="class" id="class" />

        <input type="hidden" name="token" value="<?php echo $_SESSION['token'];?>" />
       
        <input type="submit" value="Upload Profile" />
        
    </form>
  
   
</body>
</html>