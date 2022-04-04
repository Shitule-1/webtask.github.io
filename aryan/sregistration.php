<!DOCTYPE html>
<html>
<head>
    
    <title>Registration</title>
    
</head>
<body>
<?php
    require('sdb.php');
    
    if (isset($_REQUEST['username'])) {
    
        $username = stripslashes($_REQUEST['username']);
    
        $username = mysqli_real_escape_string($con, $username);
        $email    = stripslashes($_REQUEST['email']);
        $email    = mysqli_real_escape_string($con, $email);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        $create_datetime = date("Y-m-d H:i:s");
        $query    = "INSERT into `susers` (username, password, email, create_datetime)
                     VALUES ('$username', '$password', '$email', '$create_datetime')";
        $result   = mysqli_query($con, $query);
        if ($result) {
            echo "
                  <h3>You are registered successfully.</h3><br/>
                  <p class='link'>Click here to <a href='slogin.php'>Login</a></p>
                 ";
        } else {
            echo "
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Click here to <a href='sregistration.php'>registration</a> again.</p>
                  ";
        }
    } else {
?>
    <form  align="center" class="form" action="" method="post">
        <h1>Registration for Student</h1>
        <br><br>Enter username<input type="text" class="login-input" name="username" placeholder="Username" required />
        <br><br> Enter your email address <input type="text" class="login-input" name="email" placeholder="Email Adress">
        <br><br>Enter password <input type="password" class="login-input" name="password" placeholder="Password">
        <br><br>  <input type="submit" name="submit" value="Register" class="login-button">
        <br><br> already registered? <a href="slogin.php">Click to Login</a>
        <br><br>   go to main page of this site <a href="start.html"> main page</a>
    </form>
<?php
    }
?>
</body>
</html>