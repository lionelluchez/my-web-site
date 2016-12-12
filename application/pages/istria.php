<?php

include_once DIR_CORE."page.php";
$page = new Page();


function img_path($img)
{
	global $page;
	return $page->image("istria/{$img}");
}

function generate_download_item($zip)
{
	$file = DIR_ASSETS."others/istria/{$zip}";
	$item = Array("url" => $file);
	$stat = @stat($file);
	if( $stat !== FALSE )
	{
		$item["size"] = format_filesize(intval($stat["size"]));
		if( !array_key_exists("date", $item) )
		{
			$item["date"] = generate_date(intval($stat["mtime"]));
		}
	}
	return $item;
}

function generate_date($time)
{
	return Array('year' => intval(date('Y', $time)), 'month' => intval(date('n', $time)), 'day' => intval(date('j', $time)));
}


function generate_json()
{
	return Array
	(
		"game_images" => Array(
			Array("src" => img_path("01-name-input.png"), "title" => "Name input", "w" => 320, "h" => 240),
			Array("src" => img_path("02-dialog.png"), "title" => "Dialog", "w" => 320, "h" => 240),
			Array("src" => img_path("03-map-animation.gif"), "title" => "Map animation", "w" => 320, "h" => 240),
			Array("src" => img_path("04-inventory.png"), "title" => "Inventory", "w" => 320, "h" => 240),
			Array("src" => img_path("05-fights.png"), "title" => "Fights", "w" => 320, "h" => 240),
			Array("src" => img_path("06-fights-attack.png"), "title" => "Attack", "w" => 320, "h" => 240),
			Array("src" => img_path("07-fights-2vs2.png"), "title" => "Fight 2 vs 2", "w" => 320, "h" => 240),
			Array("src" => img_path("08-map-city.png"), "title" => "City", "w" => 320, "h" => 240),
			Array("src" => img_path("09-map-cave.png"), "title" => "cave", "w" => 320, "h" => 240),
			Array("src" => img_path("10-fights-cave.png"), "title" => "Cave fight", "w" => 320, "h" => 240),
			Array("src" => img_path("11-object-found.png"), "title" => "Object found", "w" => 320, "h" => 240)
		),
		"editors_images" => Array(
			Array("src" => img_path("20-map-maker.png"), "title" => "Map Maker"),
			Array("src" => img_path("21-map-maker-tiles.png"), "title" => "Available tiles on Map Maker"),
			Array("src" => img_path("22-map-maker-anim.gif"), "title" => "How Map Maker works"),
			Array("src" => img_path("23-map-completor-events.png"), "title" => "Managing events with Map Completor"),
			Array("src" => img_path("24-map-completor-npc.png"), "title" => "Managing NPC with Map Completor")
		),
		"downloads" => Array(
			Array(
				"name" => "Istria",
				"links" => Array(
					"binaries" => generate_download_item("istria.zip"),
					"sources" => generate_download_item("istria-sources.zip")
				)
			),
			Array(
				"name" => "Map editors",
				"links" => Array(
					"binaries" => generate_download_item("mapmaker.zip"),
					"sources" => generate_download_item("mapmaker-sources.zip")
				)
			)
		)
	);
}
