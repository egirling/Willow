<!-- <!DOCTYPE html>
<html>

<head>
    <title>Login Page</title>
</head>



<body>
    <P>Hello World</P>

<?php
    // session_start();


    // $_SESSION['servername'] = "localhost";
    // $_SESSION['username'] = "newsuser";
    // $_SESSION['password'] = "newspassword";
    // $_SESSION['database'] = "";


    // $connection = new mysqli($_SESSION['servername'], $_SESSION['username'], $_SESSION['password'],  $_SESSION['database']);

    // if ($connection->connect_error) {
    //     die("Connection failed:" . $connection->connect_error);
    // }


   // echo htmlentities("Create a new account by putting in a new username and password."); 
  
?> -->
    <!-- form to create a new user with username and password inputs -->
    <!-- <form method="post" action="createUser.php">
        <input type="text" value="username" name="newuser">
        <input type="text" value="password" name="newpassword">
        <input type="submit" value="Create" name="submit">
    </form>
    <?php
    //echo htmlentities("Click here to log in as a guest with no account.");
    ?> -->
    <!-- form to log in as a guest with no input credentials-->
    <!-- <form method="post" action="guestLogin.php">
        <input type="submit" value="Login as Guest" name="submit">
    </form>



    <?php
    //echo htmlentities("Enter in your username and password to log in.");
    ?> -->
    <!-- form to go to log in page where the user inputs existing username and passwords they already have created-->
    <!-- <form method="post" action="loginPage.php">
        <input type="text" value="user" name="existingUsername">
        <input type="text" value="password" name="existingPassword">
        <input type="submit" value="Go to Login" name="submit">
    </form>


</body>

</html> -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
   <!-- <link rel="stylesheet" type="text/css" href="styleModule3.css">-->
    <title>Hackathon Login</title>
</head>
<body>
<div id="main">
<?php
    session_start();
?>
    <form action="loginDatabase.php" method="POST">
    <p>
		<label for="usernameinput">Username:</label>
		<input type="text" name="username" id="usernameinput" />
        <label for="passwordinput">Password:</label>
		<input type="text" name="password" id="passwordinput" />
	</p>
    <p>
		<input type="submit" value="Log In" />
	</p>
    </form>
   

</div>
</body>
</html>