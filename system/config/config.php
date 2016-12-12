<?php

	// Set if we are in Production environment
	define('IS_PROD', strpos($_SERVER['SERVER_NAME'], '192.168.') !== 0);
	
	// Define configuration array
	$config = Array();

	// Folders
	//$config['']