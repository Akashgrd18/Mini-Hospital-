<?php

session_start();

$_SESSION['name'] = isset($_SESSION['name']) ? $_SESSION['name'] : '';
$_SESSION['age'] = isset($_SESSION['age']) ? $_SESSION['age'] : '';
$_SESSION['gender'] = isset($_SESSION['gender']) ? $_SESSION['gender'] : '';
$_SESSION['phone'] = isset($_SESSION['phone']) ? $_SESSION['phone'] : '';
$_SESSION['address'] = isset($_SESSION['address']) ? $_SESSION['address'] : '';


$_SESSION['nameErr'] = isset($_SESSION['nameErr']) ? $_SESSION['nameErr'] : '';
$_SESSION['ageErr'] = isset($_SESSION['ageErr']) ? $_SESSION['ageErr'] : '';
$_SESSION['genderErr'] = isset($_SESSION['genderErr']) ? $_SESSION['genderErr'] : '';
$_SESSION['phoneErr'] = isset($_SESSION['phoneErr']) ? $_SESSION['phoneErr'] : '';
$_SESSION['addressErr'] = isset($_SESSION['addressErr']) ? $_SESSION['addressErr'] : '';


?>
<!DOCTYPE html>
    <html lang="en">
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
                <div class="content">
                    <form class="form" action="EditFormCk.php" method="post">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" value="<?php echo $_SESSION['name']; ?>">
                        <p name="nameErr"><?php echo $_SESSION['nameErr']; ?></p>

                        <label for="age">Age</label><br>
                        <input type="number" name="age" id="age" value="<?php echo $_SESSION['age']; ?>">
                        <p name="ageErr"><?php echo $_SESSION['ageErr']; ?></p>

                        <label for="gender">Gender</label>
                        <input type="text" name="gender" id="gender" value="<?php echo $_SESSION['gender']; ?>">
                        <p name="genderErr"><?php echo $_SESSION['genderErr']; ?></p>

                        <label for="phone">Phone</label>
                        <input type="number" name="phone" id="phone" value="<?php echo $_SESSION['phone']; ?>"><br><br>
                        <p name="phoneErr"><?php echo $_SESSION['phoneErr']; ?></p>

                        <label for="address">Address</label>
                        <input type="text" name="address" id="address" value="<?php echo $_SESSION['address']; ?>"><br><br>
                        <p name="addressErr"><?php echo $_SESSION['addressErr']; ?></p>

                        <input type="submit" name="submit" id="submit">

                    </form>
                </div>
        </div>
    </body>
</html>