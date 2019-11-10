 <html>
 <head><title></title>
 
  </head>
  <?php
	$user=$_POST['username'];		
	$pass=$_POST['password'];
	$success=login($user,$pass);
	if($success!=0){
		session_start();
		{
		$_SESSION['status']=1;
		$_SESSION['name']=$_POST['username'];
		$_SESSION['id']=$success;
		$_SESSION['xp']=$xp;
		}
		//$user=$_POST['username'];	
		header("Location: myprofile.php");
	}
	else{
		session_start();
		{
		$_SESSION['try']=1;
		header("Location:signin.php?signin=1");
		}
	}		
	function login($user,$pass){
		
		include_once("constant.php");

	$s=mysqli_connect($host,$dbUser,$dbPassword,$dbName)or die("Cannot connect to Db Server.");
	$c=mysqli_query($s,"select * from users");
	
	while($row=mysqli_fetch_array($c))
	{
		if($row['Email']==$user&&convert_uudecode($row['Password'])==$pass)
		{
			
			$xp=$row['Xp'];
			return $row['Id'];
		}
	}
	return 0;

}
	
  ?>
  