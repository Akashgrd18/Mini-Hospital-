<?php
    // Connecting to database
    
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "hospital";
    
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $database);
    
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
      }
      else
    //    echo "success";
      
?>
 