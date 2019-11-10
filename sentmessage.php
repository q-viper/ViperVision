<?php
	include_once("constant.php");
	session_start();
	$message=$_POST['message'];
	$senderid=$_GET['senderid'];
	$receiverid=$_GET['receiverid'];
	$status="Unseen";
	$sender=mysqli_query($s,"select * from users");
	while($row=mysqli_fetch_array($sender))
	{
		if($senderid==$row['Id'])
		{
			$sender=$row['FullName'];
		}
		if($receiverid==$row['Id'])
			{
			$receiver=$row['FullName'];
			}
	}	
		$po=mysqli_query($s,"insert into messagedetails(SenderId,ReceiverId,Sname,Rname,Sms,Status,DateTime) values('$senderid','$receiverid','$sender','$receiver','$message','$status',NOW())");
		$unseen=$_GET['unseen']+1;
		$t=mysqli_query($s,"update users set UnseenMessage=$unseen where Id='$receiverid'");
		$seen=$_GET['unseenr']-1;
		$x=mysqli_query($s,"update users set UnseenMessage=$seen where Id='$senderid'");
		if($x&&$po&&$t==1)
		{
			header("location: sendmessage.php?senderid=".md5($senderid)."&receivername=$receiver&sender=$sender&receiverid=".md5($receiverid)."&messagestatus=sent&message=new");
		}

?>