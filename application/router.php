<?php
	// include the config files
	include DIR_CONFIG.'config.php';
	include_once DIR_CORE.'lib.php';
	include_once DIR_APP.'lib/router.php';
	

	try
	{
		$url_args = parse_query_string($_SERVER['QUERY_STRING']);
		$action = $url_args['action'];
		if( preg_match("/\.json$/i", $action, $matches) )
		{
			if( preg_match("/^(programs|websites|drawings|istria)\.json$/i", $action, $matches) )
			{
				include DIR_PAGES.strtolower($matches[1]).".php";
				renderJSON(generate_json());
			}
			else
			{
				set_status_header(404);
				renderJSON(Array("err" => 404));
			}
		}
		elseif( preg_match("/^views\/([\w\-]+)(\.(html?|php))?$/i", $action, $matches) )
		{
			$file = DIR_VIEWS.strtolower($matches[1]).".php";
			if( file_exists($file) )
				include $file;
			else
				set_status_header(404);
		}
		else
		{
			include DIR_APP.'pages/main.php';
		}
	}
	catch(Exception $e)
	{
		set_status_header(500);
	}
	
	