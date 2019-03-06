<?php
         $dbhost = 'localhost:3306';
         $dbuser = 'csci459';
         $dbpass = 'csci459';
         $dbname = 'tech_support';
         $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
         
         if(! $conn ) {
            die('Could not connect: ' . mysqli_error($conn));
         }
         echo 'Connected successfully';
?>
