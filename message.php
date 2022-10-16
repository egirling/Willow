<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="icon" href="icon_willow.png">
    <title>Message</title>
</head>

<body class="people_body">
<form action = "home.php" class = "icon">
      <input type = "image" src = "willow.png" alt = "icon" class="willow_img">
    </form>
    <div class='messages'>
        <?php
        session_start();
        require 'database.php';
        echo "<h2 id='your_messages'>YOUR MESSAGES:</h2>";
        echo "<br>";
        $stmt = $mysqli->prepare("select message, message_id from messages where reciever_id = ?");

        if (!$stmt) {
            printf("Query Prep Failed: %s\n", $mysqli->error);
            exit;
        }
        $stmt->bind_param('i', $_SESSION["user_id"]);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();

        echo "<br>";
        // echo "<div class='profiles'>";
        while ($row = $result->fetch_assoc()) {
            $stmt2 = $mysqli->prepare("select sender_id from messages where message_id = ?");
            $stmt2->bind_param('i', $row["message_id"]);
            $stmt2->execute();
            $stmt2->bind_result($sender_id);
            $stmt2->fetch();
            $stmt2->close();

            $stmt3 = $mysqli->prepare("select first_name, last_name from profiles where id=?");
            $stmt3->bind_param('i', $sender_id);
            $stmt3->execute();
            $stmt3->bind_result($first, $last);
            $stmt3->fetch();
            $stmt3->close();

            echo "From: " . $first . " " . $last;
            echo "<br>";
            echo $row["message"];
            echo "<br>";
            echo "<br>";
        ?>
            <form action='messageDatabase.php' method='POST' class='message_form'>
                <textarea name='message' placeholder='Type your message here'> </textarea>
                <br>
                <input type='submit' value='Reply' />
                <input type='hidden' name='sender_id' value="<?php echo  $_SESSION['user_id']; ?>" />
                <input type='hidden' name='reciever_id' value="<?php echo $sender_id; ?>" />
                <input type="hidden" name="token" value="<?php echo $_SESSION['token']; ?>" />
            </form>


        <?php
            echo "<br>";
            echo "<br>";
            echo "_________________________________________";
            echo "<br>";
            echo "<br>";
        }

        ?>
    </div>

</body>

</html>