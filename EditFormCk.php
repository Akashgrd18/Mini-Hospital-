<?php
session_start();
include 'connection.php';

if (isset($_POST['submit'])) {
    $id = $_SESSION['id'];
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $age = $_POST['age'];
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);


    $_SESSION['name'] = $name;
    $_SESSION['age'] = $age;
    $_SESSION['gender'] = $gender;
    $_SESSION['phone'] = $phone;
    $_SESSION['address'] = $address;

    $err = false;

    // PHP validation
    if (empty($name)) {
        $_SESSION['nameErr'] = "First name is required.";
        $err = true;
    } else if (preg_match("/^([a-zA-Z' ]+)$/", $name) == false) {
        $_SESSION['nameErr'] = "Please enter valid first name.";
        $err = true;
    }
    else{
        $_SESSION['nameErr'] = "";
    }
    if (empty($age)) {
        $_SESSION['ageErr'] = "Age is required.";
        $err = true;
    }
    else{
        $_SESSION['ageErr'] = "";
    }

    if (empty($gender)) {
        $_SESSION['genderErr'] = "Gender is required.";
        $err = true;
    }
    else{
        $_SESSION['genderErr'] = "";
    }


    if (empty($phone)) {
        $_SESSION['phoneErr'] = "Phone is required.";
        $err = true;
    }
    else{
        $_SESSION['phoneErr'] = "";
    }

    if (empty($address)) {
        $_SESSION['addressErr'] = "Address is required.";
        $err = true;
    } else if (preg_match("/^([a-zA-Z' ]+)$/", $address) == false) {
        $_SESSION['addressErr'] = "Please enter valid address.";
        $err = true;
    }
    else{
        $_SESSION['addressErr'] = "";
    }

    if ($err) {
        header('Location:editform.php');
    } else {
        $sql = "UPDATE patient SET name='$name' , age='$age' , gender='$gender', phone='$phone', address='$address' WHERE id='$id'";

        if (mysqli_query($conn, $sql)) {

            include 'includes/uploadPath.php';

            echo '<script>';
            echo 'alert("Updated successfully");';
            echo 'window.location.href="show.php"';
            echo '</script>';
        }
    }
}


?>