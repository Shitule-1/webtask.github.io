<?php

include 'filelogic.php';
?>
<!DOCTYPE html>
<html>
<head>
<title>
</title>
</head>
<body>
<?php //display?>
<table>
    <thead>
        <th> id</th>
        <th>name</th>
        <th>size</th>
        <th>downloads</th>
    <th>action</th>
    </thead>
    <tbody>
       <?php 
        foreach($files as $file) :
        ?><tr>
            <td><?php echo $file ['id'];?></td>
            
            <td><?php echo $file ['name'];?></td>
            
            <td><?php echo $file ['size'];?></td>
            
            <td><?php echo $file ['downloads'];?></td>
           <td> <a href="index.php?file_id=<?php echo $file['id']?>"> download</a>
           </td>
        </tr> 
        <?php
        endforeach;
        ?>
    </tbody>
</table>
</body>
</body>
</html>