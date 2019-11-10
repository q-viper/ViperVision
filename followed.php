<?php
include_once("constant.php");
$userid=$_GET['userid'];
$usertable="userid".$userid;
$followeremail=$_GET['followeremail'];
$users=mysqli_query($s,"select * from users");
while($row=mysqli_fetch_array($users))
{
	if(md5($row['Id'])==$userid)
	{
		$followeremail=$row['Email'];
		$follower=$row['FullName'];
		$userid=$row['Id'];
	}
	if(md5($row['Id'])==$_GET['followid'])
	{	$xp=$row['Xp'];
		$followedid=$row['Id'];
		$followemail=$row['Email'];
		
	}
		}
//$follower=mysqli_query($s,"select FullName from users where Id='$userid'");
if($_GET['follow']==1)
	{	
		//$followid=$_GET['followid'];
		//$followertable="userid".$followid;
		//$followemail=$_GET['followemail'];
		$xp=$xp+100;
		$xpu=mysqli_query($s,"update users set Xp='$xp' where Id='$followedid'");
		$follow=mysqli_query($s,"insert into followdetails(FollowId,FollowEmail,FollowerId,FollowerEmail) values('$followedid','$followemail','$userid','$followeremail')");
		$reason="follow";
		$article="You got one follower.";
		$addn=mysqli_query($s,"insert into notifications(ById,ToId,Reason,Article,DateTime,ReasonId) values('$userid','$followedid','$reason','$article',NOW(),'$userid')");

		if($follow==1)
		{
			header("location:followmore.php?userid=$userid&followeremail=$followeremail&followemail=$followemail&followid=$followid");
		}
	
}

?>