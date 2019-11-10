
<!DOCTYPE html>

<html lang="en-us">
<head>
    <meta charset="utf-8" />
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Viper Vision</title>
   <link rel="stylesheet" type="text/css" href="assets/plugins/minified/font-awesome.min.css">  
<link rel="stylesheet" type="text/css" href="css/signup.css">
</head>
<style>


</style>
<body>
  <form method="post" action="signupprocess.php" enctype="multipart/form-data">
  <div id="form">
  <?php
  session_start();
  session_destroy();
include("menu.php");
?>
 <div id="header">
        <h1>Welcome to Viper Vision! We are glad that you choosed us.</h1>
        <p>Please, fill the form below.</br><a href="signin.php" class="fa fa-link">Click here if you have an account.</a><?php
if($_GET['retry']==1)
	echo"<div class='fa fa-exclamation'>Please use email that hasnot been used yet.</div>";
?><p>
    </div>
		 <table>
				<tr><td>Full Name</td><td>:</td><td class="fa fa-file-text"><input type="text" name="fname" placeholder="Please enter valid full name." required="required"></td></tr>
				<tr><td>Password</td><td>:</td><td class="fa fa-file-code-o"><input type="password" name="password" placeholder="Please enter valid pasword." required="required"></td></tr>
				<tr><td>Sex</td><td>:</td><td  class="fa fa-female"><input type="radio" name="g" value="Female"/>Female <div  class="fa fa-male "><input type="radio" name="g" value="Male"/>Male</div></td></tr>
				<tr><td>Contact no</td><td>:</td><td class="fa fa-mobile-phone"><input type="number" name="contact" placeholder="Please enter your contact number." required="required"/></td></tr>
				<tr><td>Country</td><td>:</td><td  class="fa fa-globe"><input type="text" name="country" placeholder="Please enter country" required="required"/></td></tr>
				<tr><td>City</td><td>:</td><td><input type="text" name="city" placeholder="Please enter city name." required="required"/></td></tr>
				<tr><td>Interest</td><td>:</td><td><input type="text" name="interest" placeholder="Please enter your interest." required="required"/></td></tr>
				<tr><td>E-mail</td><td>:</td><td class="fa fa-mail-forward"><input type="text" name="email" placeholder="Please enter your e-mail." required="required"/></td></tr>
				<tr><td>DOB</td><td>:</td><td class="fa fa-calendar-times-o"><input type="date" name="dob"required="required"/></td></tr>
				<tr><td>Profession</td><td>:</td><td><input type="text" name="profession" placeholder="Please enter your profession." required="required"/></td></tr>
				<tr><td>Qualification</td><td>:</td><td class="fa fa-graduation-cap"><input type="text" name="qual" placeholder="Please enter your qualification." required="required"/></td></tr>
				<tr><td>Security Question 1</td><td>:</td><td class="fa fa-lock"><select name="q1"><option value="fathername">What is your Father's name?</option><option value="birthname">What is you birth name?</option><option value="lovername">What is your first lover name?</option><option value="favsinger">Which is your favorite singer?</option><option value="teacher">Who is your favroite teacher?</option></td></tr>
				<tr><td>Answer</td><td>:</td><td class="fa fa-arrow-right"><input type="text" name="ans1"/></td></tr>
				<tr><td>Security Question 2</td><td>:</td><td class="fa fa-lock"><select name="q2"><option value="mothername">What is your Mother's name?</option><option value="birthname">What is you birth name?</option><option value="lovername">What is your first lover name?</option><option value="favsinger">Which is your favorite singer?</option><option value="teacher">Who is your favroite teacher?</option></td></tr>
				<tr><td>Answer</td><td>:</td><td class="fa fa-arrow-right"><input type="text" name="ans2"/></td></tr>
				<tr><td>Security Question 3</td><td>:</td><td class="fa fa-lock"><select name="q3"><option value="gmothername">What is your GrandMother's name?</option><option value="birthname">What is you birth name?</option><option value="bfname">What is your best friend name?</option><option value="favactor">Which is your favorite actor?</option><option value="teacher">Who is your favroite teacher?</option></td></tr>
				<tr><td>Answer</td><td>:</td><td class="fa fa-arrow-right"><input type="text" name="ans3"/></td></tr>
				
				
				<!--<tr><td>What do you See?</td><td>:</td><td><p id="demo"></p><script>document.getElementById("demo").innerHTML = Math.random();</script><input type="varchar" name="check" cols="30" rows="30" placeholder="Type here what do you see"/></td></tr>
			--></table>
			<label class="title">Profile Photo:<i class="fa fa-camera"></i></label>
			<input type="file" name="file" required="required"></br>
			<input type="hidden" name="MAX_FILE_SIZE" value="102400000000">

			<h4>Explain about yourself.</h4><br/>
            <textarea wrap="virtual" name="feed" rows="10" cols="50" maxlength="102400" required="required"></textarea></br>
			<button  class="fa fa-sign-in"><input type="submit" name="submit" value="save" id="submit"></button>
		</form>
		
		</div>
<?php include_once("footer.php");?>
</body>
</html>
