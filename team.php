<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" type="text/css" href="styles/team.css">

	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="scripts/jQueryRotate.2.1.js"></script>
	
	<meta charset="utf-8">
	<title>TEDxAmsterdam - Team</title>
</head>
<body>
	<div id="fb-root"></div>
	<script src="//connect.facebook.net/en_US/all.js"></script>
	<script>
		window.fbAsyncInit = function() {
			FB.init({
			  appId      : '821083241276816',
			  xfbml      : true,
			  version    : 'v2.1'
			});
		};

		(function(d, s, id){
			var js, fjs = d.getElementsByTagName(s)[0];
			if (d.getElementById(id)) {return;}
			js = d.createElement(s); js.id = id;
			js.src = "//connect.facebook.net/en_US/sdk.js";
			fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));
		
		FB.Canvas.setSize({ height: 1830 });
	</script>
	
	<div id="wrapper">
	
		<img class="header" src="images/stream_header2.png" alt="header" usemap="#navmap">	
		<map name="navmap">
			<area shape="rect" coords="2, 181, 74, 210" target="_parent" href="https://www.facebook.com/pages/TEDx-Test/740706885983897?sk=app_882313365114454">
			<area shape="rect" coords="125, 181, 176, 210" target="_parent" href="https://www.facebook.com/pages/TEDx-Test/740706885983897?sk=app_821083241276816">
			<area shape="rect" coords="212, 164, 304, 193" target="_parent" href="https://www.facebook.com/pages/TEDx-Test/740706885983897?sk=app_400512663435911">
			<area shape="rect" coords="350, 181, 400, 210" target="_parent" href="https://www.facebook.com/pages/TEDx-Test/740706885983897?sk=app_1501797163409511">
			<area shape="rect" coords="458, 181, 515, 210" target="_parent" href="https://www.facebook.com/pages/TEDx-Test/740706885983897?sk=app_1520602604823970">
		</map>
		
		<div id="content">
			<h1>TEDxAmsterdam Team</h1>
			<p>Our <a href="http://www.tedxamsterdam.com/" class="text" target="_new">TEDxAmsterdam</a> 
				team consists of over 100 volunteers who all support TEDs motto &#34;ideas worth spreading&#34; 
				and are working on a diverse array of behind the scenes projects to help organize the event in November. 
				<a href="http://www.tedxamsterdam.com/" class="text" target="_new">TEDxAmsterdam</a> 
				is also heavily involved in other TEDx Events. In our "family" we have organized  
				<a href="http://www.ted.com/themes/a_taste_of_tedglobal_2010.html" class="text" target="_new">TEDGlobal</a> &amp; TED livestreams, 
				a <a href="http://www.tedxchange.nl/" class="text" target="_new">TEDxChange Dinner</a>, 
				<a href="http://www.tedxyouthamsterdam.nl/" class="text" target="_new">TEDxYouth@Amsterdam</a> and 
				<a href="http://www.tedxamsterdamwomen.nl/" class="text" target="_new">TEDxAmsterdamWomen</a> events. 
				Get to know our team members a little better!
			</p>
			<div id="photoShuffle">
				<?php include('team_members.php'); ?>
			</div>
		</div>
		
		<div class="footer">
			<a href="http://www.nubisonline.nl" target="_new">Nubis Digital Agency</a>
		</div>
	
	</div>
</body>
</html>