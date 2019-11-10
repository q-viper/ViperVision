<html>
	<head>
		<title>
			Admin pannel


		</title>
	</head>
	<body>
		<h1>Welcome to admin page.</h1></br>
		<h2>Please fill form to reach admin pannel.</h2></br>
		<div id="form">
			<form method="post">
				<table>
					<tr><td>Full Name or Email</td><td>:</td><td><input type="text" name="username" placeholder="Please enter admin name or email."/></td></tr>
					<tr><td>Password</td><td>:</td><td><input type="password" name="password" placeholder="Please enter your password."/></td></tr>
				</table>
				<input type="submit" name="submit" value="Signin"/>
			</form>
</html>
<?php
include_once("constant.php");
if(isset($_POST["submit"]))
{
	$host="localhost";
	$dbUser="root";
	$dbPassword="";
	$dbName="vipervision";
	
	$s=mysqli_connect($host,$dbUser,$dbPassword,$dbName)or die("Cannot connect to Db Server.");
	$name=$_POST['username'];
	$password=$_POST['password'];
	$c=mysqli_query($s,"select * from admin");
	while($row=mysqli_fetch_array($c))
	{
		if($row['Full Name']==$name&&$row['Password']==$password)
		{
			session_start();
			$_SESSION['status']=1;
		
			header("Location: adminpannel.php");
		}
		else
		{
			echo"error";
			header("location: admin.php");
		}
	}
	
	
	
}


?>