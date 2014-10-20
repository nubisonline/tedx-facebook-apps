<!DOCTYPE HTML>
<html>
<head>	
	<link rel="stylesheet" type="text/css" href="styles/team_members.css">
	
	<script>		
		done = false;
		
		totalPersons = 18;
		randomPhoto = 0;
		
		favorite_talks = new Array(
			/*  0 */"",
			/*  1 */"http://video.ted.com/talk/stream/2008/Blank/BenjaminZander_2008-320k.mp4",
			/*  2 */"http://video.ted.com/talk/stream/2010W/Blank/DeborahRhodes_2010W-320k.mp4",
			/*  3 */"http://video.ted.com/talk/stream/2010W/Blank/DeborahRhodes_2010W-320k.mp4",
			/*  4 */"http://video.ted.com/talk/stream/2010W/Blank/DeborahRhodes_2010W-320k.mp4",
			/*  5 */"http://video.ted.com/talk/stream/2009/Blank/ElizabethGilbert_2009-320k.mp4",
			/*  6 */"http://video.ted.com/talk/stream/2008/Blank/GarrettLisi_2008-320k.mp4",
			/*  7 */"http://video.ted.com/talk/stream/2008/Blank/BenjaminZander_2008-320k.mp4",
			/*  8 */"http://video.ted.com/talk/stream/2009X/Blank/SimonSinek_2009X-320k.mp4",
			/*  9 */"http://video.ted.com/talk/stream/2009G/Blank/WilliamKamkwamba_2009G-320k.mp4",
			/* 10 */"http://video.ted.com/talk/stream/2010G/Blank/ChristienMeindertsma_2010G-320k.mp4",
			/* 11 */"http://video.ted.com/talk/stream/2010X/Blank/NigelMarsh_2010X-320k.mp4",
			/* 12 */"http://video.ted.com/talk/stream/2009/Blank/ElizabethGilbert_2009-320k.mp4",
			/* 13 */"http://video.ted.com/talk/stream/2009G/Blank/ChimamandaAdichie_2009G-320k.mp4",
			/* 14 */"http://video.ted.com/talk/stream/2006/Blank/UrsusWehrli_2006-320k.mp4",
			/* 15 */"http://video.ted.com/talk/stream/2011S/Blank/RichardSeymour_2011S-320k.mp4",
			/* 16 */"http://video.ted.com/talk/stream/2009G/Blank/AlaindeBotton_2009G-320k.mp4",
			/* 17 */"http://video.ted.com/talk/stream/2009G/Blank/AlaindeBotton_2009G-320k.mp4",
			/* 18 */"http://video.ted.com/talk/stream/2010G/Blank/SheenaIyengar_2010G-320k.mp4"
		);
		
		
		randomPhoto = Math.floor(Math.random() * totalPersons) + 1;
		
		$(document).ready(function() {
			shuffleStack();
		});
		
		function shuffleStack() {
			randomPhoto = Math.floor(Math.random() * totalPersons) + 1;
			$("#photoHolder").empty();
			$("#textHolder p").empty();
			$("#textHolder").hide();
			$("#videoTextHolder").hide();
			$("#videoHolder").empty();
			
			for (i = 1; i < totalPersons + 1; i++) {
				url = '//www.nubisonline.nl/facebook_apps/tedxamsterdam_bart/headshots/ted_' + i + '.jpg';
				random1 = Math.floor(135 * Math.random()) + 15;
				random2 = Math.floor(160 * Math.random()) + 5;
				html = '<div class="imgShadow" id="' + i + '" style="margin-left:' + random1 + 'px; margin-top:' + random2 + 'px;"><img class="bgPhoto" src="' + url + '" alt="photo"></div>';
				$("#photoHolder").append(html);
				$("#" + i).rotate(60 - Math.floor( 121 * Math.random()));
				$("#" + i).show();
			}
			setTimeout(removeOne(1), 1000);
		}
		
		function removeOne(i) {
			if (i < totalPersons + 1) {
				if(i != randomPhoto) {
					setTimeout(function(){
							$("#" + i).fadeOut(40, "linear", function () {
							$("#" + i).remove();
							removeOne(i + 1);
						});
					}, 10);
				}
				else {
					removeOne(i + 1);
				}
			}
			else {
				displayPhoto(randomPhoto);
				displayText(randomPhoto);
			}
		}
		
		function displayPhoto(i) {
			$("#" + i).rotate({ animateTo:0,easing: $.easing.easeInOutExpo })
			
			$("#" + i).animate({
				marginTop: "0px",
				marginLeft: "0px",
				width: "240px",
				height: "360px"
			  }, 1000 );
			  
			  $("img.bgPhoto").animate({
				width: "230px",
				height: "350px"
			  }, 1000 );
			 
			
		}
		function displayText(i) {
			$("#videoTextHolder").fadeIn(700);
			$("#textHolder").show();
			$("#textHolder p").load("bios/" +  i + ".html");
			$("#videoHolder").append(
				'<video width="auto" height="360px" controls name="media"><source src="' + favorite_talks[i] + '"type="video/mp4"></video>'
			);
			$("#shuffle").fadeIn("slow");
			done = true;
		}
		
		function displayChosenPhoto(i) {
			$("#photoHolder").empty();
			$("#textHolder p").empty();
			$("#textHolder").hide();
			$("#videoTextHolder").hide();
			$("#videoHolder").empty();
			
			FB.Canvas.scrollTo(0, 450);
			
			url = '//www.nubisonline.nl/facebook_apps/tedxamsterdam_bart/headshots/ted_' + i + '.jpg';
			html = '<div class="imgShadow" id="' + i + '"><img class="bgPhoto" src="' + url + '" alt="photo"></div>';
			$("#photoHolder").append(html);
			$("#" + i).show();
			
			displayPhoto(i);
			displayText(i);
		}
		
		
	</script>	
</head>

<body>
	<div id="shuffleButton">
		<img src="images/shuffle.png" alt="Shuffle" onClick="shuffleStack()">
	</div>
	
	<div id="bios">
		<div id="photoHolder">
			
		</div>
		<div id="textHolder">
			<p></p>
		</div>
	</div>
	
	<div id="videoTextHolder">
		<h2>Favorite TED talk</h2>
	</div>
	
	<div id="videoHolder">
		
	</div>
	
	<div id="all_members">
		<h2>All Members</h2>
		
		<?php
			for ($i = 1; $i < 18 + 1; $i++) {
				$url = "//www.nubisonline.nl/facebook_apps/tedxamsterdam_bart/headshots/ted_$i.jpg";
				echo '<img class="clickable" width="120" height="180" src="' . $url . '" onclick="displayChosenPhoto(' . $i . ')">';
			}
		?>
	</div>

</body>
</html>

<?php 
	function drawImage($idNr) {
		$url = "//www.nubisonline.nl/facebook_apps/tedxamsterdam_bart/headshots/ted_$idNr.jpg";
		echo '<div class="imgShadow" id="' . $idNr . '" style="margin-left:' . rand(40,250) . 'px; margin-top:' . rand(15,150) . 'px;"><img class="bgPhoto" src="' . $url . '" alt="photo"></div>';
	}
?>
