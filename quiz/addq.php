<html>
<body>
<form method="post">
Enter question:</br>
<textarea wrap="virtual" name="question" placeholder="Question lies here."rows="10" cols="50" maxlength="102400"></textarea>
Category of Question is:</br>
<select name="category">
<option name="html">HTML</option>
<option name="php">PHP</option>
<option name="css">CSS</option>
<option name="JS">JS</option>
<option name="c++">C++</option>
<option name="physics">Physics</option>
<option name="astrology">Astronomy</option>
<option name="chemistry">Chemistry</option>
<option name="biology">Biology</option>
<option name="mixture">Mixture</option>
<option name="geography">Geography</option>
<option name="location">Location</option>
</select></br>
Enter options:</br>
a:<input type="text" name="ans1"/></br>
b:<input type="text" name="ans2"/></br>
c:<input type="text" name="ans3"/></br>
d:<input type="text" name="ans4"/></br>
The right answer is:
<input type="text" name="ans"/></br>
<input type="submit" name="submit"/>
</form>
</body>
</html>
<?php
if(isset($_POST['submit']))
{
session_start();
include_once("../constant.php");
$q=$_POST["question"];
$a1=$_POST["ans1"];
$a2=$_POST["ans2"];
$a3=$_POST["ans3"];
$a4=$_POST["ans4"];
$a=$_POST["ans"];
$category=$_POST["category"];
$author=$_SESSION['name'];

$c="insert into questions(Question,Ans1,Ans2,Ans3,Ans4,CAns,Author,Category) values('$q','$a1','$a2','$a3','$a4','$a','$author','$category')";
if(mysqli_query($s,$c))
{
	header("location:quizmanage.php");
}
}
?>