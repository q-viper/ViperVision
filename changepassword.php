<?php
include_once('constant.php');
include_once('menu.php');
if($_POST['email']=="")
echo'<form method="post" action="changepassword.php">
<h2>Please enter the email you used during signup process:</h2>
<input type="text" name="email" value="email"/>
<input type="submit" value="Change" name="change"/>
</form>';
if(isset($_POST['email']))
{
	$cemail=$_POST['email'];
	$users=mysqli_query($s,"select * from users");
	while($row=mysqli_fetch_array($users))
	{
		if($row['Email']==$cemail)
		{
			echo'<h1>Please choose the question you used during signup process and give right answer to change password.</h1><form method="post" action="changepassword.php?sq=check"><table><tr><td>Security Question 1</td><td>:</td><td class="fa fa-lock"><select name="q1"><option value="fathername">What is your Father name?</option><option value="birthname">What is you birth name?</option><option value="lovername">What is your first lover name?</option><option value="favsinger">Which is your favorite singer?</option><option value="teacher">Who is your favroite teacher?</option></td></tr>
				<tr><td>Answer</td><td>:</td><td class="fa fa-arrow-right"><input type="text" name="ans1"/></td></tr>
				<tr><td>Security Question 2</td><td>:</td><td class="fa fa-lock"><select name="q2"><option value="mothername">What is your Mother name?</option><option value="birthname">What is you birth name?</option><option value="lovername">What is your first lover name?</option><option value="favsinger">Which is your favorite singer?</option><option value="teacher">Who is your favroite teacher?</option></td></tr>
				<tr><td>Answer</td><td>:</td><td class="fa fa-arrow-right"><input type="text" name="ans2"/></td></tr>
				<tr><td>Security Question 3</td><td>:</td><td class="fa fa-lock"><select name="q3"><option value="gmothername">What is your GrandMother name?</option><option value="birthname">What is you birth name?</option><option value="bfname">What is your best friend name?</option><option value="favactor">Which is your favorite actor?</option><option value="teacher">Who is your favroite teacher?</option></td></tr>
				<tr><td>Answer</td><td>:</td><td class="fa fa-arrow-right"><input type="text" name="ans3"/></td></tr></table><input type="submit" name="submit" value="Submit"/></form>';
		}
		
	}
	
}


?>






