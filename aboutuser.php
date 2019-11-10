<!DOCTYPE HTML>
	<html lang="en">
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
<link rel="stylesheet" type="text/css" href="css/aboutuser.css">

</head>
<?php
session_start();
if($_SESSION['status']!=1)
	header("location:signin.php");

include_once("constant.php");
include_once("menu.php");
$currentid=$_SESSION['id'];
$select=mysqli_query($s,"select * from users");
echo"<div id='ppg'><a href='myprofile.php' id='goto'>Go to Profile</a></div>";
if($_GET['view']!="negative")
{
while($row=mysqli_fetch_array($select))
{
	if($currentid==$row['Id'])
	{
		echo '<ul><li class="dropdown"><div id="pp"><a href="#"><img src="'.$ppdir.$row['Profilephoto'].'"height="400" width="400" id="img"/></a><div class="dropdown-content"><a href="block.php?id='.$row['Id'].'">Block</a><a href="sendmessage.php?type=neutrino&id='.$row['Id'].'">Message</a></div></li></ul><hr>';
		echo'<table><tr><td>Full Name:</td><td>'.$row['FullName'];
		echo'</td></tr><tr><td> Birth Date:</td><td>'.$row['DOB'];
		echo'</td></tr><tr><td>Followers</td><td>'.$row['Followers'];
		echo'</td></tr><tr><td>Following</td><td>'.$row['Following'];
		echo'</td></tr><tr><td>Email:</td><td>'.$row['Email'];
		echo'</td></tr><tr><td>Level:</td><td>'.$row['Level'];
		echo'</td></tr><tr><td>Xp:</td><td>'.$row['Xp'];
		echo'</td></tr><tr><td>Bio:</td><td>'.$row['Bio'];
		echo'</td></tr><tr><td>Profession:</td><td>'.$row['Profession'];
		echo'</td></tr><tr><td>Qualification:</td><td>'.$row['Qual'];
		echo'</td></tr><tr><td>Address:</td><td>'.$row['Country'].','.$row['City'];
		echo'</td></tr></table></div>';			
		echo'<title>'.$row["FullName"].'</title>';
		
		
		
	}
}
}
if($_GET['view']=="negative")
{
	$uid=$_GET['id'];
	$select=mysqli_query($s,"select * from users");
	while($row=mysqli_fetch_array($select))
{
	if($uid==md5($row['Id']))
	{
		echo '<ul><li class="dropdown"><div id="pp"><a href="#"><img src="'.$ppdir.$row['Profilephoto'].'"height="400" width="400" id="img"/></a>';
	if($uid!=md5($_SESSION['id']))
		echo'<div class="dropdown-content"><a href="block.php?id='.$row['Id'].'">Block</a><a href="sendmessage.php?type=neutrino&id='.$row['Id'].'">Message</a></div></li></ul><hr>';
		echo'<table><tr><td>Full Name:</td><td>'.$row['FullName'];
		echo'</td></tr><tr><td> Birth Date:</td><td>'.$row['DOB'];
		echo'</td></tr><tr><td>Followers</td><td>'.$row['Followers'];
		echo'</td></tr><tr><td>Following</td><td>'.$row['Following'];
		echo'</td></tr><tr><td>Email:</td><td>'.$row['Email'];
		echo'</td></tr><tr><td>Level:</td><td>'.$row['Level'];
		echo'</td></tr><tr><td>Xp:</td><td>'.$row['Xp'];
		echo'</td></tr><tr><td>Bio:</td><td>'.$row['Bio'];
		echo'</td></tr><tr><td>Profession:</td><td>'.$row['Profession'];
		echo'</td></tr><tr><td>Qualification:</td><td>'.$row['Qual'];
		echo'</td></tr><tr><td>Address:</td><td>'.$row['Country'].','.$row['City'];
		echo'</td></tr></table></div>';
		echo'<title>'.$row["FullName"].'</title>';
		
		
		
		
	}
}
	
	
}



?>



