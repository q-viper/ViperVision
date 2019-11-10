<?php
	session_start();
	if($_SESSION['status']!=1)
		{
			header("Location: admin.php");
		}
	else
		{
			$_SESSION['admin']=1;
			$_SESSION['name']="viper";
		}


?>
<html>
	<head>
		<title>AdminPannel</title>
	</head>
	<body>
		<ul>
			<h1>Welcome admin.</h1></br>
			<h2><li><a href="manageusers.php">Manage users</br></a></li>
			<li><a href="messages.php">Check messages</br></a></li>
			<li><a href="posts.php">View Articles</br></a></li>
			<li><a href="../quiz/quizmanage.php">Quiz Manage</a></li></br>
			<li><a href="createtable.php">Create Tables</a></li>
			Google: https://www.google.com/webmasters/tools/submit-url

Yahoo: http://search.yahoo.com/info/submit.html

Bing: http://www.bing.com/webmaster/SubmitSitePage.aspx

Open Directory: http://www.dmoz.org/help/submit.html

Normally you will have to enter the full URL of your site (including the http:// prefix).

	</body>
</html>
