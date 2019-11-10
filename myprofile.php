<?php
session_start();
if($_SESSION['status']!=1){
	header("Location: signin.php");
	//exit;
	
}
?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8"> 
	  <meta name="viewport" content="width=device-width, initial-scale=1">
		<title> My Profile</title>
<link rel="stylesheet" type="text/css" href="assets/plugins/css/profile.css">

	  </head>
  <body>
<div id="php">

	<?php
	include_once("menu.php");
	session_start();
	include_once("constant.php");
	$s=mysqli_connect($host,$dbUser,$dbPassword,$dbName)or die("Cannot connect to Db Server.");
	$c=mysqli_query($s,"select * from users");
	while($row=mysqli_fetch_array($c))
	{
		if($_SESSION['id']==$row['Id'])
		{	
			$notifications=$row['Notifications'];
			$_SESSION['name']=$row['FullName'];
			$email=$row['Email'];
			$_SESSION['email']=$row['Email'];
			$id=$row['Id'];
			$Xp=$row['Xp'];
			$posts=$row['Posts'];
			$level=$row['Level'];
			$messages=$row['UnseenMessage'];
			$xp=$row['Xp'];
			if($_GET['pp']=="changed")
			{
				
				$show="You just changed profile picture.";
			}
			echo "<h2>Welcome to your profile."."<i><strong>".$_SESSION['name'].". </strong></i>".$show."</h2></br>";

			if($xp>30000)
			{
				$level="Motivator";
			}
			elseif($xp>13000)
			{
				$level="Achiever";
			}
			elseif($xp>4500)
			{
				$level="ActionTaker";
			}
			elseif($xp>1000)
			{
				$level="Dreamer";
			}
			else
			{
				$level="Begineer";
			}
			$ppdir="Images/ProfilePic/";
			echo '<ul><li class="dropdown"><a href="aboutuser.php"><img src="'.$ppdir.$row['Profilephoto'].'"height="200" width="200"/></a><div class="dropdown-content"><a href="editpp.php" class="fa fa-pencil">Edit</a><a href="fullsize.php">Full size</a><a href="showmessage.php?message=message&receiverid='.$id.'" class="fa fa-inbox">Messages'.$messages.'</a></div></li></ul>';
			echo'<div id="buttons"><button class="button"><a href="addposts.php?fprint='.md5($email).'&xp='.$xp.'&id='.md5($id).'" class="fa fa-chain">Add Posts</button></a></br><hr><button class="button"><a href="myposts.php?fprint='.md5($email).'&xp='.$xp.'&id='.md5($id).'&name='.$_SESSION['name'].'" class="fa fa-clipboard">My Posts</button></a></div><hr>';
			echo'<div id="xp"><h1>You are currently '.$level.'.</br><hr width="100">Xp:<b class="fa fa-trophy">'.$xp.'pts</b></br></div>';
			$tname="userid".$id;
			$following=mysqli_num_rows(mysqli_query($s,"select FollowId from followdetails where FollowerId=$id"));
			$followers=mysqli_num_rows(mysqli_query($s,"select Followerid from followdetails where FollowId=$id"));
			$add=mysqli_query($s,"update users set Following=$following,Followers=$followers where Id=$id");
			echo "<div class='button1'>";
			echo'<button class="bn"><a href="followinguser.php?userxp='.$xp.'&fprint='.md5($email).'&userid='.md5($id).'&check=2" class="fa fa-users">Following '.$following.'</a></button>';
			echo'<hr><button class="bn"><a href="myfollowers.php?fprint='.md5($email).'&userxp='.$xp.'" class="fa fa-users">My Followers '.$followers.'</a></button>';
			echo'<hr><button class="bn"><a href="showmessage.php?fprint='.md5($email).'&message=message&receiverid='.md5($id).'" class="fa fa-inbox">Messages '.$messages.'</a></button>';
			echo'<hr><button class="bn"><a href="notifications.php?fprint='.md5($email).'&action=show&userid='.md5($id).'" class="fa fa-bell-o">Notifications '.$notifications."</a></button>";
			echo'<hr><button class="bn"><a href="newsfeed.php" class="fa fa-newspaper-o">News Feed</a></button>';
			echo'<hr><button class="bn"><a href="signin.php?signout=1" class="fa fa-sign-out">Sign Out</a></button';
			echo'</div>';
		}
	}	
	
	
	
	?>
	
	</div>

  </body>
  </html>
<?php
include_once("footer.php");









?>  
 