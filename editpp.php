<?php
session_start();
if($_SESSION['status']!=1){
	header("Location: signin.php");
	exit;
}
?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8"> 
	  <meta name="viewport" content="width=device-width, initial-scale=1">
		<title> Edit PP</title>
<?php
include_once("menu.php");
session_start();
include_once("constant.php");
$uid=$_SESSION['id'];
$users=mysqli_query($s,"select * from users");
while($row=mysqli_fetch_array($users))
{
	if($row['Id']==$uid)
	{
echo '</br><ul><li class="dropdown"><img src="'.$ppdir.$row['Profilephoto'].'"height="200" width="200"/><div class="dropdown-content">		<form method="post" action="editpp.php?change=positive&pp='.$row['Profilephoto'].'" enctype="multipart/form-data"><input type="file" name="file" required="required"></br><input type="hidden" name="MAX_FILE_SIZE" value="1024000000"><input type="submit"></div></li></ul>';
	}
}
if($_GET['change']=="positive")
{
	$name=$_FILES['file']['name'];
		$size=$_FILES['file']['size'];
		$type=$_FILES['file']['type'];
		$loc=$_FILES['file']['tmp_name'];
		if($size>$_POST['MAX_FILE_SIZE'])
			echo"File is bigger";
		$extension=substr(basename($name),strpos(basename($name),".")+1);
		$allowedExtension=array("jpg","bmp","gif","png","jpeg");
		if(!in_array($extension,$allowedExtension))
			echo "Not allowed extension used";
		$allowedTypes=array("image/jpeg","image/png");
		if(!in_array($type,$allowedTypes))
			echo "File type not allowed";
		$filedir=$ppdir;
		$name=$uid.time().$name;
		$filepath=$filedir.$name;
if(move_uploaded_file($loc,$filepath))
	{	
if(unlink($filedir.$_GET['pp']))
{
	$t=mysqli_query($s,"update users set Profilephoto='$name' where Id='$uid'");
	header("location:myprofile.php?pp=changed");
}	}
}
?>