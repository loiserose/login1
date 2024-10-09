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
                if(isset($_POST['submit'])){
                    $username=$_POST['username'];
                    $email=$_POST['email'];
                    $age=$_POST['age'];
                    $password=$_POST['password'];
                    // verifly whelther the email is unique
                    $verifly_query=mysqli_query($con, "SELECT Email from users where Email='$email'");
                    if(mysqli_num_rows($verifly_query)!=0){
                        echo "<div class='message'>
                        <p> this email is used please find another one!</p>
                        </div> <br>";
                        echo "<a href='javascript:self.history.back()'> <button class='btn'> Go back</button></a>";
                        
                    }
                    else{
                        mysqli_query($con, "INSERT INTO users(username,email,age,password) VALUES('$username', '$email','$age','$password')") or
                        die("error occured");
                        echo "<div class='message'>
                        <p> the registration was successs!</p>
                        </div> <br>";
                        echo "<a href='index.php'> <button class='btn'>login now</button></a>";
                    }
                }else{
        ?>
            <header>Signup</header>
            <form action="" method="post">
                <div class="field input ">
                    <label for="username">username</label>
                    <input type="text" name="username" placeholder="enter your username" id="username"autocomplete="off" required>
                </div>
                
                <div class="field input ">
                    <label for="email">email</label>
                    <input type="text" name="email" placeholder="enter your email" id="email" autocomplete="off" required>
                </div>
                <div class="field input ">
                    <label for="age">Age</label>
                    <input type="number" name="age" placeholder="enter your age" id="age"autocomplete="off" required>
                </div>
                
                
                <div class="field input">
                    <label for="password">password</label>
                    <input type="text" name="password" placeholder="enter your password" id="password"  autocomplete="off" required>
                </div>
                <div class="btn">
                <button type="submit" name="submit">register</button>
                </div>
          
          <div class="links">
            alread a member ?<a href="index.php">Signin </a>
          </div>
          
            </form>
        </div>
        <?php } ?>
    </div>
</body>
</html>