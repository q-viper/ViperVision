<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
  
<title>Index</title>

<!-- CSS Plugins -->
<link rel="stylesheet" type="text/css" href="assets/plugins/minified/font-awesome.min.css">  
<link rel="stylesheet" type="text/css" href="assets/plugins/minified/slick.min.css"> 
<link rel="stylesheet" type="text/css" href="assets/plugins/minified/slick-theme.min.css"> 
<link rel="stylesheet" type="text/css" href="assets/plugins/minified/prettyPhoto.min.css">
<link rel="stylesheet" type="text/css" href="assets/plugins/css/magnific-popup.css">

<!-- CUSTOM CSS-->
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" id="color" type="text/css" href="assets/colors/red.css">
<style>



</style>

</head>

<body class="home right-sidebar">
  <div id="page" class="site">
    <div class="site-inner">
    <a class="skip-link screen-reader-text" href="#"></a>
    <header id="masthead" class="site-header">
      <div class="site-menu">
        <div class="container">
          <div class="site-branding">
            <div class="site-logo">
              <a href="#"><img src="assets/uploads/logo.jpg" alt="header-logo" height="80" width="80"></a>
            </div>
            <div id="site-header">
              <h1 class="site-title"><a href="#">ViperVision</a></h1>
              <p class="site-description">Just another sight to connect, change world.</p>
            </div> <!-- #site-header -->
          </div><!--.site-branding-->
          <nav id="site-navigation" class="main-navigation">
            <button class="menu-toggle"></button>
            <ul id="primary-menu" class="menu nav-menu">
              <li class="current-menu-item"><a href="index.php" class="fa fa-home">Home</a></li>
            <!--  -->
              <li class="menu-item-has-children"><a href="populararticles.php">Popular Articles</a>
                <ul class="sub-menu">
                  <li><a href="latest-news.php" class="fa fa-newspaper-o">Latest News</a></li>
				  <li><a href="newsfeed.php?content=Science-Technology&news=virtual"  class="fa fa-space-shuttle">Science-Technology</a></li>
                 <li><a href="newsfeed.php?news=virtual&content=Travel and Tourism" class="fa fa-automobile">Travel and Tourism</a></li>
                  <li><a href="newsfeed.php?content=Photography&news=virtual" class="fa fa-camera-retro">Photograpghy</a></li>
                  <li><a href="newsfeed.php?content=Literature&news=virtual" class="fa fa-creative-commons">Literature</a></li>
                  <li><a href="newsfeed.php?content=Research&news=virtual" class="fa fa-binoculars">Research</a></li>
				  <li><a href="newsfeed.php?content=History&news=virtual" class="fa fa-history">History</a></li>
				  <li><a href="newsfeed.php?content=Meditiation&news=virtual" class="fa fa-meh-o">Meditiation</a></li>
				  <li><a href="newsfeed.php?content=Culture&news=virtual" class="fa fa-hand-lizard-o">Culture</a></li>
                  <li><a href="newsfeed.php?content=Sports&news=virtual" class="fa fa-soccer-ball-o">Sports</a></li>
                  <li><a href="newsfeed.php?content=Arts&news=virtual" class="fa fa-eye-slash">Arts</a></li>
				  <li><a href="newsfeed.php?content=Educational&news=virtual" class="fa fa-book">Educational</a></li>
				  <li><a href="newsfeed.php?content=Others&news=virtual" class="fa fa-code-fork">Others</a></li>	

				</ul><!-- .sub-menu -->
				<li><a href="contact-us.php">Contact us</a></li>
				<li><a href="about-us.php">About us</a></li>
              </li>
        <!--      <li class="menu-item-has-children"><a href="#">Study Materials</a>
                <ul class="sub-menu">
                  <li><a href="computerscience.php">Computer Science</a></li>
                  <li><a href="physics.php">Physics</a></li>
                  <li><a href="chemistry.php">Chemistry</a></li>
                  <li><a href="mathematics.php">Mathematics</a></li>
                </ul><!-- .sub-menu -->
              </li>
			  <li class="menu-item-has-children"><?php
			 include_once('constant.php');
		if($_GET['home']=="sniw syawla hturt"&&$_GET['progress']=="positive" or $_GET['home']=="esool reven hturt"&&$_GET['progress']=="delta")
		{
		$userid=$_GET['id'];
		$user=mysqli_query($s,"select * from users");
		while($row=mysqli_fetch_array($user))
		{
			if($userid==$row['Id'])
			{
				$id=$row['Id'];
				$notifications=$row['Notifications'];
				$messages=$row['UnseenMessage'];
			echo '<a href="aboutuser.php"><img src="'.$ppdir.$row['Profilephoto'].'"height="50" width="80" id="pp"/><hr>'.$row['FullName'].'</a><ul class="sub-menu"><li><a href="notifications.php?action=show&userid='.$id.'" class="fa fa-bell-o">Notifications '.$notifications.'</a></li><li><a href="showmessage.php?message=message&receiverid='.$id.'" class="fa fa-inbox">Messages'.$messages.'</a></li><li><a href="signin.php?signout=1" class="fa fa-sign-out">Signout</a></li><li><a href="#">Change Account</a></li></ul>';

			}
			
		}
		
		}?>
		<!--<canvas id="canvas" width="100" height="100"
