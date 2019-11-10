<?php
include_once("menu.php");
include_once("constant.php");
$pid=$_GET['pid'];
$uid=$_GET['upid'];
$id=$_SESSION['id'];
$users=mysqli_query($s,"select * from users");
while($row=mysqli_fetch_array($users))
{
	if($id==$row['Id'])
		$cname=$row['FullName'];
	if($uid==$row['Id'])
		$noti=$row['Notifications'];
	
	}
$post=mysqli_query($s,"select * from posts");
while($row=mysqli_fetch_array($post))
{
	if($pid==$row['Id']&&$uid==$row['UploaderId'])
	{
		$comments=$row['Comments'];
	}
}
$spost=mysqli_query($s,"select * from posts");
while($row=mysqli_fetch_array($spost))
{
	if($pid==$row['Id'])
	{
	echo '<ul><li class="dropdown"><a href="#"><img src="'.$postdir.$row['RelatedFile'].'"height="300" width="400" alt="Photo"/></a><div class="dropdown-content"><a href="likes.php?news=true&category='.$row['Category'].'&upid='.$row['UploaderId'].'&postid='.$row['Id'].'">'.$row['Likes'].' Like</a>'.'</br><a href="comments.php?pid='.$row['Id'].'&upid='.$row['UploaderId'].'">'.$row['Comments'].' Comments'.'</a></div></li></ul>';		
	echo '<figcaption><strong>'.'<p>Caption:<br>'.$row["Article"].'</p></br>Category:'.$row['Category'].'<br>Posted by:<div id="uploader"><a href="aboutuser.php?view=negative&id='.$row['UploaderId'].'">'.$row['Uploader'].' </a></br>On: '.$row['UploadedDate']." ".$row['UploadedTime'].'</br><a href="likes.php?news=true&upid='.$row['UploaderId'].'&postid='.$row['Id'].'">'.$row['Likes'].' '.'Likes.</a></br><a href="comments.php?pid='.$row['Id'].'&upid='.$row['UploaderId'].'">Comments'.$row['Comments'].'</a></figcaption></figure>';						
	}
}
echo'<form method="post" action="commented.php?comment=true&comments='.$comments.'&pid='.$pid.'&upid='.$uid.'"><textarea wrap="virtual" name="tpost" rows="10" cols="100" maxlength="102400"></textarea><hr><input type="submit" name="Comment" value="Comment"><hr>';
$show=mysqli_query($s,"select * from commentdetails ORDER BY Id DESC");
while($row=mysqli_fetch_array($show))
{
	if($pid==$row['PostId']&& $uid==$row['PostBy'])
	{
		echo'<a href="aboutuser.php?view=negative&id='.$row['Commenter'].'">'.$row['CommenterName'];
		echo '<hr>'.$row['Comment']." ".$row['DateTime']."<hr>";
		
	}		
}

?>