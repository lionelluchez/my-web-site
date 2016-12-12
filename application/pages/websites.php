<?php
// Includes
include_once DIR_CORE.'page.php';


// Constants
define('DIR_SITES_IMAGES',      'websites/');
define('DIR_SITES_LOGOS',       DIR_SITES_IMAGES.'logos/');
define('DIR_SITES_SCREENSHOTS', DIR_SITES_IMAGES.'screens/');
define('DIR_LANGUAGES_IMAGES',  'flags/');

define('LANGUAGE_EN', 'en');
define('LANGUAGE_FR', 'fr');

define('ICONS_SIZE', '32x32');


// Init
$page = new Page();


function generate_json()
{
	$page = new Page();
	
	$languages = Array(
		Array('id' => LANGUAGE_EN, 'name' => 'English', 'src' => $page->image(DIR_LANGUAGES_IMAGES.'en_round_'.ICONS_SIZE.'.png')),
		Array('id' => LANGUAGE_FR, 'name' => 'French', 'src' => $page->image(DIR_LANGUAGES_IMAGES.'fr_round_'.ICONS_SIZE.'.png'))
	);
	
	$sites = Array(
		Array(
			"id" => "sylvialuchez",
			"name" => "Sylvia Luchez",
			"description" => "Polish-American contemporary artist in Chicago",
			"url" => "http://sylvialuchez.com/",
			"lang_ids" => Array(LANGUAGE_EN),
			"creation_year" => 2015,
			"logo" => $page->image(DIR_SITES_LOGOS."sylvia.jpg"),
			"screenshots" => Array(
				Array("src" => $page->image(DIR_SITES_SCREENSHOTS."sylvia_01_works.jpg"), "title" => "Works page (Desktop view)"),
				Array("src" => $page->image(DIR_SITES_SCREENSHOTS."sylvia_02_gallery.jpg"), "title" => "Gallery page (Desktop view)"),
				Array("src" => $page->image(DIR_SITES_SCREENSHOTS."sylvia_03_news.jpg"), "title" => "News page (Mobile view)"),
				Array("src" => $page->image(DIR_SITES_SCREENSHOTS."sylvia_04_contact.jpg"), "title" => "Contact page (Mobile view)"),
				Array("src" => $page->image(DIR_SITES_SCREENSHOTS."sylvia_05_works.jpg"), "title" => "Works page (Mobile view)"),
				Array("src" => $page->image(DIR_SITES_SCREENSHOTS."sylvia_06_gallery.jpg"), "title" => "Gallery page (Mobile view)")
			)
		),
		Array(
			"id" => "papagayo",
			"name" => "Papagayo",
			"description" => "Papagayo is a hotel at Sihanoukville (Cambodia) close to the sea. Here you will find everything you need for a relaxing and peaceful holiday. Services include laundry, scooter rentals, bar.",
			"url" => "",
			"lang_ids" => Array(LANGUAGE_EN, LANGUAGE_FR),
			"creation_year" => 2010,
			"logo" => $page->image(DIR_SITES_LOGOS."papagayo.jpg"),
			"screenshots" => Array(
				Array("src" => $page->image(DIR_SITES_SCREENSHOTS."papagayo1.jpg"), "title" => ""),
				Array("src" => $page->image(DIR_SITES_SCREENSHOTS."papagayo2.jpg"), "title" => ""),
				Array("src" => $page->image(DIR_SITES_SCREENSHOTS."papagayo3.jpg"), "title" => ""),
				Array("src" => $page->image(DIR_SITES_SCREENSHOTS."papagayo4.jpg"), "title" => ""),
				Array("src" => $page->image(DIR_SITES_SCREENSHOTS."papagayo_bo1.jpg"), "title" => ""),
				Array("src" => $page->image(DIR_SITES_SCREENSHOTS."papagayo_bo2.jpg"), "title" => ""),
				Array("src" => $page->image(DIR_SITES_SCREENSHOTS."papagayo_bo3.jpg"), "title" => "")
			),
			"offline" => Array(
				"year" => 2012,
				"reason" => "The management changed and I was not able to connect with the new owners. As a consequence, the domain was not renewed."
			)
		),
		Array(
			"id" => "instant_pour_soi_old",
			"name" => "Instant pour Soi (Old)",
			"description" => "Instant Pour Soi provides a large variety of relaxing massages. Lucien Luchez will help you find the massage that will benefits the most.",
			"url" => "",
			"lang_ids" => Array(LANGUAGE_FR),
			"creation_year" => 2008,
			"logo" => $page->image(DIR_SITES_LOGOS."ips_old.jpg"),
			"screenshots" => Array(
				Array("src" => $page->image(DIR_SITES_SCREENSHOTS."ips1.jpg"), "title" => ""),
				Array("src" => $page->image(DIR_SITES_SCREENSHOTS."ips2.jpg"), "title" => ""),
				Array("src" => $page->image(DIR_SITES_SCREENSHOTS."ips3.jpg"), "title" => "")
			),
			"offline" => Array(
				"year" => 2011,
				"reason" => ""
			)
		),
		Array(
			"id" => "philippe_de_bussy",
			"name" => "Boucherie Philippe de Bussy",
			"description" => "Philippe de Bussy is providing a large selection of quality and fresh meats from local producers. He also offers local products and will provide you with the right recipe for the perfect dinner.",
			"url" => "",
			"lang_ids" => Array(LANGUAGE_FR),
			"creation_year" => 2008,
			"logo" => $page->image(DIR_SITES_LOGOS."philippe.jpg"),
			"screenshots" => Array(
				Array("src" => $page->image(DIR_SITES_SCREENSHOTS."philippe1.jpg"), "title" => ""),
				Array("src" => $page->image(DIR_SITES_SCREENSHOTS."philippe2.jpg"), "title" => ""),
				Array("src" => $page->image(DIR_SITES_SCREENSHOTS."philippe3.jpg"), "title" => ""),
				Array("src" => $page->image(DIR_SITES_SCREENSHOTS."philippe_bo1.jpg"), "title" => ""),
				Array("src" => $page->image(DIR_SITES_SCREENSHOTS."philippe_bo2.jpg"), "title" => ""),
				Array("src" => $page->image(DIR_SITES_SCREENSHOTS."philippe_bo3.jpg"), "title" => "")
			),
			"offline" => Array(
				"year" => 2011,
				"reason" => "A project to propose online ordering has been studied but the fact that no mailing companies accepted to deliver fresh meats at that time. Hence the project was stopped. The online cooking tips were not really viewed by the customers who prefered to directly speak with him. The management also changed a few years after and the domain wasn't renewed."
			)
		),
		Array(
			"id" => "modules_briques",
			"name" => "Modules Briques",
			"description" => " Modules Briques is a small business providing made-to-measure construction materials. The website provides picture gallery and technical documentation about the available products.",
			"url" => "",
			"lang_ids" => Array(LANGUAGE_FR),
			"creation_year" => 2007,
			"logo" => $page->image(DIR_SITES_LOGOS."mb.jpg"),
			"screenshots" => Array(
				Array("src" => $page->image(DIR_SITES_SCREENSHOTS."mb1.jpg"), "title" => ""),
				Array("src" => $page->image(DIR_SITES_SCREENSHOTS."mb2.jpg"), "title" => ""),
				Array("src" => $page->image(DIR_SITES_SCREENSHOTS."mb3.jpg"), "title" => ""),
				Array("src" => $page->image(DIR_SITES_SCREENSHOTS."mb4.jpg"), "title" => "")
			),
			"offline" => Array(
				"year" => 2013,
				"reason" => "The business owner passed away and the company stopped its business."
			)
		),
		Array(
			"id" => "maitre_merlin",
			"name" => "Ludovic Merlin Maître Notaire",
			"description" => "Maître Ludovic Merlin is a realtor and lawyer. His webiste lists the properties for sale.",
			"url" => "",
			"lang_ids" => Array(LANGUAGE_EN, LANGUAGE_FR),
			"creation_year" => 2007,
			"logo" => $page->image(DIR_SITES_LOGOS."maitre_merlin.jpg"),
			"screenshots" => Array(
				Array("src" => $page->image(DIR_SITES_SCREENSHOTS."notaire1.jpg"), "title" => ""),
				Array("src" => $page->image(DIR_SITES_SCREENSHOTS."notaire2.jpg"), "title" => ""),
				Array("src" => $page->image(DIR_SITES_SCREENSHOTS."notaire3.jpg"), "title" => ""),
				Array("src" => $page->image(DIR_SITES_SCREENSHOTS."notaire_bo1.jpg"), "title" => "")
			),
			"offline" => Array(
				"year" => 2012,
				"reason" => "Unknown"
			)
		),
		Array(
			"id" => "basicunivers",
			"name" => "Basic Univers",
			"description" => "Basicunivers is my own website and was created to help all other Basic (PureBasic, DarkBasic, QuickBasic) developers and give them access to source code to help them improve their skills or easily find snippet codes to faster their projects development. I am also using BasicUnivers to release my creation (programs, school projects, drawings). There was also a selection of external links to help you download useful software/tools and links to the website of artists/designers I was in contact with.",
			"url" => "http://basicunivers.free.fr/",
			"lang_ids" => Array(LANGUAGE_FR),
			"creation_year" => 2006,
			"logo" => $page->image(DIR_SITES_LOGOS."basicunivers.jpg"),
			"screenshots" => Array(
				Array("src" => $page->image(DIR_SITES_SCREENSHOTS."basicunivers1.jpg"), "title" => ""),
				Array("src" => $page->image(DIR_SITES_SCREENSHOTS."basicunivers2.jpg"), "title" => ""),
				Array("src" => $page->image(DIR_SITES_SCREENSHOTS."basicunivers3.jpg"), "title" => ""),
				Array("src" => $page->image(DIR_SITES_SCREENSHOTS."basicunivers4.jpg"), "title" => ""),
				Array("src" => $page->image(DIR_SITES_SCREENSHOTS."basicunivers5.jpg"), "title" => ""),
				Array("src" => $page->image(DIR_SITES_SCREENSHOTS."basicunivers6.jpg"), "title" => ""),
				Array("src" => $page->image(DIR_SITES_SCREENSHOTS."basicunivers7.jpg"), "title" => "")
			)
		)/*,
		Array(
			"id" => "",
			"name" => "",
			"description" => "",
			"url" => "",
			"lang_ids" => Array(LANGUAGE_EN, LANGUAGE_FR),
			"creation_year" => ,
			"logo" => $page->image(DIR_SITES_LOGOS.".jpg"),
			"screenshots" => Array(
				Array("src" => $page->image(DIR_SITES_SCREENSHOTS.".jpg"), "title" => "")
			)//,
			//"offline" => Array(
			//	"year" => 2012,
			//	"reason" => ""
			//)
		)*/
	);
	
	// Return the JSON object
	return Array
	(
		"languages" => $languages,
		"websites" => $sites
	);
}