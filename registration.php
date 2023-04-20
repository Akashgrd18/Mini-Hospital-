<?php
include 'connection.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="edit.css">
    <script src="registration.js"></script>
</head>

<body>

    <div class="main">
        <div class="navbar">
            <div class="menu">
                <a href="home.php">Home</a>
                <a href="show.php">Back</a>
                <a href="#">Contact</a>
                <a href="logout.php">Logout</a>

            </div>
        </div>

        <body>
            <form class="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" onsubmit="return validate()">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" placeholder="Enter Your Name">
                <span id="nameErr"></span><br>

                <label for="age">Age</label><br>
                <input type="number" name="age" id="age" placeholder="Enter Your Age"><br>
                <span id="ageErr"></span><br>

                <label for="gender">Gender</label>
                <input type="text" name="gender" id="gender" placeholder="Enter Your Gender">
                <span id="genderErr"></span><br>

                <label for="phone">Phone Number</label>
                <input type="number" name="phone" id="phone" placeholder="Enter Your Phone Number">
                <span id="phoneErr"></span><br>

                <label for="address">Address</label>
                <input type="text" name="address" id="address" placeholder="Enter You Address">
                <span id="addressErr"></span><br>


                <input type="submit" name="submit" id="submit">

            </form>
    </div>
</body>

</html>


<?php
if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $age  = mysqli_real_escape_string($conn, $_POST['age']);
    $gender  = mysqli_real_escape_string($conn, $_POST['gender']);
    $phone  = mysqli_real_escape_string($conn, $_POST['phone']);
    $address  = mysqli_real_escape_string($conn, $_POST['address']);

    //PHP validation
    $err = false;
    if (empty($name)) {
        $err = true;
    } else if (preg_match("/^([a-zA-Z' ]+)$/", $name) == false) {
        $err = true;
    }

    if (empty($age)) {
        $err = true;
    }


    if (empty($gender)) {
        $err = true;
    }

    if (empty($phone)) {
        $err = true;
    }

    if (empty($address)) {
        $err = true;
    }

    if ($err) {

        echo '<script>';
        echo 'alert("Somthing Went Wrong");';
        echo 'window.location.href="registration.php"';
        echo '</script>';
    } 
    else {

        $sql = "INSERT INTO patient (name,age,gender,phone,address) VALUES ('$name','$age','$gender','$phone','$address')";

        extract($_POST);
        $file = fopen("patients.txt", "a");

        fwrite($file, "Name: ");
        fwrite($file, $name . "\n");
        echo "<br>";

        fwrite($file, "Age: ");
        fwrite($file, $age . "\n");
        echo "<br>";

        fwrite($file, "Gender: ");
        fwrite($file, $gender . "\n");
        echo "<br>";

        fwrite($file, "Phone: ");
        fwrite($file, $phone . "\n");
        echo "<br>";

        fwrite($file, "Address: ");
        fwrite($file, $address . "\n");
        echo "<br>";

        fclose($file);

        if (mysqli_query($conn, $sql)) {
            echo '<script>';
            echo 'alert("Inserted Successfully");';
            echo 'window.location.href="show.php"';
            echo '</script>';
        } else {
            echo '<script>';
            echo 'alert("Somthing went wrong!!");';
            echo 'window.location.href="registration.php"';
            echo '</script>';
        }
    }
}


?>