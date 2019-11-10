<?php
include_once("constant.php");
	$s=mysqli_connect($host,$dbUser,$dbPassword,$dbName)or die("Cannot connect to Db Server.");
	$c=mysqli_query($s,"select * from users");
	while($row=mysqli_fetch_array($c))
	{
		$xp=$row['Xp'];
		if($xp>15000)
		{
			$level="Motivator";
		}
		elseif($xp>5000)
		{
			$level="Achiever";
		}
		elseif($xp>2000)
		{
			$level="ActionTaker";
		}
		elseif($xp>500)
		{
			$level="Dreamer";
			$new=mysqli_query($s,"select * from begineer");
			while($row=mysqli_fetch_array($new))
			{
				if($row['Xp']>500)
				{
					$dreamer=mysqli_query($s,"SELECT Id,FullName,Email,Gender,Number,Password,Country,City,DOB,Profession,Qualification,Interest,Bio,Photo,Posts,Xp FROM begineer WHERE 1");
					$delete=mysqli_query($s,"DELETE FROM begineer WHERE 1");
				}
				
			}

		}
		else
		{
			$level="Begineer";
	}
	}
	$r=mysqli_query($s,"Insert into users(Level) Where Values('$level')");


?>