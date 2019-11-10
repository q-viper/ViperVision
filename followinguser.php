<html>
<head><title>Following</title>
<link rel="stylesheet" type="text/css" href="css/following.css">


</head>


<?php
    session_start();
	include_once("constant.php");
	include_once("menu.php");
	$followers=$_GET['fs']+1;
	//$followertablename=$_GET['tname'];
	$userid=$_SESSION['id'];
	$followedid=$_GET['followedid'];
	$followeremail=$_GET['fprint'];
	$ftablename='userid'.$followedid;
	$followemail=$_GET['femail'];
	$users=mysqli_query($s,"select * from users");
	while($row=mysqli_fetch_array($users))
	{
		if($followeremail=md5($row['Email']))
		{
			$follower=$row['FullName'];
			$followereail=$row['Email'];
			
		}
	}
	$begin=$_GET['begin'];
	if($begin==1)
	{
		$notifications=$_GET['n']+1;
		$user="admin";
		$reason="first";
		$article="Welcome to ViperVision. Now this is your time to change world.";
		$addn=mysqli_query($s,"insert into notifications(ById,ToId,Reason,Article,DateTime) values('$userid','$followedid','$reason','$article',NOW())");
		$upn=mysqli_query($s,"update users set Notifications='$notifications',Followers='$followers' where Id='$followedid'");
		$bpn=mysqli_query($s,"update users set Notifications='$notifications',Following='1' where Id='$userid'");
		$insert=mysqli_query($s,"insert into followdetails(FollowId,FollowEmail,FollowerId,FollowerEmail) values('$followedid','$followemail','$userid','$followeremail')");
		$reason="follow";
		$article="You got one follower.".$follower;
		$addn=mysqli_query($s,"insert into notifications(ById,ToId,Reason,Article,DateTime) values('$userid','$followedid','$reason','$article',NOW())");
		header("location:signin.php?begin=2");	
	}
	echo"<div id='followmore'><a href=followmore.php?userid=".md5($userid)."&followeremail=".md5($followeremail).">Click here to follow more users.</a></div>";
	echo"<div><h1>You are currently following below users:</br></h1>";
	$ftname=mysqli_query($s,"select * from followdetails");
	$n=mysqli_num_rows($ftname);
	$i=0;
	while($row=mysqli_fetch_array($ftname))
	{
		if($row['FollowerId']==$userid)
		{
		$fid[$i]=$row['FollowId'];
		$i++;
		}
		//$n=$i;
	}
	
	$user=mysqli_query($s,"select * from users");
	while($row=mysqli_fetch_array($user))
	{
		for($i=0;$i<$n;$i++)
		{
			if($fid[$i]==$row['Id'])
			{
				echo '<ul><li class="dropdown"><a href="aboutuser.php?view=negative&id='.md5($row['Id']).'"><img src="'.$ppdir.$row['Profilephoto'].'"height="200" width="200"/></a><div class="dropdown-content"><a href="unfollow.php?id='.md5($row['Id']).'">Unfollow</a><a href="sendmessage.php?type=neutrino&id='.md5($row['Id']).'&fprint='.md5($row['Email']).'">Message</a></div></li></ul>';
				echo $row['FullName'].' || Following '.$row['Following'].' || Followers '.$row['Followers'].'</br>'.$row['Bio'].'<hr>';
			}
		}

	}
echo"</div>";

?>