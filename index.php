<?php
/*
Created by @justudinlab
2015-07-03 KST
*/
session_start(); 
?>
<!DOCTYPE html>
<html lang="en" xmlns:fb="http://www.facebook.com/2008/fbml">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="Merah Putih Generator App | Bangga Menjadi Warga Indonesia | Proud to be Indonesian!">
    <meta name="author" content="@justudinlab">
    <link rel="icon" href="merahputih.ico">

    <title>Merah Putih App | Bangga Menjadi Warga Indonesia | Proud to be Indonesian!</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
	<!-- Merah Putih CSS -->
    <link href="assets/css/merahputih.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="assets/css/sticky-footer-navbar.css" rel="stylesheet">
	 
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand" href="#">Merah Putih App<sup><i>Beta</i></sup></a>
        </div>
      </div>
    </nav>

	<?php if ($_SESSION['FBID']): ?>      <!--  After user login  -->
	<!-- Begin page content -->
    <div class="container">
      <div class="page-header">
        <h1>Hello <?php echo $_SESSION['FULLNAME'];?>!</h1>
      </div>
			<div id="MerahPutihImg">
			  <img src="fbphotopict/<?php echo $_SESSION['FBID']; ?>.jpg" id="img-rwf"/>
			  <div class="overlay1"></div>
			  <div class="overlay2"></div>
			</div>
			<div id="imgAja"></div>
			 <div class="caption">
			 <br/>
				<p><a href="setPP.php" class="btn btn-primary" role="button">Set as Profile Picture</a></p>
				<p><a href="download.php" class="btn btn-success" role="button">Download Image Here</a></p>
			  </div>		
		<br/>
		<p><b><a href="logout.php">Logout</a></b></p>
    <p><div class="fb-like" data-href="http://merah-putih.tk/" data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div></p>
    </div>
	<?php else: ?>     <!-- Before login --> 
	<!-- Begin page content -->
    <div class="container">
      <div class="page-header">
        <h2>To generate photo using merah putih app you must <a href="fbconfig.php" class="btn btn-primary" role="button">Login with Facebook</a></h2>
      </div>
      <p><div class="fb-like" data-href="http://merah-putih.tk/" data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div></p>
    </div>
	<?php endif ?> 
   

    <footer class="footer">
      <div class="container">
        <p class="text-muted">&copy; 2015 Merah Putih App | Bangga Menjadi Warga Indonesia | Proud to be Indonesian! Build with &hearts; by <a href="https://twitter.com/justudinlab">@justudinlab</a></p>
      </div>
    </footer>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="assets/js/ie10-viewport-bug-workaround.js"></script>
	<script type="text/javascript" src="assets/js/html2canvas.js"></script>
	<!--<script type="text/javascript" src="assets/js/red-white.js"></script>-->
  <script type="text/javascript">
html2canvas([document.getElementById('MerahPutihImg')], {
    onrendered: function (canvas) {
    document.getElementById('img-rwf').appendChild(canvas);
    var data = canvas.toDataURL('image/jpeg');
     //display 64bit imag
     var image = new Image();
    image.src = data;
    document.getElementById('imgAja').appendChild(image);
    document.getElementById('MerahPutihImg').style.display = 'none';
    $.post("saveimg.php", {
      imageData : data
    }, function(data) {
      
    });
  }
});
  </script>
  <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.3&appId=970337873016359";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
  </body>
</html>
