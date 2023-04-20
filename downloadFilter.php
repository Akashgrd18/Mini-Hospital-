<?php
include 'connection.php';
session_start();

    $name = $_SESSION['name'];

    $sql = "SELECT * from patient WHERE name='$name'";

    $result = mysqli_query($conn, $sql);

        while($row = mysqli_fetch_assoc($result)) 
    {
            $file=fopen("downloadFilter.txt","a");

            fwrite($file,"Name :");
            fwrite($file,$row['name']."\n");
          

            fwrite($file,"Age :");
            fwrite($file,$row['age']."\n");

            fwrite($file,"Phone :");
            fwrite($file,$row['phone']."\n");
            

            fwrite($file,"Priscription :");
            fwrite($file,$row['pris']."\n\n");
            

            fclose($file);

    }
    

        header('Content-Type: application/doc');

        header('Content-Disposition: attachment; filename="downloadFilter.txt"');

        readfile('downloadFilter.txt');
        unlink("downloadFilter.txt");

        
    
?>
