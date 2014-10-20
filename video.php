<?php

function compare($a, $b){
	global $array;
    return strcmp($array[$a]['date'], $array[$b]['date']);
}

$data = file_get_contents("http://gdata.youtube.com/feeds/api/users/tedxams/uploads");

$xml = new SimpleXMLElement($data);

$videosraw = $xml->entry;

foreach($videosraw as $videoraw){
	$videoid = substr($videoraw->id, 42);
	$date = new DateTime((string) $videoraw->published);
	$video = array(
		"id" => $videoid,
		"thumbnail" => "//img.youtube.com/vi/$videoid/hqdefault.jpg",
		"embed" => "//www.youtube.com/embed/$videoid",
		"name" => (string) $videoraw->title,
		"date" => $date->format('Y-m-d'),
		"description" => (string) $videoraw->content,
	);
	
	$videos[] = $video;
}

uksort($videos, "compare");

$videos = array_reverse($videos, true);
$i = 0;
$sizesWidth = array(190, 190, 120, 240, 120, 150, 120, 160, 120, 180); 
$sizesHeight = array(150, 150, 90, 182, 90, 120, 90, 90, 90, 120); 
$margins = array('', '', '', '', '', '110px', '', '260px', '', '');

while ($i < 10 ) {
	$video = $videos[$i];
	$size = $sizesWidth[$i];
	$margin = $margins[$i];
	$textsize = $size - 10;
	$textsize = $textsize . "px";
	$spansize = $size - 1;
	$spansize = $spansize . "px";
	$size = $size . "px";
	$height = $sizesHeight[$i];
	$height = $height . "px";
	
	$fontsize = $height / 13;
	$fontsize = $fontsize . "px";
	
	$html_videos .= <<<ENDHTML
		<a onClick="TINY.box.show({iframe:'{$video["embed"]}', width:720, height:420});" style="text-decoration:none;" href="#">
			
			<li class="videolistitem" id="video-{$video["id"]}">
				<span class="videotitle" style="position:absolute; width:$spansize; margin-left:1px; margin-top:1px;"><p style="width:$textsize; font-size:$fontsize; margin-left:auto; margin-right:auto;">{$video["name"]}</p></span>
				<div class="shadow">
					<img src="{$video["thumbnail"]}" alt="{$video["name"]}" class="videothumbnail" style="width:$size ; height:$height; margin-right:$margin;">
				</div>
				<!-- <p class="videodescription">{$video["description"]}</p> -->
			</li>
			
		</a>

ENDHTML;
	$i++;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>TEDxAmsterdam - YouTube</title>
	<link rel="stylesheet" type="text/css" href="styles/video.css">
	
	<script src="scripts/tinybox.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script type="text/javascript">
		function loadvid(id){
			$("#videodiv").html("<iframe class=\"youtube-player\" type=\"text/html\" width=\"640\" height=\"385\" src=\"http://www.youtube.com/embed/" + id + "\" frameborder=\"0\"></iframe>");
		}
	

	</script>
</head>
<body>
	<div id="fb-root"></div>
	<script src="//connect.facebook.net/en_US/all.js"></script>
	<script>
		window.fbAsyncInit = function() {
			FB.init({
			  appId      : '1501797163409511',
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
		
		FB.Canvas.setSize({ height: 800 });
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
		
		<ul id="videolist">
			<?=$html_videos?>
		</ul>
		
		<div class="footer">
			<a href="http://www.nubisonline.nl" target="_new">Nubis Digital Agency</a>
		</div>
		
	</div>
</body>
</html>