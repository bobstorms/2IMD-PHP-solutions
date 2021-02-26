<?php

    session_start();
    
    function canLogin($username, $password) {

        if ($username === "Development4" && $password == "IMD") {
            return true; 
        } else { 
            return false;
        } 
    }

    if (!empty($_POST)) {
        //er is verzonden!
        $username = $_POST['username'];
        $password = $_POST['password']; 

        if (canLogin($username, $password)) {
            //login
            session_start();
            $_SESSION["username"] = $username;
        } else {
            $error = true;
        }
    }

    if (isset($_SESSION["username"])) {
        $loggedin = true;
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Twitch | Login</title>
</head>
<body>

    <?php if ($loggedin): ?>
        <header>
        <nav class="nav">
            <a href="#">Browse</a>
            <a href="#">Get desktop</a>
            <a href="#">Try prime</a>
            <a href="#" class="loggedIn">
                <div class="user--avatar"><img src="images/php.png" alt=""></div>
                <h3 class="user--name"><?php echo $_SESSION['username'] ?></h3>
                <span class="user--status">Watching Goodbytes</span>
            </a>
            <a href="index.php">Log out?</a>
        </nav>    
        </header>
    <?php endif; ?>

    <div id="app">
        <form id="loginForm" action="index.php" method="post">
            <h1>Log in to Twitch</h1>
            <nav class="nav--login">
                <a href="#" id="tabLogin">Log in</a>
                <a href="#" id="tabSignIn">Sign up</a>
            </nav>

            <?php if(isset($error)): ?>
            <div class="alert">That password was incorrect. Please try again</div>
            <?php endif; ?>

        <div class="form form--login">
            <label for="username">Username</label>
            <input type="text" id="username" name="username">
        
            <label for="password">Password</label>
            <input type="password" id="password" name="password">
        </div>
        
        <div class="form form--signup hidden">
            <label for="username2">Username</label>
            <input type="text" id="username2">
        
            <label for="password2">Password</label>
            <input type="password" id="password2">
            
            <label for="email">Email</label>
            <input type="text" id="email">
        </div>
        
        <a href="" class="btn" id="btnSubmit" onclick='document.forms["loginForm"].submit(); return false;'>Log In</a>
        </form>
    </div>
    
    
</body>
</html>