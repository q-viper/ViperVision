<!DOCTYPE HTML>
	<html lang="en">
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>Contact Us</title>
	<link rel="stylesheet" type="text/css" href="assets/plugins/minified/font-awesome.min.css">  
	<style>
	body{background:#355;text-align:center;color:white;font-size:24px;}
	
	
	
	</style>
</head>
<body>

<?php
session_start();
include_once('menu.php');

?>
<div class="fa fa-inbox">Email Us:vipervision@gmail.com</div><hr>
<div class="fa fa-phone">Call Us:+9779845701483</div><hr>
<div class="fa fa-map">Visit Us:Bharatpur, Chitwan, Nepal</div><hr>
<div class="fa fa-commenting">Feed-Back, Suggestions:</div><hr>
<div class="textbox"><form action="contact-us.php?fb=true" method="post"><textarea wrap="virtual" placeholder="Your suggestions and feedback here" name="feedback" rows="7" cols="50" maxlength="102400"></textarea><hr>
					<textarea wrap="virtual" name="email" rows="3" placeholder="Type your Email here" cols="30" maxlength="10240"></textarea><br>
					<input type="submit" value="Send" class="fa fa-save"></form>

<?php
include_once("constant.php");
if(isset($_POST['email']))
	if($_POST['feedback']!=NULL)
{
	$email=$_POST['email'];
	$feedback=$_POST['feedback'];
	$users=mysqli_query($s,"select * from users");
	while($row=mysqli_fetch_array($users))
	{
		if($email!=$row['Email'])
			$check=0;
		else
			$check=1;
	}
	if($check==0)
		echo '<h1>Your Email is not signed in yet, please make an account and retry again. Thanks.</h1>';
	if($check==1){
		$addf=mysqli_query($s,"insert into feedback(FeedBack,Sender) values('$feedback','$email')");
	    if($addf)
		echo'<h1>You just sent suggestions, feedbacks. Admins are looking at it. Thanks for helping us improving.</h1>';
	}
		
}