<?php
session_start();
if($_SESSION['admin']!=1)
{
	header("location: admin.php");
}
else
{
	echo"<h1>Welcome admin.</br>You can take control of users from here.</br>";
	//echo"<a href
	echo"Users:</br>";
	echo"<table border='1'>";
	echo"<tr><td><b>ID</td><td><b>User Name</td></tc><td><b>Email</td><td><b>Gender</td><td><b>Password</td><td><b>Level</td><td><b>Boss</td><td><b>Profile Photo</td><td><b>Xp</td><td><b>Joined Date</td><td><b>Joined Time</td><td><b>Posts</td><td><b>Task</td></tr>";
	include_once("constant.php");
	$r=mysqli_query($s,"select * from users");
	while($row=mysqli_fetch_array($r))
	{
	echo"<tr><td>".$row['Id']."</td><td>".$row['FullName']."</td><td>".$row['Email']."</td><td>".$row['Gender']."</td><td>".$row['Password']."</td><td>".$row['Level']."</td><td>".$row['Boss']."</td><td>".'<img src="../Images/ProfilePic/'.$row['Profilephoto'].'"height="100" width="100" id="container"/>'."</td><td>".$row['Xp']."</td><td>".$row['JoinedDate']."</td><td>".$row['JoinedTime']."</td><td>".$row['Posts']."</td><td><a href='deleteusersconfirm.php?id=".$row['Id']."'>KickOut</a><hr/><a href='warnusers.php?id=".$row['Id']."'>Warn User</a><hr/><a href='promote.php'>Promote User</a><hr/></td></tr>";
	}
	echo"</table>";
	/*
SELECT * FROM `users`


Id	FullName	Email	Gender	Password	Level	Boss	Profilephoto	Xp	JoinedDate	JoinedTime	Posts	
1	Viper	xeremoh@gmail.com		Truth never loose.				0	0000-00-00	00:00:00	2	
2	Viper	ss	Male	Truth never loose.				0	0000-00-00	00:00:00	2	
3	Viper	ss	Male	Truth never loose.	begineer			0	0000-00-00	00:00:00	2	
4	Viper	s	Male	Truth never loose.	Begineer			0	2017-07-07	00:00:00	2	
5	Viper	fd	Male	Truth never loose.				0	2017-07-08	04:59:50	2	
6	Viper	s	Male	Truth never loose.	Begineer			0	2017-07-08	05:02:35	2	
7	Viper	s	Male	Truth never loose.	Begineer			0	2017-07-08	05:02:35	2	
8	Viper	viper.incarnation@gmail.com	Male	password	Begineer			3000	2017-07-08	06:21:52	2	
9								200	0000-00-00	00:00:00	0	
10								200	0000-00-00	00:00:00	0	
11								200	0000-00-00	00:00:00	0	
12								200	0000-00-00	00:00:00	0	
13								200	0000-00-00	00:00:00	0	
14								200	0000-00-00	00:00:00	0	
15								200	0000-00-00	00:00:00	0	
16								200	0000-00-00	00:00:00	0	
17								200	0000-00-00	00:00:00	0	
18								0	0000-00-00	00:00:00	0	
19								200	0000-00-00	00:00:00	0	

	
	
	
	
*/}


?>