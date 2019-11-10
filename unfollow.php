<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8"> 
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Block User</title>
<style>


</style>
<?php
	session_start();

	include_once("constant.php");
	$uid=$_SESSION['id'];

	$bid=$_GET['id'];
	$users=mysqli_query($s,"select * from users");
	while($row=mysqli_fetch_array($users))
	{
		if($bid==md5($row['Id']))
			$fid=$row['Id'];
	}

	$uf=mysqli_query($s,"delete from followdetails where FollowId='$fid' AND FollowerId='$uid'");
	//$uff=mysqli_query($s,"delete from followdetails where FollowerId='$uid'");
	header("location:myprofile.php");




?>
<?php	include_once('footer.php');
?>