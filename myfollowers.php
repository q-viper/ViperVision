<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8"> 
	<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Followers</title>
		<style>
			
		</style>
<link rel="stylesheet" type="text/css" href="css/followers.css">


	</head>




<?php
	$tname=$_GET['tname'];
	include_once("menu.php");
	include_once('constant.php');
	$xp=$_GET['xp'];
	$id=$_SESSION['id'];
	$users=mysqli_query($s,"select * from users");
	echo("<h1><a href='myprofile.php'>Go to profile.</a><br>Below peoples are following you currently.</h1><hr>");
	$i=0;
	$ftname=mysqli_query($s,"select * from followdetails");
	$n=mysqli_num_rows($ftname);
	$i=0;
	while($row=mysqli_fetch_array($ftname))
		{
			if($row['FollowId']==$id&&md5($row['FollowEmail'])==$_GET['fprint'])
			{
			$fid[$i]=$row["FollowerId"];
			$i++;
			}
		}
	$user=mysqli_query($s,"select * from users");
	while($row=mysqli_fetch_array($user))
		{
			for($i=0;$i<$n;$i++)
			{
				if($fid[$i]==$row['Id'])
				{
				echo '<ul><li class="dropdown"><a href="aboutuser.php?fprint='.md5($row['Email']).'&view=negative&id='.md5($row['Id']).'"><img src="'.$ppdir.$row['Profilephoto'].'"height="200" width="200"/></a><div class="dropdown-content"><a href="block.php?id='.md5($row['Id']).'">Block</a><a href="sendmessage.php?type=neutrino&id='.md5($row['Id']).'">Message</a><a href="followed.php?follow=1&userid='.md5($id).'&followid='.md5($row['Id']).'&followemail='.md5($row['Email']).'&followeremail=">Follow/Unfollow</a></div></li></ul>';
				echo $row['FullName'].' || Following '.$row['Following'].' || Followers '.$row['Followers'].'</br>'.$row['Bio'].'<hr>';
				}
			}

		}
?>