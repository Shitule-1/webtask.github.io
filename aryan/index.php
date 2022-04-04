<?php

include 'filelogic.php';
?>
<!DOCTYPE html>
<html>
<head>
<title>

php file upload and download
</title>
</head>
<body>
<form action="index.php" method="POST" enctype="multipart/form-data">

upload file
<input type="file" name="myfile"><br>
<input type="submit" name="save" value="upload"> 
</form>
</body>


</html>