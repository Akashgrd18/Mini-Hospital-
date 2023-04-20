<?php
include 'connection.php';
if(isset($_POST['submit']))
{
    $id = $_POST['id'];

    $sql = "SELECT * from patient WHERE id='$id'";

    $result = mysqli_query($conn, $sql);

        while($row = mysqli_fetch_assoc($result)) 
    {
            $file=fopen("download1data.txt","a");

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
        header('Content-Disposition: attachment; filename="download1data.txt"');
        readfile('download1data.txt');

        unlink("download1data.txt");

        
    }
?>
