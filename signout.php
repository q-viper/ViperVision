
  <html>
	  <head>
		<title> Login form </title>
		
	  </head>
	 <link rel="stylesheet" type="text/css" href="css/signout.css">

  <body>
  <?php
  
		session_start();
		if($_REQUEST['signin.php']==0){
			session_destroy();
		}
		
	?>
		<?php	include_once('footer.php');
?>
		
	


