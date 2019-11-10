<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8"> 
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>NewsFeed</title>
<link rel="stylesheet" type="text/css" href="css/newsfeed.css">
</head>


<?php
session_start();
if($_SESSION['status']!=1){
	header("Location: signin.php");
exit;}
include_once("constant.php");
include_once("menu.php");
$tname="userid".$_SESSION['id'];
$ftname=mysqli_query($s,"select * from $tname");
$n=mysqli_num_rows($ftname);
$i=0;
while($row=mysqli_fetch_array($ftname))
	{
		$fid[$i]=$row["FollowId"];
		$i++;
	}

		$j=0;
for($i=$n;$i>0;$i--)
{
	$j=0;
	$posts=mysqli_query($s,"select * from posts ORDER BY UploadedDate DESC,UploadedTime DESC");
	while($row=mysqli_fetch_array($posts))
	{

			if($fid[$i]==$row['UploaderId'])
				{
				 if($j<4)
				 {
					echo"<figure>";
						echo'<div id="photo">';
						echo '<ul><li class="dropdown"><a href="#"><img src="data:image/jpeg;base64,'.base64_encode($row['RelatedPhoto']).'"height="300" width="400" alt="Photo"/></a><div class="dropdown-content"><a href="likes.php?news=true&upid='.$row['UploaderId'].'&postid='.$row['Id'].'">'.$row['Likes'].' Like</a>'.'</br><a href="comments.php">'.$row['Comments'].' Comments'.'</a></div></li></ul>';		
						echo'</div>';
						echo'<div id="text">';
						echo '<figcaption><strong>'.'<p>Caption:<br>'.$row["Article"].'</p></br>Category:'.$row['Category'].'<br>Posted by:<div id="uploader"><a href="aboutuser.php?view=negative&id='.$row['UploaderId'].'">'.$row['Uploader'].' </a></br>On: '.$row['UploadedDate']." ".$row['UploadedTime'].'</br><a href="likes.php?news=true&upid='.$row['UploaderId'].'&postid='.$row['Id'].'">'.$row['Likes'].' '.'Likes.</a></br><a href="comments.php">Comments'.$row['Comments'].'</a></figcaption></figure>';						
						echo'</p>'.'</div>'."</br><hr></br>";
					//echo $row['UploadedTime'];
				$j++;
				}
		}
	}

}


	

	
	
	
	?>
	<?php	include_once('footer.php');
?>
	
