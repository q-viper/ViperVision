<!DOCTYPE html>
<html>
<head><title>Quiz</title>
<link rel="stylesheet" type="text/css" href="../css/menu.css">
<link rel="stylesheet" type="text/css" href="../assets/plugins/minified/font-awesome.min.css">  

</head>
<body>
<?php 
session_start();
include_once("../constant.php");
include_once("../menu.php");
$_SESSION['content']=substr($_GET['content'],1,strlen($content)-1);
if($_POST['count']<=5)
{
$content=$_SESSION['content'];
$quizt=mysqli_query($s,"select * from questions where Category='$content'");
$num=mysqli_num_rows($quizt);
$n=rand(1,$num);
while($row=mysqli_fetch_array($quizt))
{
	if($row['Id']==$n)
	{
	echo"<form method='post' action='quizstarted.php'>";
	echo '<h2 align="center">'. $row['Question'].'</h2><p align="center">By: '.$row['Author'].'</p><hr>';
	echo'<input type="radio" name="ans" value="Ans1"/><p>'.$row['Ans1'].'<br/>';
	echo'<input type="radio" name="ans" value="Ans2"/><p>'.$row['Ans2'].'<br/>';
	echo'<input type="radio" name="ans" value="Ans3"/><p>'.$row['Ans3'].'<br/>';	
	echo'<input type="radio" name="ans" value="Ans4"/><p>'.$row['Ans4'].'<br/>';
	$_SESSION['ans']=$row['Cans'];
	echo'<input type="submit" name="submit" value="Check">';
	}
	/*if($row['Id']==rand(1,$num))
	{
	echo '<h2 align="center">'. $row['Question'].'</h2><p align="center">By: '.$row['Author'].'</p><hr>';
	echo'<input type="radio" name="ans" value="Ans1"/><p>'.$row['Ans1'].'<br/>';
	echo'<input type="radio" name="ans" value="Ans2"/><p>'.$row['Ans2'].'<br/>';
	echo'<input type="radio" name="ans" value="Ans3"/><p>'.$row['Ans3'].'<br/>';	
	echo'<input type="radio" name="ans" value="Ans4"/><p>'.$row['Ans4'].'<br/>';
	}*/
}
}

?>




</body>
</html>