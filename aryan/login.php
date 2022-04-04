<!DOCTYPE html>
<html>
<head>
    
    <title>Login</title>
    
</head>
<body>
<?php
    require('db.php');
    session_start();
    
    if (isset($_POST['username'])) {
        $username = stripslashes($_REQUEST['username']);  
        $username = mysqli_real_escape_string($con, $username);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        
        $query    = "SELECT * FROM `users` WHERE username='$username'
                     AND password='" . md5($password) . "'";
        $result = mysqli_query($con, $query) or die("mysqli error");
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            $_SESSION['username'] = $username; //first username is on login form entered and second $username is from db
            
            header("Location: dashboard.php");
        } else {
            echo "
                  <h3>Incorrect Username/password.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a> again.</p>
                  ";
        }
    } else {
?>
    <form align="center" class="form" method="post" name="login">
        <h1 >Login For Teacher</h1>
 <br>   <br>Enter username <input type="text"  name="username" placeholder="Username"  required autofocus="true"/ >
     <br>  <br> Enter password    <input type="password"  name="password" required placeholder="Password"/>
     <br>   <br><input type="submit" value="Login" name="submit"/><br><br>
        New User?<a href="registration.php">New Registration</a>
        <br><br>   go to main page of this site <a href="start.html"> main page</a>
 </form>
<?php
    }
?>
</body>
</html>