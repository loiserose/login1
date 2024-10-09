<?php
session_start();
include("php/config.php");

// Redirect to login page if the session 'valid' is not set (user not logged in)
if(!isset($_SESSION['valid'])){
    header("Location: index.php");
   
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="nav">
        <div class="logo">
            <p>Logo</p>
        </div>
        <div class="rightlinks">
            <?php 
            // Check if session 'Id' is set
            if (isset($_SESSION['Id'])) {
                $id = $_SESSION['Id']; // Get the ID from the session

                // Query the database using the ID
                $query = mysqli_query($con, "SELECT * FROM users WHERE Id=$id");

                // Fetch the results
                if ($result = mysqli_fetch_assoc($query)) {
                    $res_Uname = $result['username'];
                    $res_Age = $result['Age'];  // Make sure column name matches DB ('age' not 'Age')
                    $res_Email = $result['email'];
                    $res_Id = $result['Id']; // Get the user ID
                } else {
                    echo "User not found.";
                }

                // Display the link to edit the profile
                echo "<a href='edit.php?Id=$res_Id'>Change profile</a>";
            } else {
                echo "Session ID not set.";
            }
            ?>
            <a href="logout.php">
                <button class="btn">Logout</button>
            </a>
        </div>
    </div>
    <main>
        <div class="mainbox top">
            <div class="top">
                <div class="box">
                    <p class="box1">Hello <b><?php echo $res_Uname; ?></b>, welcome!</p>
                </div>
                <br><br>
                <div class="box">
                    <p>Your email is <b><?php echo $res_Email; ?></b>.</p>
                </div>
            </div>
            <div class="bottom">
                <div class="box">
                    <p>And you are <b><?php echo $res_Age; ?></b> years old.</p>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
