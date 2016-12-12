<?php
	//error_reporting(E_ALL); // & ~E_NOTICE);
	
	
	// Define paths
	define('DIR_ROOT', '');
		define('DIR_SYSTEM', DIR_ROOT.'system/');
			define('DIR_CONFIG', DIR_SYSTEM.'config/');
			define('DIR_CORE',   DIR_SYSTEM.'core/');
		define('DIR_APP',    DIR_ROOT.'application/');
			define('DIR_PAGES', DIR_APP.'pages/');
			define('DIR_VIEWS', DIR_APP.'views/');
		define('DIR_ASSETS', DIR_ROOT.'assets/');
			define('DIR_CSS',   DIR_ASSETS.'css/');
			define('DIR_FONTS', DIR_ASSETS.'fonts/');
			define('DIR_IMG',   DIR_ASSETS.'images/');
			define('DIR_JS',    DIR_ASSETS.'js/');
			define('DIR_BOWER', DIR_ASSETS.'bower_components/');
	
	
	// include the main file
	include DIR_APP.'router.php';
?>