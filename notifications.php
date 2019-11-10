<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8"> 
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Notifications</title>
<link rel="stylesheet" type="text/css" href="css/notifications.css">
</head>

<?php
session_start();
if($_SESSION['status']!=1){
	header("Location: signin.php");
exit;}
include_once("constant.php");
include_once("menu.php");
$userid=$_SESSION['id'];
if($_GET['action']=="show")
{
	$show=mysqli_query($s,"select * from notifications ORDER BY DateTime DESC");
	while($row=mysqli_fetch_array($show))
	{
		if($userid==$row['ToId'])
		{
			if($row['Reason']=="follow")
			{
			echo '<a href="aboutuser.php?view=negative&id='.md5($row['ById']).'"><div id="article">'.$row['Article']."</div><div id='datetime'>".$row['DateTime']."</a></div><hr>";	
			}
			if($row['Reason']=="Like")
			{
			echo '<a href="myposts.php"><div id="article">'.$row['Article']."</div><div id='datetime'>".$row['DateTime']."</a></div><hr>";	
			}
			
				
		
		}
		
		
	}
	
	
$updaten=mysqli_query($s,"update users set Notifications=0 where Id='$userid'");
}
if($_GET['notify']=="positive")
{
	$addn=mysqli_query($s,"insert into notifications(ById,ToId,Reason,Article,DateTime) values('$byid','$toid','$reason','$article',NOW())");
	$uun=mysqli_query($s,"update users set Notifications=$notifications where Id='$toid'");
	
	
	
}
$updaten=mysqli_query($s,"update notifications set Notifications='0' where Id='$userid'");



?>
<?php	include_once('footer.php');
?>