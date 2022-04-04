<?php
$conn=mysqli_connect("localhost","om","123","pdf");
//FOR THE DISPLAY
$sql="SELECT * FROM pdf_file";
$result=mysqli_query($conn,$sql);
$files=mysqli_fetch_all($result,MYSQLI_ASSOC);
//..
if(isset($_POST['save'])){
    $filename=$_FILES['myfile']['name'];
    $destination='upload/pdf/'.$filename;
    $extension= pathinfo($filename,PATHINFO_EXTENSION);

   
    $file=$_FILES['myfile']['tmp_name'];
    $size=$_FILES['myfile']['size'];
   if(!in_array($extension,['zip','pdf','png','jpg'])){
       echo"file extension not valide";

   }elseif($_FILES['myfile']['size']>1000000){
       echo"file is largr";

   }
else    {
        if(move_uploaded_file($file,$destination)){
            $sql="INSERT INTO pdf_file ( id,name,size,downloads) VALUES( 0,'$filename','$size',0)";
            if(mysqli_query($conn,$sql)){
                echo"file upload successful";
            }else{
                echo"failed to upload the file";
            }
        
        }
    }
}

if(isset($_GET['file_id']))
{
    $id=$_GET['file_id'];
$sql="SELECT * FROM pdf_file WHERE id=$id";
$result=mysqli_query($conn,$sql);
$file=mysqli_fetch_assoc($result);
$filepath= 'upload/pdf/'.$file['name'];
if(file_exists($filepath))
{
    header('Content-Type: application/octet-stream');
    header('Content-Discription: File Transfer');
    header('Content-Disposition: attachment; filename='. basename($filepath));
    header('Expires: 0');
    header ('Cache-Control:must-revalidate');
    header('Pragma:public');
    header('Content-Length:' . filesize('upload/pdf/'.$file['name']));
    readfile('upload/pdf' . $file['name']);
    $newCount= $file['downloads']+1;
    $updatQuery= "UPDATE pdf_file SET downloads=$newCount WHERE id=$id";
    mysqli_query($conn,$updatQuery);
    exit;


}
}
?>
