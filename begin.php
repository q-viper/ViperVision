<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8"> 
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Getting Started</title>
   <link rel="stylesheet" type="text/css" href="assets/plugins/minified/font-awesome.min.css">  
<style>
body{
	background-color:#354;
	color:white;
	text-align:center;
}
.follow{
	text-decoration:none;
	border:2px solid white;
	
}
.follow:hover{
	color:red;
	font-size:24;
}


</style>
</head>
<body>
<?php
session_start();

include_once("constant.php");
include_once("menu.php");
$email=$_GET['email'];
$tname=$_GET['tname'];
$userid=$_GET['uid'];
echo"<h1>Follow some peoples first.<hr>";
$admin=mysqli_query($s,"select * from admin");
$users=mysqli_query($s,"select * from users ORDER BY XP DESC");
$article="Welcome to ViperVision User.";
//$updaten=mysqli_query($s,"insert into notificatios(ById,ToId,Reason,Article,DateTime) values('0','$userid','First','$article',NOW())");
/*if($_GET['begin']=="true")
{
while($row=mysqli_fetch_array($admin))
{
		echo '<img src="data:image/jpeg;base64,'.base64_encode($row['Profilephoto']).'"height="200" width="200" id="container"/>'.'<div id="xp"><h1>'.$row['FullName']." ".$level.'</br>Xp:'.$row['Xp'].'pts</br><a href="followinguser.php?userid='.$userid.'&followedid='.$row['Id'].'&tname='.$tname.'&email='.$email.'&n='.$row['Notifications'].'&femail='.$row['Email'].'&begin=1">Follow</a></h1><hr>';
}*/
while($row=mysqli_fetch_array($users))
{
	if($row['Xp']>0)
	{
		
	echo '<img src="'.$ppdir.$row['Profilephoto'].'"height="200" width="200" id="container"/>'.'<h1>'.$row['FullName']." ".$level.'</br><p class="fa fa-trophy">Xp:'.$row['Xp'].'pts</p></br><a href="signin.php?userid='.$userid.'&followedid='.$row['Id'].'&tname='.$tname.'&email='.$email.'&n='.$row['Notifications'].'&femail='.$row['Email'].'&begin=1&fs='.$row['Followers'].'" class="follow">Follow</a></h1><hr>';
	//$notifications=$row['Notifications']+1;

	}
}
//$follow=mysqli_query($s,"insert into $tname(FollowId,FollowEmail) values('$followid','$followemail')");


?>
</body>
</html>