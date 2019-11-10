<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8"> 
		  <meta name="viewport" content="width=device-width, initial-scale=1">
<title>Create Table</title>
Possible tables:<br>
<ul><li><a href="createtable.php?create=users">users</a></li>
<li><a href="createtable.php?create=posts">posts</a></li>
<li><a href="createtable.php?create=messagedetails">messagedetails</a></li>
<li><a href="createtable.php?create=feedback">feedback</a></li>
<li><a href="createtable.php?create=followdetails">followdetails</a></li>
<li><a href="createtable.php?create=commentdetails">commentdetails</a></li>
<li><a href="createtable.php?create=liker">liker</a></li>
<li><a href="createtable.php?create=notifications">notifications</a></li>



<?php
include_once("constant.php");
if($_GET['create']=="users")
{
$so="CREATE TABLE users( ID int NOT NULL, FullName varchar(255), Email varchar(255), Number bigint(255),
Gender varchar(255),
Password varchar(255),
Level varchar(255),
Profilephoto varchar(255),
Xp bigint(255),
JoinedDate date,
JoinedTime time,
Posts mediumint(9),
Followers bigint(20),
Following int(11),
UnseenMessage bigint(50),
Notifications bigint(255),
Bio mediumtext,
DOB date,
Profession varchar(255),
Qual varchar(255),
Country varchar(255),
City varchar(255),
SQ1 text,
Ans1 varchar(255),
SQ2 text,
Ans2 varchar(255),
SQ3 text,
Ans3 varchar(255),
PRIMARY KEY(Id))";
if(mysqli_query($s,$so))
	echo'<h1> Table added succesfully.</h1>';
}
if($_GET['create']=="posts")
{
	$so="CREATE TABLE posts(Id int NOT NULL,Title varchar(255),Article varchar(255),RelatedFile varchar(255),Uploader varchar(255),UploaderEmail varchar(255),UploaderId mediumint,UploadedDate date,UploadedTime time,Likes mediumint,Comments mediumint,Category varchar(25),Visibility varchar(255),PRIMARY KEY(Id)";
	if(mysqli_query($s,$so))
	echo'<h1> Table added succesfully.</h1>';	
}
if($_GET['create']=="messagedetails")
{
	$so="CREATE TABLE messagedetails(Id int NOT NULL,
	PostId int(11),
	Commenter int(11),
	PostBy int(11),
	Comment varchar(1024),
	CommenterName varchar(30),
	DateTime datetime,
	PRIMARY KEY(Id))";
if(mysqli_query($s,$so))
	echo'<h1> Table added succesfully.</h1>';
	}
if($_GET['create']=="feedback")
{
	$so="CREATE TABLE feedback(Id int, FeedBack varchar(255),Sender varchar(30),PRIMARY KEY(Id))";
if(mysqli_query($s,$so))
	echo'<h1> Table added succesfully.</h1>';
	
	}
if($_GET['create']=="followdetails")
{
	$so="CREATE TABLE messagedetails(Id int, FolloId int(11),FollowEmail varchar(40),FollowerId int(11),FollowerEmail varchar(11),PRIMARY KEY(Id))";
if(mysqli_query($s,$so))
	echo'<h1> Table added succesfully.</h1>';
	}
if($_GET['create']=="commentdetails")
{
	$so="CREATE TABLE commentdetails(Id int,PostId int(11),Commenter int(11),PostBy int(11),Comment varchar(1024),CommenterName varchar(30),DateTime datetime,PRIMARY KEY(Id))";
	if(mysqli_query($s,$so))
	echo'<h1> Table added succesfully.</h1>';
}
if($_GET['create']=="liker")
{
	$so="CREATE TABLE liker(Id int,PostOf int(11),LikedBy int(11),Likes int(11),PostId int(11),PRIMARY KEY(Id))";
if(mysqli_query($s,$so))
	echo'<h1> Table added succesfully.</h1>';
	}
if($_GET['create']=="notifications")
{
	$so="CREATE TABLE notifications(Id int,ById int(11),ToId int(11),Reason varchar(30),Article varchar(1024),DateTime datetime,PRIMARY KEY(Id))";
	if(mysqli_query($s,$so))
	echo'<h1> Table added succesfully.</h1>';
}
?>