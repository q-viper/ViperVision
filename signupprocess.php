<?php
	if(isset($_POST["submit"]))
	{
		$q1=$_POST['q1'];
		$q2=$_POST['q2'];
		$q3=$_POST['q3'];
		$ans1=$_POST['ans1'];
		$ans2=$_POST['ans2'];
		$ans3=$_POST['ans3'];
		$fname=$_POST["fname"];
		include_once("constant.php");
		$email=$_POST["email"];
		$joinedtime=date("h:i:sa");
		$joineddate= date("Y/m/d");
		$level="Begineer";
		$xp=0;
		//$upload_dir='uploads/';
		$country=$_POST["country"];
		$city=$_POST["city"];
		$interest=$_POST["interest"];
		$profession=$_POST["profession"];
		$qual=$_POST["qual"];
		$name=$_FILES['file']['name'];
		$size=$_FILES['file']['size'];
		$type=$_FILES['file']['type'];
		$loc=$_FILES['file']['tmp_name'];
		if($size>$_POST['MAX_FILE_SIZE'])
			echo"File is bigger";
		$extension=substr(basename($name),strpos(basename($name),".")+1);
		$allowedExtension=array("jpg","bmp","gif","png","jpeg");
		if(!in_array($extension,$allowedExtension))
			echo "Not allowed extension used";
		$name=$fname.time().$name;
		$ndir='Images/ProfilePic/';
		$filepath=$ndir.$name;
		$password=convert_uuencode($_POST["password"]);
		$gender=$_POST["g"];
		$number=$_POST["contact"];
		$dob=$_POST["dob"];
		$bio=$_POST["feed"];
		$emailcheck=mysqli_query($s,"select * from users");
		while($row=mysqli_fetch_array($emailcheck))
		{
		if($row['Email']==$email)
		{
			header("location:signup.php?retry=1");
			//echo"<h1>already used</h1>";
		}
	}
	if(move_uploaded_file($loc,$filepath))
	{
	$r=mysqli_query($s,"insert into users(FullName,Email,Number,Gender,Password,Level,Profilephoto,Xp,JoinedDate,JoinedTime,Bio,DOB,Profession,Qual,Country,City,SQ1,Ans1,SQ2,Ans2,SQ3,Ans3) values('$fname','$email','$number','$gender','$password','$level','$name','$xp','$joineddate','$joinedtime','$bio','$dob','$profession','$qual','$country','$city','$q1','$ans1','$q2','$ans2','$q3','$ans3')")or die("err");
	if($r==1)
	{
		$id=mysqli_query($s,"select * from users");
		while($row=mysqli_fetch_array($id))
		{
			if($row['Email']==$email)
			{
				$uid=($row['Id']);
			}
		}
		//$email=convert_uuencode($email);
		header("Location: begin.php?begin=true&uid=$uid&tname=$user&email=$email");
	}
	else
		echo "<h2>Please retry.</h2>";
	
	
	
	}
	}
	?>

