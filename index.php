<!DOCTYPE html>
<!--[if lt IE 7]> <html lang="en" class="no-js ie6"> <![endif]-->
<!--[if IE 7]>    <html lang="en" class="no-js ie7"> <![endif]-->
<!--[if IE 8]>    <html lang="en" class="no-js ie8"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class='no-js' lang='en'>
	<!--<![endif]-->
	<head>
		<meta charset='utf-8' />
		<meta content='IE=edge,chrome=1' http-equiv='X-UA-Compatible' />
		<title>Basic Example | MaxImage 2.0</title>
		
		<meta content='jQuery Plugin to make jQuery Cycle Plugin work as a fullscreen background image slideshow' name='description' />
		<meta content='Aaron Vanderzwan' name='author' />
		
		<meta name="distribution" content="global" />
		<meta name="language" content="en" />
		<meta content='width=device-width, initial-scale=1.0' name='viewport' />
		
		<link rel="stylesheet" href="lib/css/jquery.maximage.css?v=1.2" type="text/css" media="screen" charset="utf-8" />
		<link rel="stylesheet" href="lib/css/screen.css?v=1.2" type="text/css" media="screen" charset="utf-8" />
		
		<!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
		
		<style type="text/css" media="screen">			
			#maximage {
/*				position:fixed !important;*/
			}
			
			/*Set my logo in bottom left*/
			#logo {
				bottom:30px;
				height:auto;
				left:30px;
				position:absolute;
				width:34%;
				z-index:1000;
			}
			#logo img {
				width:100%;
			}

		div.mc-image {
			transform:scale(1.2);
			transition: opacity 1s ease-in-out;
			background-size: contain;			
		}

		#logo-container{
			position:absolute; 
			right:10px; 
			bottom:10px;
		}
		.logo{
			display:inline-block;
		}
		.logo img{
			
		}

		</style>
		
		<!--[if IE 6]>
			<style type="text/css" media="screen">
				/*I don't feel like messing with pngs for this browser... sorry*/
				#gradient {display:none;}
			</style>
		<![endif]-->
	</head>
	<body>
		<div id="maximage">
		<?php
			foreach (new RecursiveIteratorIterator(new RecursiveDirectoryIterator('images/slideshow/')) as $filename)
				{
					if (preg_match("/(jpg|gif|png)$/", $filename)){
						echo "<img src='$filename'/>	";	
					}
				}
		?>
		</div>

		<div id="logo-container">
			<div class="logo">
				<img src="images/logo/lazur.jpg">
			</div>
		</div>

		
		<script src='http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.js'></script>
		<script src="lib/js/jquery.cycle.all.js" type="text/javascript" charset="utf-8"></script>
		<script src="lib/js/jquery.maximage.js" type="text/javascript" charset="utf-8"></script>

		<script type="text/javascript" charset="utf-8">
			$(function(){
				// Trigger maximage
				jQuery('#maximage').maximage({
				cycleOptions: {
				fx: 'fade',
				speed: 'slow',
				'timeout': '10000',
				},
				fillElement: '#holder',
				
			});
			});
		</script>
		
  </body>
</html>