style="background-color:">
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
</script>-->
		</li>
			                
            </ul><!-- .menu/.nav-menu -->
			

          </nav><!--.main-navigation-->
        </div><!-- .container -->
      </div><!-- .site-menu -->
    </header><!--.site-header-->

    <div id="content" class="site-content">

      <section id="main-slider" data-effect="cubic-bezier(0.680, 0, 0.265, 1)" data-slick='{"slidesToShow": 1, "slidesToScroll": 1, "infinite": true, "speed": 800, "dots": false, "arrows":true, "autoplay": true, "fade": true }'>
        <div class="slider-item" style="background-image:url('assets/uploads/medcon.jpg');">
          <div class="black-overlay"></div><!-- .black-overlay -->
          <div class="main-slider-contents container align-center">
            <div class="layer-1">
              <h5>Publish your inner Thoughts.</h5>
            </div><!-- .layer-1 -->
            <div class="layer-2">
              <h2>Develop Consciousness.</h2>
            </div><!-- .layer-2 -->
            <a href="signup.php" class="btn btn-red">Join Us Today</a>
          </div><!-- .main-slider-contents -->
        </div><!-- .slider-item -->
        <div class="slider-item" style="background-image:url('assets/uploads/slider1.jpg');">
            <div class="black-overlay"></div><!-- .black-overlay -->
            <div class="main-slider-contents container align-center">
              <div class="layer-1">
                <h5>Find essential Tools.</h5>
              </div><!-- .layer-1 -->
              <div class="layer-2">
                <h2>Develop Career</h2>
              </div><!-- .layer-2 -->
              <a href="signup.php" class="btn btn-red">Register Now</a>
            </div><!-- .main-slider-contents -->
        </div><!-- .slider-item -->
		<div class="slider-item" style="background-image:url('assets/uploads/it.jpg');">
            <div class="black-overlay"></div><!-- .black-overlay -->
            <div class="main-slider-contents container align-center">
              <div class="layer-1">
                <h5>Find Technical Minds.</h5>
              </div><!-- .layer-1 -->
              <div class="layer-2">
                <h2>Share yourself.</h2>
              </div><!-- .layer-2 -->
              <a href="signup.php" class="btn btn-red">Register Now</a>
            </div><!-- .main-slider-contents -->
        </div><!-- .slider-item -->
		<div class="slider-item" style="background-image:url('assets/uploads/tablet.jpg');">
            <div class="black-overlay"></div><!-- .black-overlay -->
            <div class="main-slider-contents container align-center">
              <div class="layer-1">
                <h5>Easy Learning.</h5>
              </div><!-- .layer-1 -->
              <div class="layer-2">
                <h2>Meet Experts</h2>
              </div><!-- .layer-2 -->
              <a href="signup.php" class="btn btn-red">Register Now</a>
            </div><!-- .main-slider-contents -->
        </div><!-- .slider-item -->
		<div class="slider-item" style="background-image:url('assets/uploads/slider1.jpg');">
            <div class="black-overlay"></div><!-- .black-overlay -->
            <div class="main-slider-contents container align-center">
              <div class="layer-1">
                <h5>Find essential Tools.</h5>
              </div><!-- .layer-1 -->
              <div class="layer-2">
                <h2>Develop Career</h2>
              </div><!-- .layer-2 -->
              <a href="signup.php" class="btn btn-red">Register Now</a>
            </div><!-- .main-slider-contents -->
        </div><!-- .slider-item -->
		<div class="slider-item" style="background-image:url('assets/uploads/f2.jpg');">
            <div class="black-overlay"></div><!-- .black-overlay -->
            <div class="main-slider-contents container align-center">
              <div class="layer-1">
                <h5>Find tourism places.</h5>
              </div><!-- .layer-1 -->
              <div class="layer-2">
                <h2>Easy Guiding</h2>
              </div><!-- .layer-2 -->
              <a href="signup.php" class="btn btn-red">Register Now</a>
            </div><!-- .main-slider-contents -->
        </div><!-- .slider-item -->
      </section><!-- #main-slider -->
	  
      <section id="latest-news">
        <div class="container bg-black">
          <header class="entry-header">
            <h2 class="entry-title">Latest News</h2>
          </header><!-- .entry-header -->

          <div class="entry-content three-columns">
            <div class="row">
              <div class="column-wrapper">
                <div class="image-wrapper">
				<?php
				include_once('constant.php');
					$post=mysqli_query($s,"select * from posts ORDER BY UploadedDate DESC,UploadedTime DESC");
					while($row=mysqli_fetch_array($post))
					{
					echo'<a href="#"><img src="'.$postdir.$row['RelatedFile']. '"alt=""></a>';
					
                echo'</div><!-- .image-wrapper -->';

                echo'<div class="post-title">';
                  echo'<h5><a href="newsfeed.php?content='.$row['Category'].'&news=virtual">'.$row['Title'].'</a></h5>';
                echo'</div><!-- .post-title -->';

                echo'<div class="post-desc">';
                  echo'<p>'.$row['Article'].'</p>';
                echo'</div><!-- .post-desc -->';
                echo'<div class="entry-meta">';
                  echo'<span class="posted-on"><a href="#"><time>'.$row['UploadedDate'].' '.$row['UploadedTime'].'</time></a></span>';
                  echo'<span class="comments"><a href="comment.php?pid='.$row['Id'].'"><i class="fa fa-comments"></i>'.$row['Comments'].'</a></span>';
               echo'</div><!-- .entry-meta -->';
					echo'<a href="newsfeed.php?content='.$row['Category'].'&news=virtual" class="btn btn-red">More</a>';break;}?>
              </div><!-- .column-wrapper -->
              <div class="column-wrapper">
                <div class="image-wrapper">
                  <?php
				  include_once('constant.php');
				  $user=mysqli_query($s,'select * from users ORDER BY Xp DESC');
				  while($row=mysqli_fetch_array($user))
				  {
				  echo'<a href="aboutuser.php?view=negative&id='.$row['Id'].'"><img src="'.$ppdir.$row['Profilephoto'].'"alt=""></a>';
					
				echo'</div><!-- .image-wrapper -->

                <div class="post-title">';
                 echo'<h5><a href="admin/topusers.php">Top Users</a></br>1.'.$row['FullName'].'</h5>
                </div><!-- .post-title -->

                <div class="post-desc">
                  <p>'.$row['Bio'].'</p>
                </div><!-- .post-desc -->
                <div class="entry-meta">
                  <span class="posted-on"><a href="#"><time><p id="demo"></p><script>var d = new Date();document.getElementById("demo").innerHTML = d.toString();</script></time></a></span>
                  <span class="comments"><a href="#"><i class="fa fa-users"></i>'.$row['Followers'].' <i class="fa fa-trophy">'.$row['Xp'].'</i></a></span>';break;}?>
                </div><!-- .entry-meta -->
                <a href="#" class="btn btn-red">Read more</a>
              </div><!-- .column-wrapper -->
              <div class="column-wrapper">
                <div class="image-wrapper">
            <?php     
			//$postdir='Images/PostPic/';
			$post=mysqli_query($s,"select * from posts ORDER BY Likes DESC");
                echo'<div class="post-title">';
					while($row=mysqli_fetch_array($post))
					{
					echo'<a href="#"><img src="'.$postdir.$row['RelatedFile']. '"alt=""></a>';
                echo'</div><!-- .image-wrapper -->';
			     echo'<h5><a href="#"><u>Top Post Ever</u><hr>'.$row['Title'].'</a></h5>';
                echo'</div><!-- .post-title -->

                <div class="post-desc">';
			
				
                  echo'<p>'.$row['Article'].'</p>
                </div><!-- .post-desc -->
                <div class="entry-meta">
                  <span class="posted-on"><a href="#"><time>'.$row['UploadedDate'].' '.$row['UploadedTime'].'</time></a></span>
					<span class="comments"><a href="comments.php>pid='.$row['Id'].'"><i class="fa fa-comments"></i>'.$row['Comments'].' <i class="fa fa-thumbs-o-up"></i>'.$row['Likes'].'</a></span>';break;}?>
                </div><!-- .entry-meta -->
                <a href="#" class="btn btn-red">Read more</a>
              </div><!-- .column-wrapper -->
            </div><!-- .row -->
          </div><!-- .entry-content -->
        </div><!-- .container -->
      </section><!-- #latest-news -->

      <section id="parallax">
        <div class="container bg-black">
          <header class="entry-header">
            <h2 class="entry-title">About Admin</h2>
          </header><!-- .entry-header -->

          <div class="entry-content">
            <div class="parallax-background align-center" style="background-image:url('assets/uploads/viper.jpg');">
              <div class="parallax-contents">
                <h1>Viper</h1>
                <p>Never wait for chance to change the world, just make it happen.</p>
              </div><!-- .parallax-contents -->
            </div><!-- .parallax-background -->
          </div><!-- .entry-content -->
        </div><!-- .container -->
      </section><!-- #parallax -->
        
    </div><!--.site-content-->

    <footer id="colophon" class="site-footer" role="contentinfo">
      <div class="container page-section four-columns">
        <div class="column-wrapper">
          <div id="text-1" class="widget widget_text">
            <h2 class="widget-title">Vision of ViperVision</h2>
            <div class="textwidget">
             You are a dust particle from space, stars but you must not fade away like that. Share yourself with us today.
            </div><!-- .textwidget -->
          </div><!-- .widget_text -->
        </div><!-- .column-wrapper -->

        <div class="column-wrapper">
          <div id="popular-track-1" class="widget widget_popular_tracks">
            <h2 class="widget-title">Must Read</h2>
            <ul>
              <li class="has-post-thumbnail">
                <div class="track-image"><a href="#"><img src="assets/uploads/cq.jpg"></a></div>
                <div class="track-desc">
                  <h3><a href="#">CARL SAGAN</a></h3>
                  <span>CARL SAGAN</span>
                  <span>1,892,250 views</span>
                </div><!-- .track-desc -->
              </li>
              <li class="has-post-thumbnail">
                <div class="track-image"><a href="#"><img src="assets/uploads/bg.jpg"></a></div>
                <div class="track-desc">
                  <h3><a href="mp3_single_half.html">Brian Greene</a></h3>
                  <span>Brian Greene</span>
                  <span>1,892,250 views</span>
                </div><!-- .track-desc -->
              </li>
              <li class="has-post-thumbnail">
                <div class="track-image"><a href="#"><img src="assets/uploads/cb.jpg"></a></div>
                <div class="track-desc">
                  <h3><a href="mp3_single_half.html">Universe</a></h3>
                  <span>User</span>
                  <span>1,892,250 views</span>
                </div><!-- .track-desc -->
              </li>
            </ul>
          </div><!-- .widget_text -->
        </div><!-- .column-wrapper -->

        <div class="column-wrapper">
          <div id="nav_menu-1" class="widget widget_nav_menu">
            <h2 class="widget-title">Quick links</h2>
            <ul class="menu">
              <li><a href="#">Home</a></li>
              <li><a href="#">Popular Articles</a></li>
              <li><a href="#">My Account</a></li>
              <li><a href="#">Top News</a></li>
              <li><a href="#">Top Users</a></li>
              <li><a href="#">Contact us</a></li>
            </ul><!-- .menu -->
          </div><!-- .widget_nav_menu -->
        </div><!-- .column-wrapper -->

        <div class="column-wrapper">
          <div id="subscribe1" class="widget widget_subscribe_newsletter">
            <h2 class="widget-title">Subscribe</h2>
            <form>
              <input type="text" name="newsletter" placeholder="Email...">
              <button type="submit"><i class="fa fa-check"></i></button>
            </form>
          </div><!-- .widget_nav_menu -->

          <div id="social-icons-1" class="widget widget_social_icons">
            <ul class="social-icons">
              <li><a href="https://www.facebook.com">Facebook</a></li>
              <li><a href="https://www.twitter.com">Twitter</a></li>
              <li><a href="https://www.instagram.com">Instagram</a></li>
              <li><a href="https://www.plus.google.com">Facebook</a></li>
            </ul>
          </div>
        </div><!-- .column-wrapper -->
      </div><!-- .container -->

      <div class="bottom-footer">
        <div class="container">
          <div class="site-info">
            © Theme Designed by ViperVision <a href="#" target="_blank" class="site-title">The Viper</a>
          </div><!-- .site-info -->
        </div><!-- .container -->
      </div><!-- .bottom-footer -->
    </footer><!-- .site-footer -->
    <div class="backtotop"><i class="fa fa-angle-up"></i></div>
    </div><!--.site-inner -->
  </div><!-- .site -->
  
<!-- JS Plugins -->
<script type="text/javascript" src="assets/plugins/minified/jquery-1.12.4.min.js"></script>
<script type="text/javascript" src="assets/plugins/minified/slick.min.js"></script>

<!-- JS Custom -->
<script type="text/javascript" src="assets/js/custom.js"></script>

</body>
</html>
