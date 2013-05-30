<?php

//security initializations

//start the session
session_start();  

// if there isn't an active session associated with the session identifier that the user is presenting...
if (!isset($_SESSION['initiated'])){
	// ..regenerate it just to be sure to prevent session hijacking.. 
	session_regenerate_id();
	// ..and tell the session that it has now been initiated 
	$_SESSION['initiated'] = true;
}
//security static class
require_once __DIR__.'/classes/security.php';
//database config
require_once __DIR__.'/classes/config.php';
//PDO helper class
require_once __DIR__.'/classes/Database.php';
//portfolio item class
require_once __DIR__.'/classes/portfolio_item.php';
//frontPage class
//include script to handle query strings
require_once __DIR__.'/getController.php';
require_once __DIR__.'/classes/frontPage.php';
//manageContent class
require_once __DIR__.'/classes/manageContent.php';
//thumbnailCreator class
require_once __DIR__.'/classes/thumbnailCreator.php';
//services class
require_once __DIR__.'/classes/services.php';
//fix magic quotes script
require_once __DIR__.'/classes/fixMagicQuotes.php';
//set timezone
date_default_timezone_set('America/New_York');
//errors off in production 
ini_set('display_errors','on');  
//set home url to the value defined in the classes/config.php script
$home_url = HOME;

?>
<!DOCTYPE html>
<!--[if IEMobile 7 ]> <html dir="ltr" lang="en-US"class="no-js iem7"> <![endif]-->
<!--[if lt IE 7 ]> <html dir="ltr" lang="en-US" class="no-js ie6 oldie"> <![endif]-->
<!--[if IE 7 ]>    <html dir="ltr" lang="en-US" class="no-js ie7 oldie"> <![endif]-->
<!--[if IE 8 ]>    <html dir="ltr" lang="en-US" class="no-js ie8 oldie"> <![endif]-->
<!--[if (gte IE 9)|(gt IEMobile 7)|!(IEMobile)|!(IE)]><!--><html dir="ltr" lang="en-US" class="no-js"><!--<![endif]-->
<head>
  <?php include 'metaSwitcher.php';?>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" >
  <meta name="format-detection" content="telephone-no">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="google-site-verification" content="Nds3oqOK3IKwnf7t_GAfTxxD_VAlZE3UJeRchFhrWTs" />
  <meta name="msvalidate.01" content="9FC9C908E09D922876EE3E3E60F68D59" />
  <!--///////////////////////////////////////////////////////////////////////////////////////////////////
    //
    //    Styles
    //
    ///////////////////////////////////////////////////////////////////////////////////////////////////--> 
  <link href="<?php echo $home_url;?>css/style.css" rel="stylesheet" type="text/css" media='all'>
  <link href="<?php echo $home_url;?>css/flexslider.css" rel="stylesheet" type="text/css" media='all'>
  <link rel="stylesheet" href="<?php echo $home_url;?>css/jquery.slider.css" />
  <link rel="stylesheet" href="<?php echo $home_url;?>css/responsive.css" />
  <link rel="stylesheet" href="<?php echo $home_url;?>css/jquery-ui-1.10.2.custom.min.css" />
  <link rel="stylesheet" href="<?php echo $home_url;?>fonts/comforta.css" />
  <link href='http://fonts.googleapis.com/css?family=Cherry+Swash:400,700' rel='stylesheet' type='text/css'>
  <link rel="stylesheet"  media="max-width: 568px" href="http://code.jquery.com/mobile/1.3.0/jquery.mobile-1.3.0.min.css" />
<!--TdF-LPSDntSGmKMX2pQRUms6XrQ-->
  <!--///////////////////////////////////////////////////////////////////////////////////////////////////
    //
    //    Scripts
    //
    ///////////////////////////////////////////////////////////////////////////////////////////////////-->  
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js"></script>
    <!--<script src="http://code.jquery.com/mobile/1.3.0/jquery.mobile-1.3.0.min.js"></script>--> 
	<script type="text/javascript" src="<?php echo $home_url;?>js/modernizr.custom.47805.js"></script>
    <script type="text/javascript" src="<?php echo $home_url;?>js/jquery-validate.js"></script>
    <script type="text/javascript" src="<?php echo $home_url;?>js/jquery.flexslider.min.js"></script>
    <script type="text/javascript" src="<?php echo $home_url;?>js/jquery.slider.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
    <script src="<?php echo $home_url;?>js/jquery.isotope.min.js"></script>   
    <script src="<?php echo $home_url;?>js/main.js"></script>
    <script src="<?php echo $home_url;?>js/google-maps.js"></script>
</head>
<body class="<?php echo $page; // Show the name of the page as the body's class for selected link state ?>" onload="initialize();">
<?php include __DIR__.'/pages/header.php'; ?>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>     
  <section id="content">
     <?php
       // Include a php file from the pages folder with the same name as the $page variable
         include __DIR__."/pages/$page.php";  
      ?>
  </section>
  <?php include __DIR__.'/pages/footer.php'; ?>
  <script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-39201411-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script> 
<script src="//static.getclicky.com/js" type="text/javascript"></script>
<script type="text/javascript">try{ clicky.init(100596757); }catch(e){}</script>
<noscript><p><img alt="Clicky" width="1" height="1" src="//in.getclicky.com/100596757ns.gif" /></p></noscript>

</body>
</html>