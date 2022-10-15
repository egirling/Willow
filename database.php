<?php
 
        // Content of database.php
        //from 330 website

        //this file connects to the data base
        $mysqli = new mysqli('localhost', 'hack', 'megan', 'Hackathon');
        
        if($mysqli->connect_errno) {
            printf("Connection Failed: %s\n", $mysqli->connect_error);
            exit;
        }
?>