<html>
<head><title>Follow More</title>
<link rel="stylesheet" type="text/css" href="css/followmore.css">
</head>
<body>

<?php
session_start();

include_once("menu.php");
include_once("constant.php");
$userid=$_SESSION['id'];
$usertable="userid".$userid;
$followeremail=$_GET['followeremail'];
echo'<a href="myprofile.php" id="gtp">Go to Profile.</a>';
$user=mysqli_query($s,"select * from users ORDER BY Followers DESC");
$follow=mysqli_query($s,"select * from followdetails");
	while($row=mysqli_fetch_array($follow))
	{
		if($row['FollowerId']==$userid)
		{
		$fid[$i]=$row["FollowId"];
		$i++;
		}
		$n=$i;
	}
	while($row=mysqli_fetch_array($user))
	{	
	
		
		$uid[$i]=$row["Id"];	
		
		//$uid[$f]=$row["Id"];
		$i++;
	}
		
$dif=$i;	

$diff=array_diff($uid,$fid);
$user=mysqli_query($s,"select * from users");
	while($row=mysqli_fetch_array($user))
	{
		for($i=1;$i<$dif;$i++)
	{
		if($diff[$i]==$row['Id'])
		{
					echo '<div id="fm"><img src="'.$ppdir.$row['Profilephoto'].'"height="200" width="200" id="container"/>'.$row['FullName'].' || Followers '.$row['Followers'].' || Xp '.$row['Xp'].' <a href="followed.php?followid='.md5($row['Id']).'&userid='.md5($userid).'&followeremail='.md5($followeremail).'&followemail='.$row['Email'].'&follow=1" id="link">Follow</a></div> <hr>';

			//print_r($row['Id']);
	}}
}


?>