<?php
session_start();
include 'connection.php';


$id = $_SESSION['id'];
$name = $_SESSION['name'];


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filter Show</title>
    <link rel="stylesheet" href="show.css">
</head>

<body>
    <div class="main">
        <div class="navbar">
            <div class="menu">
                <a href="home.php">Home</a>
                <a href="show.php">Back</a>
                <a href="downloadFilter.php">Download at Once</a>
                <a href="logout.php">Logout</a>
            </div>
        </div>
        <h2>Filter By Name</h2>
        <div class="content">
            <table border="3">
                <tr>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Phone</th>
                    <th>Precription</th>
                </tr>

                <?php

                $sql = "SELECT * FROM patient WHERE name = '$name'";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($result)) {

                ?>
                    <tr>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['age']; ?></td>
                        <td><?php echo $row['phone']; ?></td>
                        <td><?php echo $row['pris']; ?></td>
                        <form action="download1data.php" method="post">
                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>"></input>
                            <td><input type="submit" name="submit" value="Download"></input></td>
                        </form>
                    <tr>
                        </td>
                        </form>
                    </tr>

                    </tr>
                <?php
                }
                ?>
            </table>
        </div>
    </div>
</body>

</html>