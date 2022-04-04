
<!DOCTYPE html>
<html>
<head>

<title></title>



</head>
<body>





<h2 >Users List</h2>

<?php
// below code for displaydata in dashboard
include_once 'db.php';
$result = mysqli_query($con,"SELECT * FROM users");
?>
<?php
if (mysqli_num_rows($result) > 0) {
?>
<table>
<tr>
<td>username </td>
<td>Email</td>
<td>password</td>
</tr>
<?php
$i=0;
while($row = mysqli_fetch_array($result)) {
?>
<tr>
<td><?php echo $row["username"]; ?></td>
<td><?php echo $row["email"]; ?></td>
<td><?php echo $row["password"]; ?></td>
</tr></table>
<?php
$i++;
}
?>

<?php
}
else{
echo "No result found";
}
?>

</body>
</html>
