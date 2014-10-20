<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>TEDxAmsterdam - Livestream</title>
	<link rel="stylesheet" type="text/css" href="styles/livestream.css">
	
</head>
<body>
	<div id="fb-root"></div>
	<script src="//connect.facebook.net/en_US/all.js"></script>
	<script>
		window.fbAsyncInit = function() {
			FB.init({
			  appId      : '400512663435911',
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
		
		FB.Canvas.setSize({ height: 1200 });
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
			<div class="video">
				<iframe class="video" width="750" height="450" src="//cdn.livestream.com/embed/fellermedia?layout=4&color=0xe7e7e7&autoPlay=false&mute=false&iconColorOver=0x888888&iconColor=0x777777&allowchat=true&height=300&width=500" frameborder="0" scrolling="no"></iframe>
			</div>
			<div class="fb-comments" data-href="https://www.nubisonline.nl/facebook_apps/tedxamsterdam/stream.php" data-num-posts="5" data-width="765"></div>
		
		</div>
		
		<div class="footer">
			<a href="http://www.nubisonline.nl" target="_new">Nubis Digital Agency</a>
		</div>
		
	</div>
</body>
</html>