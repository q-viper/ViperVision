<?php
include_once("constant.php");
session_start();
$pid=$_GET['pid'];
$uid=$_GET['upid'];
$id=$_SESSION['id'];
$users=mysqli_query($s,"select * from users");
while($row=mysqli_fetch_array($users))
{
	if($id==$row['Id'])
		$cname=$row['FullName'];
	if($uid==$row['Id'])
		$noti=$row['Notifications']+1;
	
	}
$post=mysqli_query($s,"select * from posts");
while($row=mysqli_fetch_array($post))
{
	if($pid==$row['Id']&&$uid==$row['UploaderId'])
	{
		$comments=$row['Comments']+1;
	}
}

if($_GET['comment']=="true")
{
	if($_POST['tpost']!="")
	{	
		$reason="Comment";
		$article="You got one comment on post by ".$cname."<br/><i>".$art."</i>";
		$comment=$_POST['tpost'];
		$upost=mysqli_query($s,"update posts set Comments=$comments where Id=$pid");
		$upun=mysqli_query($s,"update users set Notifications='$noti' where Id='$uid'");
		$addn=mysqli_query($s,"insert into notifications(ById,ToId,Reason,ReasonId,Article,DateTime) values('$id','$uid','$reason','$pid','$article',NOW())");
		$addc=mysqli_query($s,"insert into commentdetails(PostId,Commenter,PostBy,Comment,CommenterName,DateTime) values('$pid','$id','$uid','$comment','$cname',NOW())");
		if($upun && $addn && $addc ==1)
		{
			header("location:comments.php?pid=$pid&upid=$uid");
		}
		else
			echo"<h1> Error in Commenting, retry again.</h1>";
	}
}
?>