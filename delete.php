<?php 
include 'connection.php';

if(isset($_POST['delete']))
{
    $id = $_POST['id'];
    $sql = "DELETE FROM patient WHERE id='$id'";      //Delete the particular table 

    $temp = "patientsFiles/patient_".$id.".txt";
    unlink($temp);

    if(mysqli_query($conn, $sql))
    {
        echo '<script>';
        echo 'alert("Deleted successfully");';
        echo 'window.location.href="show.php"';
        echo '</script>';
    }
    else{
        echo " Connection fail";
    }
}

?>