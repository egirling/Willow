<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <!--<link rel="stylesheet" type="text/css" href="styleModule3NewsPage.css">-->
    <title>News Site Start Page</title>
</head>


<body>
    <?php
    session_start();
    $path = "/home/egirling/hackImages";
    $_SESSION["path"] = $path;
    if (isset($_SESSION['user_id'])) {
        //user can log out 
        echo "
         <form action='logout.php'>
         <input type='submit' value='Log Out' id='logOutButton' />
         </form>";

        //friends tab shows up
        echo "<form action='people.php'>
                 <input type='submit' value='People' id='peopleButton' />
                 </form>";
        // echo "<form action='uploadProfile.php'>
        //          <input type='submit' value='Upload Profile' id='uploadButton' />
        //          </form>";
        echo "<form action='listings.php'>
        <input type='submit' value='Listings' id='uploadButton' />
        </form>";
        
        echo "
         <form action='message.php'>
         <input type='submit' value='Read Messages' id='messageButton' />
         </form>";
    }
    ?>
</body>
<html>