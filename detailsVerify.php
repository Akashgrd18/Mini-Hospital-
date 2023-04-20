<?php 
session_start();
include 'connection.php';
if(isset($_POST['submit']))
{
    $role = $_POST['role'];
    $_SESSION['role'] = $role;
    $email = $_POST['email'];
    $password = $_POST['password'];
    

    //Checking Login for Doctor
    if($role == 'doctor')
    {
            $sql = "SELECT * FROM doctor WHERE email='$email' AND password='$password'";
            $result = mysqli_query($conn, $sql);
    
            if(mysqli_num_rows($result) > 0)
            {
                header('Location:show.php');
            }
            else
            {
                echo '<script>';
                echo 'alert("Wrong Email or Password");';
                echo 'window.location.href="home.php"';
                echo '</script>';
            }
    }
    //Checking Login for recepitionist
    else if($role == 'recepitionist')
    {

        $sql = "SELECT * FROM recepitionist WHERE email='$email' AND password='$password'";
        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) > 0)
        {
            header('Location:show.php');
        }
        else
        {
            echo '<script>';
            echo 'alert("Wrong Email or Password");';
            echo 'window.location.href="home.php"';
            echo '</script>';
        }
    }

    //Checking Login for Mdical Representative
    else if($role == 'representative')
    {

        $sql = "SELECT * FROM representative WHERE email='$email' AND password='$password'";
        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) > 0)
        {
            header('Location:show.php');
        }
        else
        {
            echo '<script>';
            echo 'alert("Wrong Email or Password");';
            echo 'window.location.href="home.php"';
            echo '</script>';
        }
    }
    
    else{
        echo '<script>';
        echo 'alert("Please Select Your role");';
        echo 'window.location.href="home.php"';
        echo '</script>';
    }

}

?>