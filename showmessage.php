<!DOCTYPE HTML>
	<html lang="en">
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Message</title>
<link rel="stylesheet" type="text/css" href="css/showmessage.css">




</head>


<?php
session_start();
if($_SESSION['status']!=1){
	header("Location: signin.php");
exit;}
	include_once("menu.php");
	include_once("constant.php");
	$receiverid=$_SESSION['id'];
	$r=mysqli_query($s,"select * from users");
while($row=mysqli_fetch_array($r))
{
	if($_GET['fprint']==md5($row['Email'])&&$_GET['receiverid']==md5($row['Id']))
	{
		$access=1;
	}
}
if($access!=1)
{
	echo"<h1>Sorry something went wrong. Try again visiting this page.</h1>";
	exit;
}
	$message=mysqli_query($s,"select * from messagedetails WHERE ReceiverId=$receiverid OR SenderId=$receiverid ORDER BY Id DESC");
	echo"<div id='sendmsg'><a href='sendmessage.php?senderid=".md5($receiverid)."&send=send'>Send Messages</a></div><hr></br>";
	if($_GET['message']=="message")
	{
		$i=0;
		$sm=array();
		while($row=mysqli_fetch_array($message))
		{
			
					if($receiverid==$row['ReceiverId'])
					{
					 $receiver[$i]=$row['ReceiverId'];
					 $sender[$i]=$row['SenderId'];
					 array_push($sm,$row['Sms']);
					$i++;
					
					}
					if($receiverid==$row['SenderId'])
					{
						$receiver[$i]=$row['SenderId'];
						$sender[$i]=$row['ReceiverId'];
						array_push($sm,$row['Sms']);
						$i++;
					}
			$n=$i;
			
		}
		$sender=array_unique($sender);
		$receiver=array_unique($receiver);
		$user=mysqli_query($s,"select * from users");
		//array_unshift($sender,'00');
		//print_r($sender);
		//print_r($receiver);
		
		
		while($row=mysqli_fetch_array($user))
			{
				for($i=0;$i<=$n;$i++)
				{
					if($sender[$i]==$row["Id"])
					{
					echo '<a href="sendmessage.php?showmessage=positive&receiverid='.md5($sender[$i]).'&senderid='.md5($receiverid).'&messagestatus=sent&message=new"'.'><img src="'.$ppdir.$row['Profilephoto'].'"height="80" width="80" id="container"/>'.'</br>'.$row['FullName'].'<div id="msg">'.$sm[$i].'</div><hr>';
						$pp[$j]=$row['Profilephoto'];
						$j++;
					}
				}
			
			$n=$j;
			}
	}
		
	$updatestatus=mysqli_query($s,"update messagedetails set Status=seen where ReceiverId=$receiverid");
	$updatemsg=mysqli_query($s,"update users set UnseenMessage=0 where Id=$receiverid");
		if($_GET['showmessage']=="positive")
			{
				while($row=mysqli_fetch_array($message))
				{
					if($senderid==$row['ReceiverId'])
					{
						$senderid=$row['SenderId'];
						echo $_SESSION['sender']."<br/>".$row['Sms']."<hr>";			
					
					}
				}
				$updatestatus=mysqli_query($s,"update messagedetail set Status='seen' where SenderId=$senderid");
			
			}
?>
<?php	include_once('footer.php');
?>