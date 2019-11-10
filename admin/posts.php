<?php
include_once("constant.php");
$posts=mysqli_query($s,"select * from posts");
echo"<table border='1'>";
echo"<tr><td>Id</td><td>Article</td><td>Related Photo</td><td>Related Video</td><td>Uploader</td><td>Uploaded Date</td><td>Uploaded Time</td><td>Uploader Email</td><td>Likes</td><td>Comments</td><td>Task</td></tr>";
while($row=mysqli_fetch_array($posts))
{
	echo"<tr><td>".$row['Id']."</td><td>".$row['Article']."</td><td>".'<img src="data:image/jpeg;base64,'.base64_encode($row['RelatedPhoto']).'"height="100" width="100" alt="No Photo"/>'."</td><td>".$row['RelatedVideo']."</td><td>".$row['Uploader']."</td><td>".$row['UploadedDate']."</td><td>".$row['UploadedTime']."</td><td>".$row['UploaderEmail']."</td><td>".$row['Likes']."</td><td>".$row['Comments']."</td><td><a href='deleteposts.php?id=".$row['Id']."'>Delete</td></tr>";
}	
?>