<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8"> 
<meta name="viewport" content="width=device-width, initial-scale=1">

<title><?php
if($_GET['content']=="")
	echo"Newsfeed";
else
	echo$_GET['content'];?>


</title>
<link rel="stylesheet" type="text/css" href="css/newsfeed.css">
</head>


<?php
session_start();
if($_SESSION['status']!=1){
	header("Location: signin.php");
exit;}
include_once("constant.php");
include_once("menu.php");
$ftname=mysqli_query($s,"select * from followdetails");
$n=mysqli_num_rows($ftname);
$i=0;
if($_GET['news']=="virtual")
{
$content=$_GET['content'];

$posts=mysqli_query($s,"select * from posts ORDER BY Likes DESC");
	while($row=mysqli_fetch_array($posts))
	{

			if($content==$row['Category'])
			{			$postdir='Images/PostPic/';
						echo'<h1><div id="text"><strong>Title:<br>'.$row['Title'];
						echo"</h1><figure>";
						echo'<div id="photo">';
						echo '<ul><li class="dropdown"><a href="#"><img src="'.$postdir.$row['RelatedFile'].'"height="300" width="400" alt="Photo"/></h1></a><div class="dropdown-content"><a href="likes.php?news=true&category='.$row['Category'].'&upid='.$row['UploaderId'].'&postid='.$row['Id'].'" class="fa fa-thumbs-up">'.$row['Likes'].' Like</a>'.'</br><a href="comments.php?pid='.$row['Id'].'&upid='.$row['UploaderId'].'" class="fa fa-comments">'.$row['Comments'].' Comments'.'</a></div></li></ul>';		
						echo'</div>';
						echo'<div id="text">';
						echo '<figcaption><strong>'.'<p>Caption:<br>'.$row["Article"].'</p></br>Category:'.$row['Category'].'<br>Posted by:<div id="uploader"><a href="aboutuser.php?view=negative&id='.$row['UploaderId'].'" class="fa fa-user">'.$row['Uploader'].' </a></br>On:<b class="fa fa-calendar-times-o"></b> '.$row['UploadedDate']." ".$row['UploadedTime'].'</br><a href="likes.php?news=true&upid='.$row['UploaderId'].'&postid='.$row['Id'].'" class="fa fa-thumbs-up">'.$row['Likes'].' '.'Likes.</a></br><a href="comments.php?pid='.$row['Id'].'&upid='.$row['UploaderId'].'" class="fa fa-comments">Comments'.$row['Comments'].'</a></figcaption></figure>';						
						echo'</p>'.'</div>'."</br><hr></br>";
					//echo $row['UploadedTime'];
			}
		
	}

	
}
else
{
while($row=mysqli_fetch_array($ftname))
	{
		if($_SESSION['id']==$row['FollowerId'])
		{
		$fid[$i]=$row["FollowId"];
		$i++;
		}
	}

		$j=0;

	$j=0;
	$posts=mysqli_query($s,"select * from posts ORDER BY UploadedDate DESC,UploadedTime DESC");
	while($row=mysqli_fetch_array($posts))
	{
        for($i=$n;$i>=0;$i--)
			{
			if($fid[$i]==$row['UploaderId'])
				{
				 
					 $postdir='Images/PostPic/';
					 echo'<h1><div id="text"><strong>Title:<br>'.$row['Title'];
						echo"</h1><figure>";
						echo'<div id="photo">';
						echo '<ul><li class="dropdown"><a href="#"><img src="'.$postdir.$row['RelatedFile'].'"height="300" width="400" alt="Photo"/></a><div class="dropdown-content"><a href="likes.php?news=true&category='.$row['Category'].'&upid='.$row['UploaderId'].'&postid='.$row['Id'].'">'.$row['Likes'].' Like</a>'.'</br><a href="comments.php?pid='.$row['Id'].'&upid='.$row['UploaderId'].'">'.$row['Comments'].' Comments'.'</a></div></li></ul>';		
						echo'</div>';
						echo'<div id="text">';
						echo '<figcaption><strong>'.'<p>Caption:<br>'.$row["Article"].'</p></br>Category:'.$row['Category'].'<br>Posted by:<div id="uploader"><a href="aboutuser.php?view=negative&id='.$row['UploaderId'].'" class="fa fa-user">'.$row['Uploader'].' </a></br>On:<b class="fa fa-calendar-times-o"></b> '.$row['UploadedDate']." ".$row['UploadedTime'].'</br><a href="likes.php?news=true&upid='.$row['UploaderId'].'&postid='.$row['Id'].'" class="fa fa-thumbs-up">'.$row['Likes'].' '.'Likes.</a></br><a href="comments.php?pid='.$row['Id'].'&upid='.$row['UploaderId'].'" class="fa fa-comments">Comments'.$row['Comments'].'</a></figcaption></figure>';						
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
	
