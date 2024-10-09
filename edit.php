<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>change profile</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="nav">
        <div class="logo">
            <p> <a href="home.php"> Logo</a></p>
        </div>
        <div class="rightlinks">
            <a href="#">change profile</a>
            <a href="logout.php">
                <button class="btn">logout</button>
            </a>
        </div>
    </div>

    <div class="container">
        
        <div class="box formbox ">
            <header>Change profile</header>
            <form action="" method="post">
                <div class="field input ">
                    <label for="username">username</label>
                    <input type="text" name="username" placeholder="enter your username" id="username"autocomplete="off" required>
                </div>
                
                <div class="field input ">
                    <label for="username">email</label>
                    <input type="text" name="email" placeholder="enter your email" id="email" autocomplete="off" required>
                </div>
                <div class="field input ">
                    <label for="age">Age</label>
                    <input type="number" name="age" placeholder="enter your age" id="age"autocomplete="off" required>
                </div>
                
                <div class="btn">
                <button type="submit" name="submit">update</button>
                </div>
          
            </form>
        </div>
    </div>
</body>
</html>