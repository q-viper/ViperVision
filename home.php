<html>
	  <head><title>Home</title>
		<style>
			body{
				background-color:0000bf00f;
			}
			h1{
				top:00px;
				right:490px;
				position:absolute;
				text-shadow:10px 6px 44px;
				
			}
			div{
				color:red;
				position:absolute;
				top:00px;
				right:400px;
				text-shadow:10px 6px 44px;
			}
		</style>
		</head>
		<body>
		<?php
include_once("logo.php");
?>
		<h1>Welcome to our home page.</br>
		Choose what you want to do.</h1>
		
			<?php
				include("menu.php");
			?>
	
	
		</body>
</html>