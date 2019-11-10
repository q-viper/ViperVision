<html>
<head><title>Warn User</title>
</head>
<body>
<form method="post" action="warnusers.php">
Type the message:</br>
<textarea wrap="virtual"  rows="10" cols="100" maxlength="102400" name="message"></textarea>
<input type="submit" name="submit" value="send"/>
</form>
</body>
</html>
<?php
if(isset($_POST['message']))
{
	include_once("../constant.php");
	$id=$_GET['id'];
	$notify=mysqli_query($s,"insert into notifications )
}

 