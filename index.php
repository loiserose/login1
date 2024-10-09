<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="box formbox ">
            <?php
            include("php/config.php");

            if(isset($_POST['submit'])) {

                // Secure input using mysqli_real_escape_string
                $Username = mysqli_real_escape_string($con, $_POST['username']);
                $password = mysqli_real_escape_string($con, $_POST['password']);

                // SQL query to fetch user
                $result = mysqli_query($con, "SELECT * FROM users WHERE username='$Username' AND password='$password'");
                
                // Fetch the result as an associative array
                $row = mysqli_fetch_assoc($result);

                // Check if a valid result is returned
                if(is_array($row) && !empty($row)) {
                    // Set session variables only if the keys exist in the row
                    $_SESSION['username'] = isset($row['username']) ? $row['username'] : null;
                    $_SESSION['Id'] = isset($row['Id']) ? $row['Id'] : null;
                    $_SESSION['valid'] = isset($row['email']) ? $row['email'] : null;
                    $_SESSION['age'] = isset($row['age']) ? $row['age'] : null;

                    // Redirect to home page if the user is valid
                    header("Location: home.php");
                    // exit();
                } else {
                    // Error message for invalid credentials
                    echo "<div class='message'>
                        <p> Hi, wrong username or password! Try again. 🤦‍♀️🤦‍♀️</p>
                        </div> <br>";
                    echo "<a href='index.php'> <button class='btn'> Go back</button></a>";
                }

            } else {
            ?>
            <header>Login</header>
            <form action="index.php" method="post">
                <div class="field input ">
                    <label for="username">Username</label>
                    <input type="text" name="username" placeholder="Enter your username" id="username" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="password">Password</label>
                    <!-- Use type password for security -->
                    <input type="password" name="password" placeholder="Enter your password" id="password" required>
                </div>
                <div class="btn">
                    <button type="submit" name="submit">Login</button>
                </div>
          
                <div class="links">
                    Don't have an account? <a href="register.php">Signup Now</a>
                </div>
            </form>
        </div>
        <?php } ?>
    </div>
</body>
</html>
