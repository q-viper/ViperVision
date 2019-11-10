<?php
session_start();
if($_SESSION['status']!=1){
	//include "signin.php";
	header("Location: signin.php");
}
include_once('constant.php');
$r=mysqli_query($s,"select * from users");
while($row=mysqli_fetch_array($r))
{
	if($_GET['fprint']==md5($row['Email'])&&$_GET['id']==md5($row['Id']))
	{
		$access=1;
	}
}
if($access!=1)
{
	echo"<h1>Sorry something went wrong.</h1>";
	exit;
}
?>
<!DOCTYPE HTML>
	<html lang="en">
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

		<title> Add posts</title>
		<style>
		body{
			background:#355;
			text-align:center;
			font-size:24px;
		}
		textarea, select {
    width: 70%;
    padding: 10px 15px;
	background:#333;
	color:white;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
	font-size:20px;
    box-sizing: border-box;
}
a{
	
}

input[type=submit]{
    width: 100%;
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}
input[type=reset]{
	color:white;
	width: 100%;
    background-color: red;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
	
}
input[type=submit]:hover {
    background-color: #45a049;
}
		</style>
	</head>
<?php include_once("menu.php");?>
	<body>
		<div id="form">
			<form method="post" enctype="multipart/form-data">
				<h3>Please type your thoughts to ViperVision.Or <a href='myprofile.php' id='gp'>Go To Profile.</a></h3>
				<h3>Title:</h3>
				<div id="text">
						<textarea wrap="virtual" name="titlepost" rows="5" cols="20" placeholder="Enter post title here." maxlength="102400"></textarea><hr></div>
				<h3>Description:</h3>
				<div id="text">
					<textarea wrap="virtual" name="tpost" placeholder="Enter Description Here."rows="10" cols="50" maxlength="102400"></textarea><hr></div>
					<h4>If you have photo related, please enter.</h4><hr>
						<div id="image">
							<label class="title">Related Photo Or File</label>
							<input type="file" name="file" required="required" class="fa fa-image"><br/><i> (You can add 1 photo per post.)</i></br>
							<input type="hidden" name="MAX_FILE_SIZE" value="1024000000"></div><hr>
							<div id="category" class="fa fa-list">
							<label name="category">Category:</label>
							<select name="category" required="required">
							<option value="Science-Technology" class="fa fa-space-shuttle">Science-Technology</option>
							<option value="Travel and Tourism" class="fa fa-space-shuttle">Travel and Tourism</option>
							<option value="Photography" class="fa fa-car">Photography</option>
							<option value="Literature" class="">Literature</option>
							<option value="Research" class="fa fa-binoculars">Research</option>
							<option value="History" class="fa fa-history">History</option>
							<option value="Culture" class="fa fa-hand-lizard-o">Culture</option>
							<option value="Sports" class="fa fa-soccer-ball-o">Sports</option>
							<option value="Arts" class="fa fa-eye-slash">Arts</option>
							<option value="Meditiation" class="fa fa-meh-o">Meditiation</option>
							<option value="Educational" class="fa fa-books">Educational</option>
							<option value="Others" class="fa fa-code-fork">Others</option>
							</select>
							</div></br>
							<div id="category" class="fa fa-list">
							<label name="visibility">Share With:</label>
							<select name="visibility" required="required">
							<option value="Public">Public</option>
							<option value="Followers">Followers</option>
							<option value="Private">Only Me</option>
						</div>
						
					
				<input type="Reset" value="Reset" id="clear" class="fa fa-eraser"> <input type="submit" name="submit" id="submit" class="fa fa-save"/> 
			</form>
		</div>
	</body>
</html>
<?php
	//$_SESSION['id']=$_GET['id'];
	if(isset($_POST["submit"]))
		{	
	if($_POST['tpost']!=NULL)
	{	
			$visibility=$_POST['visibility'];
			$sategory=$_POST['category'];
			$uploaderemail=$_GET['fprint'];
			$r=mysqli_query($s,"select * from users");
			while($row=mysqli_fetch_array($r))
			{
				if($uploaderemail==md5($row['Email'])&&$_GET['id']==md5($row['Id']))
				{
					$xp=$row['Xp'];
					$access=1;
					$uid=$row['Id'];
					$level=$row['Level'];
					$_SESSION['id']=$uid;
					$posts=$row['Posts'];
					$followers=$row['Followers'];
					$uploaderemail=$row['Email'];
				}
				
			}
			
			$name=$_FILES['file']['name'];
			$size=$_FILES['file']['size'];
			$type=$_FILES['file']['type'];
			$loc=$_FILES['file']['tmp_name'];
			if($size>$_POST['MAX_FILE_SIZE'])
				echo"File is bigger";
			$extension=substr(basename($name),strpos(basename($name),".")+1);
		$allowedExtension=array("jpg","bmp","gif","png","jpeg");
		if(!in_array($extension,$allowedExtension))
		{echo "Not allowed extension used.";
		exit;}
			//$name=$uid.time().$name;
			$filedir="Images/PostPic/";
			$filepath=$filedir.$name;
			//$filepath2="posts/".$name;
			//$video=addslashes(file_get_contents($_FILES['f2']['tmp_name']));
			$uploadtime=date("h:i:sa");
			$uploaddate= date("Y/m/d");
			$uploader=$_SESSION['name'];
			$post=$_POST["tpost"];	
			$title=$_POST['titlepost'];
			$posts=$posts+1;
			if(move_uploaded_file($loc,$filepath))
			{
				$u=mysqli_query($s,"update users set Posts='$posts' where Email='$uploaderemail'");
				$r=mysqli_query($s,"insert into posts(Title,Article,RelatedFile,Uploader,UploadedDate,UploadedTime,UploaderEmail,Likes,UploaderId,Category,Visibility) values('$title','$post','$name','$uploader','$uploaddate','$uploadtime','$uploaderemail','1','$uid','$sategory','$visibility')")or die("error in uploading.");
				
				
				$xptotal=$posts*100+$followers*50;
				$u=mysqli_query($s,"update users set Xp='$xptotal' where Email='$uploaderemail'");
				$pii=mysqli_query($s,"select * from posts");
			while($row=mysqli_fetch_array($pii))
			{
				if($uploadtime==$row['UploadedTime']&&$row['Uploader']==$uploader)
					$postid=$row['Id'];
			}
			$l=mysqli_query($s,"insert into liker(PostOf,LikedBy,Likes,PostId) values('$uid','$uid','1','$postid')");

				
				
				echo"<a href='myposts.php?fprint=".md5($uploaderemail)."'>Click here to see posts.</a></br>";
				echo"<h1>Added successfully.</h1>";
					//header("location:")
				
			}
			

		}
		}
?>