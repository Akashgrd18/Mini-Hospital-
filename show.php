<?php
include 'connection.php';
session_start();
$_SESSION['role'] = $_SESSION['role'] ? $_SESSION['role'] : '';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show</title>
    <link rel="stylesheet" href="show.css">
</head>

<body>
    <div class="main">
        <div class="navbar">
            <div class="menu">
                <a href="home.php">Home</a>

                <!-- customised navbar according to role -->
                <?php if ($_SESSION['role'] == "recepitionist") { ?>
                    <a href="registration.php">New Entry</a>
                <?php } ?>

                <!-- customised navbar according to role -->
                <?php if ($_SESSION['role'] == "doctor" ||  $_SESSION['role'] == "representative") { ?>
                    <a href="downloadpris.php">Download</a>
                <?php } ?>

                <a href="#">Contacts</a>
                <a href="logout.php">Logout</a>
            </div>
        </div>
        <h2>Patient Details</h2>
        <div class="content">
        <table border="3">
            <tr>
                <th>Name</th>
                <th>Age</th>
                <th>Gender</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Doctors's Precription</th>
                <th colspan="3">Action</th>
            </tr>

            <?php
            if ($_SESSION['role'] == "doctor" ||  $_SESSION['role'] == "recepitionist")
            {
            unlink("patientsFiles/patients.txt"); 
            }

            $sql = "SELECT * FROM patient";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
            ?>
                <tr>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['age']; ?></td>
                    <td><?php echo $row['gender']; ?></td>
                    <td><?php echo $row['phone']; ?></td>
                    <td><?php echo $row['address']; ?></td>
                    <td><?php echo $row['pris']; ?></td>

                    <?php

                    // Edit and Delete button only for recepitionist
                    if ($_SESSION['role'] == "recepitionist") {

                    ?>
                        <form action="storeInfo.php" method="post">
                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>"></input>
                            <td><input type="submit" name="submit" value="Edit"></input></td>
                        </form>

                        <form action="delete.php" method="post">
                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                            <td><input type="submit" name="delete" value="Delete"></td>
                        </form>

                        
                        <?php         // Deleting the existing file.
                            
                            // Inserting data in files
                            $file = fopen("patientsFiles/patients.txt", "a");

                            fwrite($file, "Name: ");
                            fwrite($file, $row['name'] . "\n");
                            echo "<br>";

                            fwrite($file, "Age: ");
                            fwrite($file, $row['age'] . "\n");
                            echo "<br>";

                            fwrite($file, "Gender: ");
                            fwrite($file, $row['gender'] . "\n");
                            echo "<br>";

                            fwrite($file, "Phone: ");
                            fwrite($file, $row['phone'] . "\n");
                            echo "<br>";

                            fwrite($file, "Address: ");
                            fwrite($file, $row['address'] . "\n");
                            echo "<br>";

                            fwrite($file, "Prescription: ");
                            fwrite($file, $row['pris'] . "\n\n");
                            echo "<br>";

                            fclose($file);
                            ?>



                    <?php
                    }
                    // Edit Prescription and Download button only for doctor
                    if ($_SESSION['role'] == "doctor") {
                    ?>
                        <form action="storeInfo.php" method="post">
                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                            <td><input type="submit" name="submit" value="Edit"></td>
                        </form>
                        <form action="download1data.php" method="post">
                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>"></input>
                            <td><input type="submit" name="submit" value="Download"></input></td>
                        </form>
                   
                      <?php
                        
                        // Inserting data in files after editing priscription
                        $file = fopen("patientsFiles/patients.txt", "a");

                         fwrite($file, "Name: ");
                         fwrite($file, $row['name'] . "\n");
                         echo "<br>";

                         fwrite($file, "Age: ");
                         fwrite($file, $row['age'] . "\n");
                         echo "<br>";

                         fwrite($file, "Gender: ");
                         fwrite($file, $row['gender'] . "\n");
                         echo "<br>";

                         fwrite($file, "Phone: ");
                         fwrite($file, $row['phone'] . "\n");
                         echo "<br>";

                         fwrite($file, "Address: ");
                         fwrite($file, $row['address'] . "\n");
                         echo "<br>";

                         fwrite($file, "Prescription: ");
                         fwrite($file, $row['pris'] . "\n\n");
                         echo "<br>";

                         fclose($file);
                         ?>
                    <?php

                    }
                    ?>
                         <!-- Filter and Download button only for Medical Representative -->
                    <?php
                    if ($_SESSION['role'] ==  "representative") {
                    ?>
                        <form action="storeInfo.php" method="post">
                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                            <td><input type="submit" name="submit" value="Filter"></td>
                        </form>


                        <form action="download1data.php" method="post">
                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>"></input>
                            <td><input type="submit" name="submit" value="Download"></input></td>
                        </form>
                    <?php
                    }
                    ?>
                </tr>
            <?php
            }
            ?>

        </table>
        </div>
    </div>

</body>

</html>