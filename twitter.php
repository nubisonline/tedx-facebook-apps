<?php

// Load Twitter class
require_once('twitteroauth/twitteroauth.php');

// Define constants
define('TWEET_LIMIT', 10);
define('TWITTER_USERNAME', 'TEDxAms');
define('CONSUMER_KEY', 'K2nn5RAwpOjAaw6ssp8569veg');
define('CONSUMER_SECRET', 'FkQlBnVbhmLmkQIRx9Cq7WBq3zgBJh3oGOztSFJUNkVy1w0c6V');
define('ACCESS_TOKEN', '2785640259-8zpIZv8RbGWhn8IinTutFiyiaVwOedeM71QsKqF');
define('ACCESS_TOKEN_SECRET', 'bhmpjQrjnTyIhSEr3El3GcuVqO33uXH7jIruvK4dHAwu3');

// Create the connection
$twitter = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, ACCESS_TOKEN, ACCESS_TOKEN_SECRET);

// Migrate over to SSL/TLS
$twitter->ssl_verifypeer = true;

// Load the Tweets
$tweets = $twitter->get('statuses/user_timeline', array('screen_name' => TWITTER_USERNAME, 'exclude_replies' => 'true', 'include_rts' => 'true', 'count' => TWEET_LIMIT));

if(!empty($tweets)) {
//echo count($tweets);
foreach($tweets as $tweet){

	$user = $tweet->user->name;
	$image = $tweet->user->profile_image_url;
	$text = $tweet->text;
	$id = $tweet->id_str;
	$datetime = $tweet->created_at;
	
	//Date parsing
	$now = new DateTime();  
	$stime = new DateTime($datetime);

	$diff = abs($now->format("U") - $stime->format("U"));
	
	if ($diff > 365*24*60*60) { // more than one year ago
		$years = floor($diff / (365*24*60*60));
		if ($years > 1) $date = $years . ' years ago';
		else $date = 'last year';
	}
	else if ($diff > 30*24*60*60) { // more than one month ago
		$months = floor($diff / (30*24*60*60));
		if ($months > 1) $date = $months . ' months ago';
		else $date = 'last month';
	}
	else if ($diff > 7*24*60*60) { // more than one week ago
		$months = floor($diff / (7*24*60*60));
		if ($weeks > 1) $date = $weeks . ' weeks ago';
		else $date = 'last week';
	}
	else if ($diff > 24*60*60) { // more than one day ago
		$days = floor($diff / (24*60*60));
		if ($days > 1) $date = $days . ' days ago';
		else $date = 'yesterday';
	}
	else if ($diff > 60*60) { // more than one hour ago
		$hours = floor($diff / (60*60));
		$date = $hours . ' hour' . ($hours > 1 ? 's' : '') . ' ago';
	}
	else if ($diff > 60) { // more than one minute ago
		$minutes = floor($diff / 60);
		if ($minutes > 3) $date = $minutes . ' minutes ago';
		else $date = 'just now';
	}
	
	//Activating links in tweets
	$text = preg_replace('/(https?:\/\/\S+)/','<a class="tweetlink" href="\1">\1</a>', $text);
	$text = preg_replace('/(^|\s)@(\w+)/','\1@<a class="tweetuser" href="http://twitter.com/\2">\2</a>', $text);
	$text = preg_replace('/(^|\s)#(\w+)/','\1#<a class="tweethashtag" href="http://search.twitter.com/search?q=%23\2">\2</a>', $text);
	
	//removing http: from profile image link, to load it by the same protocol as the page itself
	$image = preg_replace('/^http:/', '', $image);
	
	$html_tweets .= <<<ENDHTML
		<li class="tweet">
			<div class="profile_pic"><img src="$image" alt="@$user"></div>
			<div class="tweetright">
				<div class="user"><a href="http://twitter.com/$user">$user</a></div>
				<div class="text">$text</div>
				<div class="when"><a href="http://twitter.com/$user/status/$id">$date</a></div>
			</div>
		</li>
ENDHTML;
}
}


?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>TEDxAmsterdam - Twitter</title>
		<link rel="stylesheet" type="text/css" href="styles/twitter.css">
	</head>
<body>	
	<div id="fb-root"></div>
	
	<script src="//connect.facebook.net/en_US/all.js"></script>
	<script>
		window.fbAsyncInit = function() {
			FB.init({
			  appId      : '1520602604823970',
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
		
		<ul id="tweets">
			<?=$html_tweets?>
		</ul>
		
		<div class="footer">
			<a href="http://www.nubisonline.nl" target="_new">Nubis Digital Agency</a>
		</div>
		
	</div>
</body>
</html>