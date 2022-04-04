<!DOCTYPE html>
<html>
<head>
    
    <title> Registration for Teacher </title>
    
</head>
<body>
<?php
    require('db.php');
    
    if (isset($_REQUEST['username'])) {
    
        $username = stripslashes($_REQUEST['username']);
    
        $username = mysqli_real_escape_string($con, $username);
        $email    = stripslashes($_REQUEST['email']);
        $email    = mysqli_real_escape_string($con, $email);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        $create_datetime = date("Y-m-d H:i:s");
        $query    = "INSERT into `users` (username, password, email, create_datetime)
                     VALUES ('$username', '" . md5($password) . "', '$email', '$create_datetime')";
        $result   = mysqli_query($con, $query);
        if ($result) {
            echo "
                  <h3>You are registered successfully.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a></p>
                 ";
        } else {
            echo "
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Click here to <a href='registration.php'>registration</a> again.</p>
                  ";
        }
    } else {
?>
    <form align="center" class="form" action="" method="post">
        <h1>Registration for Teachers Only</h1>
        <b>Enter username     </b>  <input type="text"  name="username" placeholder="Username" required />
    <br><br> <b>Enter your email address</b><input type="text"  name="email" placeholder="Email Adress">
        <br><br><b>Enter password</b> <input type="password"  name="password" placeholder="Password">
       <br> <br><input type="submit" name="submit" value="Register" >
     <br> already registered?  <a href="login.php">Click to Login</a>
     <br><br>   go to main page of this site <a href="start.html"> main page</a>

    </form>
<?php
    }
?>
</body>
</html>