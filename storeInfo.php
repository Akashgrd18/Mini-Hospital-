<?php 
session_start();
include 'connection.php';
if(isset($_POST['submit']))
{
    $id = $_POST['id'];
    
    $sql = "SELECT * FROM patient WHERE id='$id'";

    $result= mysqli_query($conn, $sql);
    
    if(mysqli_num_rows($result)>0)
    {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['id'] = $row['id'];
        $_SESSION['name'] = $row['name'];
        $_SESSION['age'] = $row['age'];
        $_SESSION['gender'] = $row['gender'];
        $_SESSION['phone'] = $row['phone'];
        $_SESSION['address'] = $row['address'];
        $_SESSION['pris'] = $row['pris'];


        // Fetching detalis and according to the requirement it redirect the page
        if( $_SESSION['role'] == "recepitionist")
        {
            header('Location:editform.php');
        }
        else if($_SESSION['role'] == "doctor")
        {
            header('Location:editpris.php');
        }
        else if($_SESSION['role'] == "representative")
        {
            header('Location:filterByName.php');
        }
    }
    else{
        echo '<script>';
        echo 'alert("Something went Wrong ");';
        echo 'window.location.href="home.php"';
        echo '</script>';
    }
    
}
?>