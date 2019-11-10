<html>
<head>
<title>Quiz</title>
<link rel="stylesheet" type="text/css" href="../css/menu.css">
<link rel="stylesheet" type="text/css" href="../assets/plugins/minified/font-awesome.min.css">  
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript">
			
</script>
</head>
<body>
<?php include_once("../menu.php");?>

</br>
<div>
<h2 style="color:black">Choose your field to play quiz.</h2></br>
 <li class="dropdown">
    <a href="#" class="dropbtn"><p class="fa fa-code" style="color:white;background-color:black;font-size:24">Coding</p></a>
    <div class="dropdown-content">
	
		<a href="quizstart.php?content='html'">HTML</a>		
		<a href="quizstart.php?content='php'">PHP</a>		
		<a href="quizstart.php?content='css'">CSS</a>		
		<a href="quizstart.php?content='js'">JS</a>		
		<a href="quizstart.php?content='c++'">C++</a>	
	</div>
</li>
<li class="dropdown">
	<a href="#" class="dropbtn"><p class="fa fa-space-shuttle" style="font-size:24;color:white;background-color:green">Science And Technology</p></a>
    <div class="dropdown-content">
		<a href="quizstart.php?content='physics'">Physics</a>		
		<a href="quizstart.php?content='astrology'">Astronomy</a>		
		<a href="quizstart.php?content='chemistry'">Chemestry</a>
		<a href="quizstart.php?content='biology'">Biology</a>
		<a href="quizstart.php?content='mixture'">Mixture</a>	
	</div>
</li>
<li class="dropdown">
<a href="#" class="dropbtn"><p class="fa fa-automobile" style="font-size:24;color:white;background-color:grey">Travel And Tourism</p></a>	
	<div class="dropdown-content">
		<a href="quizstart.php?content='geography'">Geography</a>
		<a href="quizstart.php?content='location'">Location</a>		
		
		
    </div>
  </li></br>
  </br></br></br></br></br></br></br></br>
  </br></br></br></br></br></br></br></br>
  </div><hr>

<?php include_once("../footer.php");?>
</body>
</html>

