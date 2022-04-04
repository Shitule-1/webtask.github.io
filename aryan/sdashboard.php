<?php
include("sauth_session.php");
?>
<!DOCTYPE html>
<html>
<head>
    
    <title>Dashboard - Client area</title>

</head>
<body>
    
        <p>Hey, <?php echo $_SESSION['username']; ?>!</p>
        <p>You are now user dashboard page.</p>
        <p><a href="slogout.php">Logout</a></p>
        <?php include("sindex.php");?>

</body>
</html>