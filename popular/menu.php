<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/menu.css">
</head>
<body>

<ul>
  <?php
  session_start();
  include_once("constant.php");
  $userid=$_SESSION['id'];
    if($_SESSION['status']==1)
	{
  echo'<li><a class="" href="index.php?id='.$userid.'&home=esool reven hturt&progress=delta"><img src="logo.png" class="logo" alt="logo" height="70" width="70"></a></li>';
	echo'<li><a class="" href="index.php?id='.$userid.'&home=sniw syawla hturt&progress=positive">Home</a></li>';
	}
else
{
  echo'<li><a class="" href="index.php"><img src="logo.png" class="logo" alt="logo" height="70" width="70"></a></li>';
	echo'<li><a class="" href="index.php">Home</a></li>';

	}
	?>
  <li><a href="#news">Latest News</a></li>
  <li class="dropdown">
    <a href="#" class="dropbtn">Popular Articles</a>
    <div class="dropdown-content">
  <a href="popular/scitech.php">Science-Technology</a>
                  <a href="popular/traveltourism.php">Travel and Tourism</a>
                  <a href="popular/photography.php">Photograpghy</a>
                  <a href="popular/literature.php">Literature</a>
                  <a href="popular/researchpapers.php">Research Papers</a>
				  <a href="popular/history.php">History</a>
			    	<a href="popular/culture.php">Culture</a>
                  <a href="popular/sports.php">Sports</a>
                  <a href="popular/arts.php">Arts</a>
				  <a href="popular/educational.php">Educational</a>
    </div>
  </li>
  
   <li class="dropdown">
    <a href="#" class="dropbtn">Useful Links</a>
    <div class="dropdown-content">
			<a href="www.wikipedia.com">Wikipedia</a>
           <a href="www.youtube.com">Youtube</a>
            <a href="www.acedemia.edu">Acedemia</a>
             <a href="www.google.com">Google</a>
			 <li><?php session_start();
			 include_once('constant.php');
		if($_SESSION['status']==1)
		{
		$userid=$_SESSION['id'];
		$user=mysqli_query($s,"select * from users");
		while($row=mysqli_fetch_array($user))
		{
			if($userid==$row['Id'])
			{
				$id=$row['Id'];
				$notifications=$row['Notifications'];
				$messages=$row['UnseenMessage'];
			echo '<li class="dropdown"><a href="myprofile.php"><img src="data:image/jpeg;base64,'.base64_encode($row['Profilephoto']).'"height="80" width="80" id="pp"/></a><div class="dropdown-content"><a href="signin.php?signout=1">Signout</a><a href="#">Change Account</a><a href="showmessage.php?message=message&receiverid='.$id.'">Messages'.$messages.'</a><a href="notifications.php?action=show&userid='.$id.'">Notifications '.$notifications.'</a></</li><li id="fname">'.$row['FullName'].'</li>';

			}
			
		}
		
		
		
		}?></li>

</div>
</li>				 
</ul>



</body>

<!-- Mirrored from www.w3schools.com/css/tryit.asp?filename=trycss_dropdown_navbar by HTTrack Website Copier/3.x [XR&CO'2013], Fri, 08 Apr 2016 02:53:42 GMT -->
</html>
