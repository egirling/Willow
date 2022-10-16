<?php
session_start();
require 'database.php';
echo "YOUR MESSAGES:";
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

        while ($row = $result->fetch_assoc()) {
            $stmt2 = $mysqli->prepare("select sender_id from messages where message_id = ?");
            $stmt2->bind_param('i', $row["message_id"]);
            $stmt2->execute();
            $stmt2->bind_result($sender_id);
            $stmt2->fetch();
            $stmt2->close();

            // echo "Sender ID: ";
            // echo $sender_id;
            // echo "<br>";
            // echo "<br>";

            $stmt3 = $mysqli->prepare("select first_name, last_name from profiles where id=?");
            $stmt3->bind_param('i', $sender_id);
            $stmt3->execute();
            $stmt3->bind_result($first, $last);
            $stmt3->fetch();
            $stmt3->close();

            // echo "First and Last: ";
            // echo $first . " " . $last;
            // echo "<br>";

            echo "From: ".$first." ".$last;
            echo "<br>";
            echo $row["message"];
            ?>
            <form action='messageDatabase.php' method='POST'>
                <textarea name='message' placeholder='Type your message here'> </textarea>
                <br>
                <input type='submit' value='Reply' />
                <input type='hidden' name='sender_id' value="<?php echo  $_SESSION['user_id']; ?>" />
                <input type='hidden' name='reciever_id' value="<?php echo $sender_id; ?>" />
                <input type="hidden" name="token" value="<?php echo $_SESSION['token'];?>" />
            </form>

            <?php
            echo "<br>";
            echo "<br>";
            echo "<hr>";
        }

?>