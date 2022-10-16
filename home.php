<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="icon" href="icon_willow.png">
    <title>Willow NYPB</title>
</head>


<body>
    <form action = "home.php" class = "icon">
      <input type = "image" src = "willow.png" alt = "icon">
    </form>
<div class="boxHome">

    <?php
    session_start();
    if (isset($_SESSION['user_id'])) {
        //user can log out 
        echo "
         <form action='logout.php' class = 'login_form'>
         <input type='submit' value='Log Out' id='logOutButton' class='loginBtn'/>
         </form>";

        //friends tab shows up
        echo "<form action='people.php' class = 'login_form'>
                 <input type='submit' value='People' id='peopleButton' class='loginBtn'/>
                 </form>";
        // echo "<form action='uploadProfile.php'>
        //          <input type='submit' value='Upload Profile' id='uploadButton' />
        //          </form>";
        echo "<form action='listings.php' class = 'login_form'>
        <input type='submit' value='Listings' id='uploadButton' class='loginBtn'/>
        </form>";
        
        echo "
         <form action='message.php' class = 'login_form'>
         <input type='submit' value='Read Messages' id='messageButton' class='loginBtn'/>
         </form>";
    }
    ?>
    </div>
</body>
<html>