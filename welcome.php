<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>TEDxAmsterdam - Welcome</title>
	<link rel="stylesheet" type="text/css" href="styles/welcome.css">
	
</head>
<body>
	<div id="fb-root"></div>
	<script src="//connect.facebook.net/en_US/all.js"></script>
	<script>
		window.fbAsyncInit = function() {
			FB.init({
			  appId      : '882313365114454',
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
		
		FB.Canvas.setSize({ height: 1000 });
		
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
			<h1>TEDxAmsterdam 2011</h1>
			
			<p>In 2009 TED has created a program called TEDx. TEDx is a program of local, self-organized events that bring people together to share a TED-like experience.</p>

			<p>
				Our event is called TEDxAmsterdam, where x=independently organized TED event. At our TEDxAmsterdam event, TEDTalks video and live speakers will be combined to spark deep discussion and connection in a small group. 
				The TED Conference provides general guidance for the TEDx program, but individual TEDx events, including ours, are self-organized. Our team consisists of over 100 volunteers who all support TEDs motto “ideas worth spreading”.
			</p>	
			<p>
				TEDxAmsterdam is also heavily involved in other TEDx-events. In 2010 we 
				organized a TEDGlobal viewing party, a TEDxChange Dinner, a TEDxYouth 
				Event and a TEDxWomen Event at Sotheby’s.
			</p>
			<p>
				Please take a look at this video to learn more about TED and TEDx:
			</p>
			
			<iframe class="video" width="700" height="432" src="//www.youtube.com/embed/N-l1xtCMnpw" frameborder="0" allowfullscreen></iframe>
		
		</div>
		
		<div class="footer">
			<a href="http://www.nubisonline.nl" target="_new">Nubis Digital Agency</a>
		</div>
	
	</div>
</body>
</html>