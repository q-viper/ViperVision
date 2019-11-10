<?php
session_start();
if($_SESSION['status']!=1){
	header("Location: signin.php");
}
?>
<?php
					include_once("menu.php");


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8"> 
	<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Posts</title>
<link rel="stylesheet" type="text/css" href="css/myposts.css">
	</head>
	<body>
		<h1>Here are some hot posts. Have a look at these.</h1>
		
			<?php
			
					
					session_start();
					if($_SESSION['status']!=1){
						header("Location: signin.php");
					exit;}
					include_once("constant.php");
					//$s=mysqli_connect($host,$dbUser,$dbPassword,$dbName)or die("Cannot connect to Db Server.");
					$users=mysqli_query($s,"select * from users");
					$c=mysqli_query($s,"select * from posts ORDER BY UploadedDate DESC,UploadedTime DESC");
					echo'<h2 id="moreposts"><a href="addposts.php?fprint='.$_GET['fprint'].'&xp='.$_GET['xp'].'&id='.md5($_SESSION['id']).'">Click here to add more posts types.</a></h2>';
				
					while($row=mysqli_fetch_array($c))
					{	
						if($_SESSION['id']==$row['UploaderId']&&$_GET['fprint']==md5($row['UploaderEmail']))
						{
						$likes=$row['Likes'];
						$postid=$row['Id'];
						$date=$row['UploadedDate'];
						$time=$row['UploadedTime'];
					 echo'<h1><div id="text"><strong><u>'.$row['Title'];
						echo"</h1></div></u><figure>";
						echo'<div id="photo">';
						echo '<img src="'.$postdir.$row['RelatedFile'].'"height="350" width="55%" alt="Photo"/>';
						echo '<figcaption><strong>'.'<hr>Caption:</br>'.$row["Article"].'<hr><b class="fa fa-thumbs-up">'.$likes.'</b> '.'Likes  </a><a href="comments.php?pid='.md5($row['Id']).'" class="fa fa-comments">'.$comments.'Comments</a><hr>Posted by:<i>'.$row['Uploader'].'</i><hr><time class="fa fa-calendar-times-o">On:'.$date." ".$time.'</time><hr>Category:'.$row['Category'].'</figcaption></figure>';						
						echo'</p>'.'</div>'."<hr>";
						}
					}


			
			
			
			
			
			
			
			
			
			
			
			?>
	







	</div>
</body>

<?php	include_once('footer.php');
?>