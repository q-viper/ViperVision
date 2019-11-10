<!DOCTYPE html>

<html lang="en">
  <head>
    <meta charset="utf-8"> 
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="css/menu.css">
<link rel="stylesheet" type="text/css" href="assets/plugins/minified/font-awesome.min.css">  

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
	//echo'<li><a class="" href="index.php?id='.$userid.'&home=sniw syawla hturt&progress=positive">Home</a></li>';
	}
else
{
  echo'<li><a class="" href="index.php"><img src="logo.png" class="logo" alt="logo" height="70" width="70"></a></li>';
	echo'<li><a href="index.php" class="fa fa-home">Home</a></li>';

	}
	?>
  <li><a href="#news" class="fa fa-newspaper-o">Latest News</a></li>
  <li class="dropdown">
    <a href="#" class="dropbtn">Popular Articles</a>
    <div class="dropdown-content">
				<a href="newsfeed.php?content=Science-Technology&news=virtual" class="fa fa-space-shuttle">Science-Technology</a>
                  <a href="newsfeed.php?news=virtual&content=Travel and Tourism" class="fa fa-automobile">Travel and Tourism</a>
                  <a href="newsfeed.php?content=Photography&news=virtual" class="fa fa-camera-retro">Photograpghy</a>
                  <a href="newsfeed.php?content=Literature&news=virtual" class="fa fa-creative-commons">Literature</a>
                  <a href="newsfeed.php?content=Research&news=virtual" class="fa fa-binoculars">Research</a>
				  <a href="newsfeed.php?content=History&news=virtual" class="fa fa-history">History</a>
				  <a href="newsfeed.php?content=Meditiation&news=virtual" class="fa fa-meh-o">Meditiation</a>
				  <a href="newsfeed.php?content=Culture&news=virtual" class="fa fa-hand-lizard-o">Culture</a>
                  <a href="newsfeed.php?content=Sports&news=virtual" class="fa fa-soccer-ball-o">Sports</a>
                  <a href="newsfeed.php?content=Arts&news=virtual" class="fa fa-eye-slash">Arts</a>
				  <a href="newsfeed.php?content=Educational&news=virtual" class="fa fa-book">Educational</a>
				  <a href="newsfeed.php?content=Others&news=virtual" class="fa fa-code-fork">Others</a>
    </div>
  </li>
   <li class="dropdown">
    <a href="#" class="dropbtn">Useful Links</a>
    <div class="dropdown-content">
			<a href="www.wikipedia.com" class="fa fa-wikipedia-w">Wikipedia</a>
           <a href="www.youtube.com" class="fa fa-youtube">Youtube</a>
            <a href="www.acedemia.edu">Acedemia</a>
             <a href="www.google.com" class="fa fa-google">Google</a>
			 <li></li>
  <canvas id="canvas" width="100" height="100"
style="background-color:#333">
</canvas>


<script>
var canvas = document.getElementById("canvas");
var ctx = canvas.getContext("2d");
var radius = canvas.height / 2;
ctx.translate(radius, radius);
radius = radius * 0.90
setInterval(drawClock, 1000);

function drawClock() {
  drawFace(ctx, radius);
  drawNumbers(ctx, radius);
  drawTime(ctx, radius);
}

function drawFace(ctx, radius) {
  var grad;
  ctx.beginPath();
  ctx.arc(0, 0, radius, 0, 2*Math.PI);
  ctx.fillStyle = 'white';
  ctx.fill();
  grad = ctx.createRadialGradient(0,0,radius*0.95, 0,0,radius*1.05);
  grad.addColorStop(0, '#333');
  grad.addColorStop(0.5, 'white');
  grad.addColorStop(1, '#333');
  ctx.strokeStyle = grad;
  ctx.lineWidth = radius*0.1;
  ctx.stroke();
  ctx.beginPath();
  ctx.arc(0, 0, radius*0.1, 0, 2*Math.PI);
  ctx.fillStyle = '#333';
  ctx.fill();
}

function drawNumbers(ctx, radius) {
  var ang;
  var num;
  ctx.font = radius*0.15 + "px arial";
  ctx.textBaseline="middle";
  ctx.textAlign="center";
  for(num = 1; num < 13; num++){
    ang = num * Math.PI / 6;
    ctx.rotate(ang);
    ctx.translate(0, -radius*0.85);
    ctx.rotate(-ang);
    ctx.fillText(num.toString(), 0, 0);
    ctx.rotate(ang);
    ctx.translate(0, radius*0.85);
    ctx.rotate(-ang);
  }
}

function drawTime(ctx, radius){
    var now = new Date();
    var hour = now.getHours();
    var minute = now.getMinutes();
    var second = now.getSeconds();
    //hour
    hour=hour%12;
    hour=(hour*Math.PI/6)+
    (minute*Math.PI/(6*60))+
    (second*Math.PI/(360*60));
    drawHand(ctx, hour, radius*0.5, radius*0.07);
    //minute
    minute=(minute*Math.PI/30)+(second*Math.PI/(30*60));
    drawHand(ctx, minute, radius*0.8, radius*0.07);
    // second
    second=(second*Math.PI/30);
    drawHand(ctx, second, radius*0.9, radius*0.02);
}

function drawHand(ctx, pos, length, width) {
    ctx.beginPath();
    ctx.lineWidth = width;
    ctx.lineCap = "round";
    ctx.moveTo(0,0);
    ctx.rotate(pos);
    ctx.lineTo(0, -length);
    ctx.stroke();
    ctx.rotate(-pos);
}

</script>
  
  <?php session_start();
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
			echo '<li class="dropdown"><a href="myprofile.php"><img src="'.$ppdir.$row['Profilephoto'].'"height="80" width="80" id="pp"/></a><div class="dropdown-content"><a href="signin.php?signout=1" class="fa fa-sign-out">Signout</a><a href="changepassword.php">Change Password</a><a href="showmessage.php?fprint='.md5($row['Email']).'&message=message&receiverid='.md5($id).'" class="fa fa-inbox">Messages'.$messages.'</a><a href="notifications.php?action=show&userid='.$id.'" class="fa fa-bell-o">Notifications '.$notifications.'</a></</li><li id="fname"><a href="myprofile.php">'.$row['FullName'].'</a></li>';

			}
			
		}
		
		
		
		}?>

</div>
</li>	

			 
</ul>



</body>

</html>
