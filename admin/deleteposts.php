<?php
echo"<h1>Dear Admin Do You Really Want To Delete This User Post?</br>";
echo"<a href='posts.php'><button>Cancel</button></a>"."            "."<a href=deleteposts.php?delete=".$_GET['id']."><button>Yes sure.</button></a>";
if($_GET['delete']!=NULL)
{
	include_once("constant.php");
	$delete=$_GET['delete'];
	$u=mysqli_query($s,"delete from posts where Id='$delete'") or die("error in deletion.");
if($u==1)
{
	header("location:posts.php");
}	
}
?>