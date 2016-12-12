<?php
// Includes
include_once DIR_CORE.'page.php';


// Constants
define('DIR_DRAWINGS',        'drawings/');
define('DIR_DRAWINGS_IMAGES', DIR_DRAWINGS.'large/');
define('DIR_DRAWINGS_THUMBS', DIR_DRAWINGS.'thumbs/');


function generate_json()
{
	$drawings = Array
	(
		Array("src" => "fruits.jpg", "title" => "Fruits (acrylic painting)"),
		Array("src" => "machu_picchu.jpg", "title" => "Machu Picchu (crayons)"),
		Array("src" => "chevaliers.jpg", "title" => "Knights against dragons (drawing)"),
		Array("src" => "dbz3.jpg", "title" => "Dragon Ball Z (aquarel drawing)"),
		Array("src" => "leonard_de_vinci.jpg", "title" => "Leonardo da Vinci autoportrait (drawing)"),
		Array("src" => "huile_maison.jpg", "title" => "House in the forest (oil painting)"),
		Array("src" => "alpes.jpg", "title" => "Alpes (crayons)"),
		Array("src" => "evangelion1.jpg", "title" => "Evengelion (drawing)"),
		Array("src" => "evangelion2.jpg", "title" => "Evengelion (drawing)"),
		Array("src" => "auto_portrait.jpg", "title" => "Self-portrait (aquarel painting)"),
		Array("src" => "aquarel_mer.jpg", "title" => "Sea shore (aquarel painting)"),
		Array("src" => "dbz1.jpg", "title" => "Dragon Ball Z (drawing)"),
		Array("src" => "dbz2.jpg", "title" => "Dragon Ball Z (drawing)"),
		Array("src" => "nadia2.jpg", "title" => "Nadia (drawing)"),
		Array("src" => "nadia1.jpg", "title" => "Nadia (drawing)"),
		Array("src" => "sakura.jpg", "title" => "Sakura (drawing)"),
		Array("src" => "diabolic.jpg", "title" => "Diabolic (drawing)"),
		Array("src" => "christelle.jpg", "title" => "Christelle (drawing)")
	);
	
	$page = new Page();
	foreach($drawings as &$drawing)
	{
		$url = $drawing['src'];
		$drawing['src'] = Array(
			"large" => $page->image(DIR_DRAWINGS_IMAGES.$url), 
			"thumb" => $page->image(DIR_DRAWINGS_THUMBS.$url)
		);
	}
	
	return $drawings;
}
