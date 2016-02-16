<!DOCTYPE html>
<?php 
/**
 * The role of this file is to include the correct content for the website
 * and handle the behaviour of the site
 */
?>
<html lang='fr'>
	<head>
		<meta charset='UTF-8'>
		<meta name='viewport' content='width=device-width'/>
	
		<link rel='icon' type='image/png' href='favicon.png' />
		<!--[if IE]><link rel="shortcut icon" type="image/x-icon" href="favicon.ico" /><![endif]-->
		<link rel='shortcut icon' href=''>
		<link rel='apple-touch-icon' href=''>
		
		<!--[if lt IE 9]>
			<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		
		<title>Chattr - Public Web Chat</title>
		<meta name='description' content=''>
  		<meta name='author' content='Philippe Girard'>
		
		<?php //include the right stylesheet
		if($_GET['request'] == ""):?>
		<link rel='stylesheet' href='css/homepage.css' /><?php else:?>
		<link rel='stylesheet' href='css/convo.css' /><?php endif;?>
		
	<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-42047710-4', 'auto');
  ga('send', 'pageview');

</script>
	</head>
	<body touch-action="auto" cz-shortcut-listen="true">
		<?php 
			# check if a conversation requested or the homepage
			if($_GET['request'] == "") {
				// display home page
				include_once "views/homepage.phtml";
			}
			else {
				// display conversation page
		?>
			<?php 
			# get url params
			$urlParams = $_GET['request'];
			$urlParams = str_replace("GET /","",$urlParams);
			$urlParams = str_replace(" HTTP/1.1","", $urlParams);
			
			# debug line 
			$debugUrl = ["controllers/getHashtagContent.php", "controller/postMessage.php"];
			if(in_array($urlParams, $debugUrl)) {
				# query the degub url
				require_once $urlParams;	
			}
			else {
				
				# normal flow : add the hashtag for the conversation
				$urlParams = "#" . $urlParams;
				
				include_once "views/chattr.phtml";
			}
			?>		
		<?php }?>
	</body>
		
</html>