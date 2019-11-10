<?php


/*
may be useful.......
session_start();
	include_once("constant.php");
	$uid=$_SESSION['id'];
	$uemail=$_GET['uemail'];
	$lid=$_GET['lid'];
	$id=$_GET['postid'];
	$name=$_GET['name'];
	$s=mysqli_connect($host,$dbUser,$dbPassword,$dbName)or die("Cannot connect to Db Server.");
	$liker=mysqli_query($s,"select * from liker");
	$post=mysqli_query($s,"select * from posts");
	$users=mysqli_query($s,"select * from users");
	while($row=mysqli_fetch_array($users))
	{
		if($lid==$row['Id'])
			$liker=$row['FullName'];
		if($pid=$row['Id'])
		{
			$notifications=$row['Notifications'];
			//$email=$row['Email'];
		}
	}
	while($row=mysqli_fetch_array($post))
	{
		if($id=$row['Id'])
		{
		$p=$row['Likes'];
		$pid=$row['Id'];
		}
	}
	while($row=mysqli_fetch_array($liker))
	{
		$likedby=$row['LikedBy'];
		$postid=$row['PostId'];
		if($postid==$id)
		{
			$pid=$row['UploaderId'];
		}
		//echo $likedby." ".$postid."</br>";
		if($likedby==$lid	&& $postid==$id)
		{
			$likes=$p-1;
			$r=mysqli_query($s,"update posts set Likes='$likes' where Id='$id'");
			$d=mysqli_query($s,"delete from liker where id='$lid'");
		
		}
		else
		{
			$likes=$p+1;
			//$likes=$p+1;
			$l=mysqli_query($s,"insert into liker(PostOf,LikedBy,Likes,PostId) values('$uid','$lid','$likes','$id')");
			$updatelike=mysqli_query($s,"update posts set Likes='$likes' where Id='$id'");
			$reason="Like";
			$article="You got 1 like on your post by ".$liker;
			$upun=mysqli_query($s,"update users set Notifications='$notifications' where Id='$pid'");
			$addn=mysqli_query($s,"insert into notifications(ById,ToId,Reason,Article,DateTime) values('$lid','$pid','$reason','$article',NOW())");
		
	
		}
	}
	
	header("location:posts.php?uemail=$uemail&uid=$uid");
	
	
	*/
	
	if($_GET['news']=="true")
	{
	$category=$_GET['category'];
	session_start();
	include_once("constant.php");
	$postid=$_GET['postid'];
	$uploaderid=$_GET['upid'];
	$likerid=$_SESSION['id'];
	$like=mysqli_query($s,"select * from liker");
	$post=mysqli_query($s,"select * from posts");
	$users=mysqli_query($s,"select * from users");
	while($row=mysqli_fetch_array($users))
	{
		if($likerid==$row['Id'])
			$liker=$row['FullName'];
		if($uploaderid=$row['Id'])
		{
			$noti=$row['Notifications']+1;
		}
	}
	while($row=mysqli_fetch_array($post))
	{
		if($postid==$row['Id'])
		{
		$plike=$row['Likes'];
		$art=$row['Article'];
		}
	}
	
	while($row=mysqli_fetch_array($like))
	{
		
		if($row['LikedBy']==$likerid && $row['PostId']==$postid)
		{
			$unlike=1;
			$delid=$row['Id'];
			
		}
		
	}
	}
if($unlike==1)
{
	$likes=$plike-1;
			$r=mysqli_query($s,"update posts set Likes='$likes' where Id='$postid'");
			$d=mysqli_query($s,"delete from liker where Id='$delid'");
			header("location:newsfeed.php?content=$category&news=virtual");
	
}
else{
			$likes=$plike+1;
			//$likes=$p+1;
			
			$liked=mysqli_query($s,"insert into liker(PostOf,LikedBy,Likes,PostId) values('$uploaderid','$likerid','$likes','$postid')");
			if($liked)
			{
			$updatelike=mysqli_query($s,"update posts set Likes='$likes' where Id='$postid'");
			$reason="Like";
			$article="You got 1 like on your post by ".$liker;
			$upun=mysqli_query($s,"update users set Notifications='$noti' where Id='$uploaderid'");
			$not=mysqli_query($s,"select * from notifications");
			while($row=mysqli_fetch_array($not))
			{
				if($row['ById']==$likerid&&$row['ReasonId']==$postid)
				{
					$notify=1;
				}
			}
			if($notify!=1){
			$addn=mysqli_query($s,"insert into notifications(ById,ToId,Reason,ReasonId,Article,DateTime) values('$likerid','$uploaderid','$reason','$postid','$article',NOW())");
			}
			header("location:newsfeed.php?content=$category&news=virtual");
			}
}



	
?>