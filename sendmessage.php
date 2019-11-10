<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8"> 
		  <meta name="viewport" content="width=device-width, initial-scale=1">
<title>Send Message</title>
<link rel="stylesheet" type="text/css" href="css/sendmessage.css">





<?php
include_once("menu.php");
session_start();
if($_SESSION['status']!=1){
	header("Location: signin.php");
exit;}
include_once("constant.php");
$senderid=$_GET['senderid'];
//$sendertable="userid".$senderid;
$message=mysqli_query($s,"select * from followdetails");
if($_GET['send']=="send")
{
	$i=1;
while($row=mysqli_fetch_array($message))
{
	if(md5($row['FollowId'])==$senderid)
	{
		$messagepossible[$i]=$row['FollowerId'];
		$i++;
	}
	if(md5($row['FollowerId'])==$senderid)
	{
		$messagepossible[$i]=$row['FollowId'];
		$i++;
	}
	$n=$i;
}
$messagepossible=array_unique($messagepossible);
$user=mysqli_query($s,"select * from users ORDER BY Xp DESC");
while($row=mysqli_fetch_array($user))
{ 
	for($i=1;$i<=$n;$i++)
	{
		if($messagepossible[$i]==$row["Id"])
		{
		echo '<a href="sendmessage.php?messagestatus=sent&message=new&senderid='.md5($senderid).'&receiverid='.md5($row['Id']).'&receivername='.$row['FullName'].'"><img src="'.$ppdir.$row['Profilephoto'].'"height="80" width="80"/>'.'<h1>'.$row['FullName'].'|| Xp:'.$row['Xp'].'pts</h1></br></a><hr><br/>';

		}
	}
}
}
$receiver=$_GET['receivername'];
if($_GET['messagestatus']=="sent")
	{
		if($_GET['message']=="new")
		{
			
			$receiverid=$_GET['receiverid'];
			//$image=addslashes(file_get_contents($_FILES['image']['tmp_name']));	
			$ncheck=mysqli_query($s,"select * from users");
			while($row=mysqli_fetch_array($ncheck))
				{	
				if(md5($row["Id"])==$senderid)
				{
					$unseen=$row['UnseenMessage'];
					$sender=$row['FullName'];
					$senderid=$row['Id'];
				}
				if(md5($row["Id"])==$receiverid)
				{
					$receiver=$row['FullName'];
					echo"<h1>".$receiver."</h1><hr>";
					$unseenr=$row['UnseenMessage'];
					$receiverid=$row['Id'];
				}
			}
			$mr=mysqli_query($s,"select * from messagedetails");
			while($row=mysqli_fetch_array($mr))
			{
			if($row['ReceiverId']==$receiverid&& $row['SenderId']==$senderid or $row['ReceiverId']==$senderid && $row['SenderId']==$receiverid)
			{
				
				{
				echo "<a href='aboutuser.php?view=negative&id=".md5($row['SenderId'])."'><b id='name'>".$row['Sname']."</a></b><hr>";
				echo '<div id="sms">'.$row['Sms']."</div><i> ".$row['DateTime']."</i><hr>";
				}
			}
		}
		}
		//echo $message."<i> Just now</i><hr>";
		echo"<form action='sentmessage.php?senderid=".$_SESSION['id']."&receivername=".$receiver."&receiverid=".$receiverid."&messagestatus=sent&message=new&unseenr=".$unseenr."&unseen=".$unseen."' method='post'>";
		echo'<textarea wrap="virtual" name="message" rows="7" cols="60" maxlength="102400" placeholder="Please type and click send to send message."></textarea></br><button><input type="submit" name="Send" value="send"/><br>';
	}
if($_GET['type']=="neutrino")
{
	$senderid=$_SESSION['id'];
	$receiverid=$_GET['id'];
			
			
			//$image=addslashes(file_get_contents($_FILES['image']['tmp_name']));	
			$ncheck=mysqli_query($s,"select * from users");
			while($row=mysqli_fetch_array($ncheck))
				{	
				if($row["Id"]==$senderid)
				{
					$unseen=$row['UnseenMessage'];
					$sender=$row['FullName'];
				}
				if(md5($row["Id"])==$receiverid)
				{
					$receiverid=$row['Id'];
					$receivername=$row['FullName'];
					$unseenr=$row['UnseenMessage'];
					}
				}
				$mr=mysqli_query($s,"select * from messagedetails");
				while($row=mysqli_fetch_array($mr))
				{
					if($row['ReceiverId']==$receiverid or $row['ReceiverId']==$senderid)
				{
					if($row['SenderId']==$receiverid or $row['SenderId']==$senderid)
					{
					echo "<a href='aboutuser.php?view=negative&id=".$row['SenderId']."'><b id='name'>".$row['Sname']."</b></a><hr>";
					echo '<div id="sms">'.$row['Sms']."</div><i> ".$row['DateTime']."</i><hr>";
					}
				}
				}
		
		//echo $message."<i> Just now</i><hr>";
			echo"<form action='sentmessage.php?senderid=".$senderid."&receivername=".$receivername."&receiverid=".$receiverid."&messagestatus=sent&message=new&unseenr=".$unseenr."&unseen=".$unseen."' method='post'>";
			echo'<textarea wrap="virtual" name="message" rows="7" cols="60" maxlength="102400" placeholder="Please type and click send to send message."></textarea><button><input type="submit" name="Send" value="send"/></form><br><hr>';
			
	
}
	
	
	
	
	
	
	
	
	?>
