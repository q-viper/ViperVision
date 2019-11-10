<?php
if(isset($_GET['id']))
{
include_once("constant.php");
$delete=$_GET['id'];
$u=mysqli_query($s,"delete from users where Id='$delete'") or die("error in deletion.");
if($u)
	header("location:manageusers.php");
	}
?>