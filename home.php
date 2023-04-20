<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="home.css">
</head>

<body>
    <div class="main">
        <div class="navbar">
            <div class="menu">
                <a class="active" href="#">Home</a>
                <a href="#">Contacts</a>
                <a href="#">Ask</a>
                <a href="#">About</a>
            </div>
        </div>
        <h1>Welcome To ABC Hospital</h1>
        <div class="content">
    
            <form class="form" action="detailsVerify.php" method="post">
            
                <label for="role">Login as:</label>
                <select id="role" name="role">
                    <option value="">--Select--</option>
                    <option value="doctor">Doctor</option>
                    <option value="recepitionist">Recepitionist</option>
                    <option value="representative">Medical Representative</option>
                </select><br><br>

                <label for="email">Email:</label>
                <input type="email" name="email" placeholder="Enter Your Email"><br><br>

                <label for="password">Password</label>
                <input type="password" name="password" placeholder="Enter Your Password"><br><br>


                <input type="submit" name="submit" id="submit" value="Submit"><br><br>
            </form>
        </div>
    </div>
</body>

</html>