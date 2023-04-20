<?php
session_start();
include 'connection.php';

$_SESSION['name'] = isset($_SESSION['name']) ? $_SESSION['name'] : '';
$_SESSION['age'] = isset($_SESSION['age']) ? $_SESSION['age'] : '';
$_SESSION['pris'] = isset($_SESSION['pris']) ? $_SESSION['pris'] : '';


if (isset($_POST['submit'])) {
    $id = $_SESSION['id'];
    $name = $_POST['name'];
    $age = $_POST['age'];
    $pris = $_POST['pris'];

    $sql = "UPDATE patient SET pris='$pris' WHERE id='$id'";    //Adding and Editing the precription by Doctor.
    
    if (mysqli_query($conn, $sql)) {

        include 'includes/uploadPath.php';

        echo '<script>';
        echo 'alert("Prescription updated successfully");';
        echo 'window.location.href="show.php"';
        echo '</script>';
    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
    <link rel="stylesheet" href="edit.css">
</head>

<body>
    <div class="main">
        <div class="navbar">
            <div class="menu">
                <a href="home.php">Home</a>
                <a href="show.php">Back</a>
                <a href="#">Contacts</a>
                <a href="logout.php">Logout</a>
            </div>
        </div>
        <h1>Please Write The Priscription Only</h1>
        <div class="content" >
            <form class="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                <label for="name">Name</label><br>
                <input type="text" name="name" id="name" value="<?php echo $_SESSION['name']; ?>"><br><br>

                <label for="age">Age</label><br>
                <input type="text" name="age" id="age" value="<?php echo $_SESSION['age']; ?>"><br><br>

                <label for="pris">Prescription</label><br>
                <input type="text" name="pris" id="pris" value="<?php echo $_SESSION['pris']; ?>"><br><br>

                <input type="submit" name="submit" id="submit">

            </form>
        </div>
    </div>
</body>

</html>