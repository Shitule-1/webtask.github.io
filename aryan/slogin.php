<!DOCTYPE html>
<html>
<head>
    
    <title>Login</title>
    
</head>
<body>
<?php
    require('sdb.php');
    session_start();
    
    if (isset($_POST['username'])) {
        $username = stripslashes($_REQUEST['username']);  
        $username = mysqli_real_escape_string($con, $username);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        
        $query    = "SELECT * FROM `susers` WHERE username='$username'
                     AND password='$password'";
        $result = mysqli_query($con, $query) or die("mysqli error");
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            $_SESSION['username'] = $username; //first username is on login form entered and second $username is from db
            
            header("Location: sdashboard.php");
        } else {
            echo "
                  <h3>Incorrect Username/password.</h3><br/>
                  <p class='link'>Click here to <a href='slogin.php'>Login</a> again.</p>
                  ";
        }
    } else {
?>
    <form align=
    
"center" class="form" method="post" action="" name="login">
        <h1>Login for Students</h1>
        <br><br>Enter username <input type="text" class="login-input" name="username" placeholder="Username" autofocus="true" required/>
       <br><br> Enter password<input type="password" class="login-input" name="password" placeholder="Password" required/>
       <br> <br><input type="submit" value="Login" name="submit" class="login-button"/>
       <br><br>New user? <a href="sregistration.php">New Registration</a>
     <br><br>   go to main page of this site <a href="start.html"> main page</a>
  </form>
<?php
    }
?>
</body>
</html>