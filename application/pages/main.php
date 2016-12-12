<?php
	// include other files
	include_once DIR_CORE.'lib.php';
	include_once DIR_CORE.'page.php';
	include_once DIR_CORE.'detectmobilebrowser.php';
	
	// pre-computations
	$jquery_folder = browser_only_supports_jquery1() ? 'jquery-old' : 'jquery';
	$page = new Page();
	$page->css->addBower('bootstrap/dist/css/bootstrap', 'owlcarousel/owl-carousel/owl.carousel', 'owlcarousel/owl-carousel/owl.theme', 'owlcarousel/owl-carousel/owl.transitions' /*, 'bootstrap/dist/css/bootstrap-theme',*/);
	$page->css->add('styles');
	$page->js->addBower("{$jquery_folder}/dist/jquery", 'bootstrap/dist/js/bootstrap', 'angular/angular', 'angular-route/angular-route', 'lodash/dist/lodash', 'owlcarousel/owl-carousel/owl.carousel', 'jquery-ui/jquery-ui');
	$page->js->add('lib/jquery.ui.touch-punch', 'prototypes-extensions', 'app');
	if( preg_match("/IEMobile\/10\.0/", $_SERVER['HTTP_USER_AGENT'], $matches) )
		$page->js->add('lib/ie10-viewport-bug-workaround');
	
	header('Content-Type: text/html; charset=UTF-8');
?><!DOCTYPE html>
<html lang="en">
<head>
	<title>Lionel Luchez</title>
	<link rel="SHORTCUT ICON" href="<?php echo $page->image('favicon.png'); ?>" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge;" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/>
	<meta name="keywords" content="Programming,Web-developer"/>
	<meta name="description" content="Website from where you can view and download my achievements"/>
	<meta name="robots" content="index,follow"/>
<?php
	$page->write_header();
?>
</head>
<body ng-app="myApp">
<?php
	function create_image($img, $title, $css = '')
	{
		global $page;
		return "<img src=\"".$page->image($img)."\" class=\"{$css}\" alt=\"{$title}\" title=\"{$title}\" />";
	}
?>
	<nav class="navbar _navbar-fixed-top">
		<div class="container container-fluid">
			<!-- Panel with all logos -->
			<div class="logos-panel">
				<?php echo create_image('logos/html5.png', 'HTML5', 'logo-html5 slide-right'); ?> 
				<?php echo create_image('logos/css3.png', 'CSS3', 'logo-css3 slide-right'); ?> 
				<?php echo create_image('logos/js.png', 'JavaScript', 'logo-js slide-right'); ?> 
				<?php echo create_image('logos/bower.png', 'Bower', 'logo-bower slide-right'); ?> 
				<?php echo create_image('logos/nodejs.png', 'NodeJS', 'logo-nodejs slide-right'); ?> 
				<?php echo create_image('logos/npm.png', 'NPM', 'logo-npm slide-right'); ?> 
				<?php echo create_image('logos/angular.png', 'AngularJS', 'logo-angular slide-right'); ?> 
				<?php echo create_image('logos/bootstrap.png', 'Bootstrap', 'logo-bootstrap slide-right'); ?> 
				<?php echo create_image('logos/php.png', 'PHP', 'logo-php slide-left'); ?> 
				<?php echo create_image('logos/mysql.png', 'MySQL', 'logo-mysql slide-left'); ?> 
				<?php echo create_image('logos/mssql.png', 'MSSQL', 'logo-mssql slide-left'); ?> 
				<?php echo create_image('logos/vs.png', 'Visual Studio', 'logo-vs slide-left'); ?> 
				<?php echo create_image('logos/java.png', 'Java', 'logo-java slide-left'); ?> 
			</div>
			<!-- Menu Top bar -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-top-menu" aria-expanded="false">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				</button>
				<a href="#/" class="navbar-brand navbar-logo">
					<?php echo create_image('lluchez_127x180.jpg', 'Navigate to home page'); ?> 
					<span class="navbar-text">Lionel Luchez</span>
				</a>
			</div>
			<!-- Foldable menu -->
			<div class="collapse navbar-collapse" id="navbar-top-menu">
				<ul class="nav navbar-nav navbar-right">
					<li class="dropdown">
						<a class="dropdown-toggle -with-icon" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Achievements <span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="#/programs" class="with-icon icon-programs">Programs</a></li>
							<li><a href="#/websites" class="with-icon icon-websites">Websites</a></li>
							<li role="separator" class="divider"></li>
							<li><a href="#/istria" class="with-icon icon-istria">Project Istria</a></li>
							<li role="separator" class="divider"></li>
							<li><a href="#/drawings" class="with-icon icon-drawings">Drawings</a></li>
						</ul>
					</li>
					<!--<li class="dropdown">
						<a class="dropdown-toggle -with-icon" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Profile <span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="#/resume" class="-with-icon">Resume</a></li>
						</ul>
					</li>
					<li><a href="#/contact"class="-with-icon">Contact</a></li>-->
				</ul>
			</div>
		</div>
	</nav>
	
	<!-- Where the content goes -->
	<div class="content-holder">
		<ng-view />
	</div>
	
	<!-- Footer -->
	<div class="footer">
		<div class="container">
			<div class="row">
				Powered by 
				<a target="_blank" href="https://php.net/"><?php echo create_image('logos/php.png', 'PHP', 'logo-php'); ?></a>
				<a target="_blank" href="http://getbootstrap.com/"><?php echo create_image('logos/bootstrap.png', 'Bootstrap', 'logo-bootstrap'); ?></a>
				<a target="_blank" href="https://angular.io/"><?php echo create_image('logos/angular.png', 'AngularJS', 'logo-angular'); ?></a>
				<a target="_blank" href="https://bower.io/"><?php echo create_image('logos/bower.png', 'Bower', 'logo-bower'); ?></a>
			</div>
		</div>
	</div>
	
	<!-- Slider to show images in full-screen -->
	<div class="fullscreen-slider" style="display: none;">
		<div class="slider-overlay"></div>
		<div class="slider-image-holder">
			<img src="<?php echo $page->image("loading-spinner-150x150.gif"); ?>" alt="No image" />
			<div class="image-title"></div>
		</div>
		<span class="glyphicon glyphicon-remove-circle" aria-action="close" title="Close"></span>
	</div>
	
	<script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

		ga('create', 'UA-85117433-1', 'auto');
		ga('send', 'pageview');
	</script>
</body>
</html>