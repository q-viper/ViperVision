 

 <!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8"> 
	  <meta name="viewport" content="width=device-width, initial-scale=1">
		<title> Login form </title>
		
 <style>
 
 	 input[type=varchar],input[type=password], select {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

input[type=submit] {
    width: 100%;
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type=submit]:hover {
    background-color: #45a049;
}

div {
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 40px;
	
}
	
		 
 </style>
	  </head>
  <body>
  <?php
		session_start();
		if($_REQUEST['signin.php']==0){
			session_destroy();
		}
		include("menu.php");
	?>
	
	
<div id="form">
</br>
	<form method="post" action="loginprocess.php" class="form"/>
	<?php
	session_start();
	if($_REQUEST['signin']==1)
	{
		echo'<marquee bgcolor="#cccccc" loop="100" scrollamount="30" width="100%"><strong><b><h2>Please recheck name and password</h2></strong></b></marquee></br>';
	}
	if($_GET['begin']==1)
	{
		echo"<h1>You have followed 1 person. Sign in to reach your profile.</h1>";
	$followers=$_GET['fs']+1;
	$followertablename=$_GET['tname'];
	$userid=$_GET['userid'];
	$followedid=$_GET['followedid'];
	$followeremail=$_GET['email'];
	
	$followemail=$_GET['femail'];
	$users=mysqli_query($s,"select * from users");
	while($row=mysqli_fetch_array($users))
	{
		if($userid==$row['Id'])
			$follower=$row['FullName'];
		if($followedid==$row['Id'])
			$xp=$row['Xp']+50;
	}
	$begin=$_GET['begin'];
	if($begin==1)
	{
		$notifications=$_GET['n']+1;
		$user="admin";
		$reason="first";
		$article="Welcome to ViperVision. Now this is your time to change world.";
		$addn=mysqli_query($s,"insert into notifications(ById,ToId,Reason,Article,DateTime) values('0','$userid','$reason','$article',NOW())");
		$upn=mysqli_query($s,"update users set Notifications='$notifications',Followers='$followers',Xp='$xp' where Id='$followedid'");
		$bpn=mysqli_query($s,"update users set Notifications='1',Following='1' where Id='$userid'");
		$insert=mysqli_query($s,"insert into followdetails (FollowId,FollowEmail,FollowerId,FollowerEmail) values('$followedid','$followemail','$userid','$followeremail')");
		//$update=mysqli_query($s,"insert into $ftablename(FollowerId,FollowerEmail) values('$userid','$followeremail')");
		$reason="follow";
		$article="You got one follower.".$follower;
		$addn=mysqli_query($s,"insert into notifications(ById,ToId,Reason,Article,DateTime) values('$userid','$followedid','$reason','$article',NOW())");
		//header("location:signin.php?begin=2");	
	}
	}
	?>
	<b>
	E-mail:</br> <input type="varchar" name="username" required="required" placeholder="enter your user Email"/><br/>
	Password:  <input type="password" name="password" required="required" Placeholder="enter your password"/></br>
	
		<input type="Submit" name="submit" value="Login" id="sg" class="fa fa-sign-in"/></b>
		<a href="signup.php"><h3>Click here!!If you dont have account.</h3><a><br/>
		<a href="forgetpassword.php"><h3>Forget password?</h3></a>
	</form>
	</div>
  </body>
  <?php include_once("footer.php");?>
  </html>