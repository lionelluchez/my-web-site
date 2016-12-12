<?php
// Includes
include_once DIR_CORE.'page.php';


// Constants
define('DIR_PROGS_BINARIES',    DIR_ASSETS.'others/programs/');
define('DIR_PROGS_IMAGES',      'progs/');
define('DIR_PROGS_SCREENSHOTS', DIR_PROGS_IMAGES.'screens/');
define('DIR_PROGS_THUMBNAILS',  DIR_PROGS_IMAGES.'thumbs/');
define('DIR_CATEGORIES_IMAGES', DIR_PROGS_IMAGES.'cats/');
define('DIR_LANGUAGES_IMAGES',  'flags/');
define('DIR_PROGRAMMING_LANGUAGES_IMAGES',  'proglangs/');

define('CATEGORY_MEDIA', 'cat-media');
define('CATEGORY_GAMES', 'cat-games');
define('CATEGORY_TOOLS', 'cat-tools');

define('LANGUAGE_EN', 'en');
define('LANGUAGE_FR', 'fr');

define('PROGLANG_DARKBASIC', 'db');
define('PROGLANG_PUREBASIC', 'pb');
define('PROGLANG_DOTNET',    'dotnet');


define('ICONS_SIZE', '32x32');


// Init
$page = new Page();

function generate_date($time)
{
	return Array('year' => intval(date('Y', $time)), 'month' => intval(date('n', $time)), 'day' => intval(date('j', $time)));
}

function generate_json()
{
	$page = new Page();
	
	$categories = Array(
		Array('id' => CATEGORY_MEDIA, 'name' => 'Multimedia', 'src' => $page->image(DIR_CATEGORIES_IMAGES.'media_'.ICONS_SIZE.'.png')),
		Array('id' => CATEGORY_GAMES, 'name' => 'Videos Games', 'src' => $page->image(DIR_CATEGORIES_IMAGES.'games_'.ICONS_SIZE.'.png')),
		Array('id' => CATEGORY_TOOLS, 'name' => 'Tools', 'src' => $page->image(DIR_CATEGORIES_IMAGES.'tools_'.ICONS_SIZE.'.png'))
	);
	
	$languages = Array(
		Array('id' => LANGUAGE_EN, 'name' => 'English', 'src' => $page->image(DIR_LANGUAGES_IMAGES.'en_round_'.ICONS_SIZE.'.png')),
		Array('id' => LANGUAGE_FR, 'name' => 'French', 'src' => $page->image(DIR_LANGUAGES_IMAGES.'fr_round_'.ICONS_SIZE.'.png'))
	);
	
	$proglangs = Array(
		Array('id' => PROGLANG_DARKBASIC, 'name' => 'DarkBasic', 'src' => $page->image(DIR_PROGRAMMING_LANGUAGES_IMAGES.'darkbasic-'.ICONS_SIZE.'.png')),
		Array('id' => PROGLANG_PUREBASIC, 'name' => 'PureBasic', 'src' => $page->image(DIR_PROGRAMMING_LANGUAGES_IMAGES.'purebasic-'.ICONS_SIZE.'.gif')),
		Array('id' => PROGLANG_DOTNET, 'name' => 'Microsoft .Net', 'src' => $page->image(DIR_PROGRAMMING_LANGUAGES_IMAGES.'visualstudio-'.ICONS_SIZE.'.gif'))
	);
	
	$progs = Array(
		Array(
			'id' => 'alp',
			'name' => 'Audio Lib Player (ALP)',
			'description' => 'ALP is a simple music player supporting most of audio files (MP3, WAV, etc.). You can easily create playlists (M3U format) by dragging files and finding your favorite songs using the search engine included',
			'lang_ids' => Array(LANGUAGE_EN, LANGUAGE_FR),
			'prog_lang_ids' => Array(PROGLANG_PUREBASIC),
			'category_id' => CATEGORY_MEDIA,
			'version' => '',
			'bin_src' => DIR_PROGS_BINARIES.'alp.zip',
			'thumbnail_src' => $page->image(DIR_PROGS_THUMBNAILS.'alp.png'),
			'screenshots' => Array(
				Array('src' => $page->image(DIR_PROGS_SCREENSHOTS.'alp_hifi.png'), 'title' => 'Skin Hifi'),
				Array('src' => $page->image(DIR_PROGS_SCREENSHOTS.'alp_roxor.png'), 'title' => 'Skin Roxor'),
				Array('src' => $page->image(DIR_PROGS_SCREENSHOTS.'alp_config.png'), 'title' => 'Configuration screen'),
				Array('src' => $page->image(DIR_PROGS_SCREENSHOTS.'alp_pl.png'), 'title' => 'Playlist management'),
				Array('src' => $page->image(DIR_PROGS_SCREENSHOTS.'alp_skins.png'), 'title' => 'Skin selection screen'),
				Array('src' => $page->image(DIR_PROGS_SCREENSHOTS.'alp_maj.png'), 'title' => 'Song database update screen')
			),
			'requirements' => null
		),
		Array(
			'id' => 'advent2d',
			'name' => 'Advent 2D',
			'description' => 'Advent2D is a short platform game on the moon. Get to the end without falling into infinite holes and by jumping on moving block',
			'lang_ids' => Array(LANGUAGE_EN),
			'prog_lang_ids' => Array(PROGLANG_DARKBASIC),
			'category_id' => CATEGORY_GAMES,
			'version' => '',
			'bin_src' => DIR_PROGS_BINARIES.'advent-2d.zip',
			'thumbnail_src' => $page->image(DIR_PROGS_THUMBNAILS.'advent-2d.png'),
			'screenshots' => Array(
				Array('src' => $page->image(DIR_PROGS_SCREENSHOTS.'advent2D_1'), 'title' => ''),
				Array('src' => $page->image(DIR_PROGS_SCREENSHOTS.'advent2D_2'), 'title' => ''),
				Array('src' => $page->image(DIR_PROGS_SCREENSHOTS.'advent2D_3'), 'title' => '')
			),
			'requirements' => Array(
				Array('text' => 'Graphic card needs to handle 640x480 16-bit display')
			)
		),
		Array(
			'id' => 'divxtech',
			'name' => 'Div-X-Tech',
			'description' => 'Div-X-Tech is a library listing the movies (DivX or DVDs) you have. Add your movies and enter any information you want (synopsis, category, actors, duration, date, storage format, etc.). Use the search feature to pick a movie matching your mood',
			'lang_ids' => Array(LANGUAGE_FR),
			'prog_lang_ids' => Array(PROGLANG_PUREBASIC),
			'category_id' => CATEGORY_MEDIA,
			'version' => '',
			'bin_src' => DIR_PROGS_BINARIES.'div-x-tech.zip',
			'thumbnail_src' => $page->image(DIR_PROGS_THUMBNAILS.'div-x-tech.png'),
			'screenshots' => Array(
				Array('src' => $page->image(DIR_PROGS_SCREENSHOTS.'divxtech_1.png'), 'title' => 'Main screen'),
				Array('src' => $page->image(DIR_PROGS_SCREENSHOTS.'divxtech_2.png'), 'title' => 'Adding/editing a movie'),
				Array('src' => $page->image(DIR_PROGS_SCREENSHOTS.'divxtech_3.png'), 'title' => 'Actor search screen'),
				Array('src' => $page->image(DIR_PROGS_SCREENSHOTS.'divxtech_4.png'), 'title' => 'Movie types screen'),
				Array('src' => $page->image(DIR_PROGS_SCREENSHOTS.'divxtech_5.png'), 'title' => 'Movie details screen')
			),
			'requirements' => null
		),
		Array(
			'id' => 'images_compressor2',
			'name' => 'Images Compressor 2',
			'description' => 'Images Compressor is a useful tool to compress your photos to reduce disk usage or to batch-resize your images. You can also convert your images from one image format to another (BMP, PNG, JPEG). Images Compressor has other features: mass renaming, select a destination folder, delete original images once the job is done. This program has been designed to work with folders.',
			'lang_ids' => Array(LANGUAGE_EN, LANGUAGE_FR),
			'prog_lang_ids' => Array(PROGLANG_PUREBASIC),
			'category_id' => CATEGORY_MEDIA,
			'version' => '2.5',
			'bin_src' => DIR_PROGS_BINARIES.'images-compressor2.zip',
			'thumbnail_src' => $page->image(DIR_PROGS_THUMBNAILS.'images-compressor2.png'),
			'screenshots' => Array(
				Array('src' => $page->image(DIR_PROGS_SCREENSHOTS.'imgcompressor2_main_screen.png'), 'title' => 'Main screen'),
				Array('src' => $page->image(DIR_PROGS_SCREENSHOTS.'imgcompressor2_files_selector.png'), 'title' => 'Files selector'),
				Array('src' => $page->image(DIR_PROGS_SCREENSHOTS.'imgcompressor2_options.png'), 'title' => 'Compression options'),
				Array('src' => $page->image(DIR_PROGS_SCREENSHOTS.'imgcompressor2_processing.png'), 'title' => 'Processing')
			),
			'requirements' => null
		),
		Array(
			'id' => 'istria',
			'name' => 'Istria',
			'description' => 'Istria is a short medieval RPG (technical demo). Get your weapons, move through animated maps and fight monsters. About 20 minutes is require to complete the quest. Visit the dedicated section for more information about this project.',
			'lang_ids' => Array(LANGUAGE_EN, LANGUAGE_FR),
			'prog_lang_ids' => Array(PROGLANG_DARKBASIC),
			'category_id' => CATEGORY_GAMES,
			'version' => '',
			'bin_src' => DIR_PROGS_BINARIES.'istria.zip',
			'thumbnail_src' => $page->image(DIR_PROGS_THUMBNAILS.'istria.png'),
			'screenshots' => Array(
				Array('src' => $page->image(DIR_PROGS_SCREENSHOTS.'istria_intro.png'), 'title' => 'Introduction'),
				Array('src' => $page->image(DIR_PROGS_SCREENSHOTS.'istria_dialog.png'), 'title' => 'Dialog'),
				Array('src' => $page->image(DIR_PROGS_SCREENSHOTS.'istria_inventory.png'), 'title' => 'Inventory'),
				Array('src' => $page->image(DIR_PROGS_SCREENSHOTS.'istria_fight.png'), 'title' => 'Fight'),
				Array('src' => $page->image(DIR_PROGS_SCREENSHOTS.'istria_cave.png'), 'title' => 'Cave exploration'),
				Array('src' => $page->image(DIR_PROGS_SCREENSHOTS.'istria_anim.gif'), 'title' => 'Animation demo')
			),
			'requirements' => Array(
				Array('text' => 'Istria might not work in windowed mode. If so, please run it in fullscreen instead.')
			)
		),
		Array(
			'id' => 'mp3_renamer',
			'name' => 'MP3 Renamer',
			'description' => 'MP3 Renamer rename for you MP3 albums. Select the new name format and rename all your album songs at once.',
			'lang_ids' => Array(LANGUAGE_FR),
			'prog_lang_ids' => Array(PROGLANG_PUREBASIC),
			'category_id' => CATEGORY_TOOLS,
			'version' => '',
			'bin_src' => DIR_PROGS_BINARIES.'mp3-renamer.zip',
			'thumbnail_src' => $page->image(DIR_PROGS_THUMBNAILS.'mp3-renamer.png'),
			'screenshots' => Array(
				Array('src' => $page->image(DIR_PROGS_SCREENSHOTS.'mp3_renammer.png'), 'title' => 'Main screen')
			),
			'requirements' => null
		),
		Array(
			'id' => 'personal_folders',
			'name' => 'Personal Folders',
			'description' => 'Change the location of the common directories: "My Documents", "My Music", "Desktop", "Start Menu", etc. Useful when you want to separate your data to another drive/partition.',
			'lang_ids' => Array(LANGUAGE_FR),
			'prog_lang_ids' => Array(PROGLANG_PUREBASIC),
			'category_id' => CATEGORY_TOOLS,
			'version' => '',
			'bin_src' => DIR_PROGS_BINARIES.'personal-folders.zip',
			'thumbnail_src' => $page->image(DIR_PROGS_THUMBNAILS.'personal-folder.png'),
			'screenshots' => Array(
				Array('src' => $page->image(DIR_PROGS_SCREENSHOTS.'personal_folder_1.png'), 'title' => 'Folder to change'),
				Array('src' => $page->image(DIR_PROGS_SCREENSHOTS.'personal_folder_2.png'), 'title' => 'New value')
			),
			'requirements' => null
		),
		Array(
			'id' => 'pure_sources',
			'name' => 'Pure Sources',
			'description' => 'PureSources makes you fast find text files with a simple search UI. Choose search options to find the file you are searching for: search type, files folder, file extensions, etc.',
			'lang_ids' => Array(LANGUAGE_EN, LANGUAGE_FR),
			'prog_lang_ids' => Array(PROGLANG_PUREBASIC),
			'category_id' => CATEGORY_MEDIA,
			'version' => 'RC',
			'bin_src' => DIR_PROGS_BINARIES.'pure-sources.zip',
			'thumbnail_src' => $page->image(DIR_PROGS_THUMBNAILS.'pure-sources.png'),
			'screenshots' => Array(
				Array('src' => $page->image(DIR_PROGS_SCREENSHOTS.'pure_sources_search.png'), 'title' => 'Main screen (Search)'),
				Array('src' => $page->image(DIR_PROGS_SCREENSHOTS.'pure_sources_config.png'), 'title' => 'Settings screen'),
			),
			'requirements' => null
		),
		Array(
			'id' => 'wallchanger',
			'name' => 'WallChanger',
			'description' => 'WallChanger periodically changes your desktop background image from using pictures from folders or playlists. WallChanger is simple to use as you only need to define groups (by selecting a folder or creating a text-file), select the rotation interval and you\'re done. Once started WallChanger is accessible from the systray.',
			'lang_ids' => Array(LANGUAGE_EN),
			'prog_lang_ids' => Array(PROGLANG_PUREBASIC),
			'category_id' => CATEGORY_TOOLS,
			'version' => '',
			'bin_src' => DIR_PROGS_BINARIES.'wallchanger.zip',
			'thumbnail_src' => $page->image(DIR_PROGS_THUMBNAILS.'wallchanger.png'),
			'screenshots' => Array(
				Array('src' => $page->image(DIR_PROGS_SCREENSHOTS.'wallchanger_settings.png'), 'title' => 'Main and only screen (settings)'),
				Array('src' => $page->image(DIR_PROGS_SCREENSHOTS.'wallchanger_systray.png'), 'title' => 'Tooltip accessible from the Systray')
			),
			'requirements' => null
		),
		Array(
			'id' => 'folder_actions',
			'name' => 'Folder Actions',
			'description' => 'Folder Actions is a file selector that will apply the same processing for all selected files. You can bulk-rename or join files or also apply transformations to a collection of images like resizing, format change, compression level, all at once. Folder Actions also has a powerful file selector to make sure you don\'t process invalid/unwanted files and it can easily be integrated to the Shell to be accessible at any time from the context menu in your file explorer.',
			'lang_ids' => Array(LANGUAGE_EN),
			'prog_lang_ids' => Array(PROGLANG_DOTNET),
			'category_id' => CATEGORY_MEDIA,
			'version' => '1.00.5124',
			'bin_src' => DIR_PROGS_BINARIES.'folder_actions.zip',
			'thumbnail_src' => $page->image(DIR_PROGS_THUMBNAILS.'folder_actions.png'),
			'screenshots' => Array(
				Array('src' => $page->image(DIR_PROGS_SCREENSHOTS.'folder_actions_list_view.png'), 'title' => 'Main window (list view mode)'),
				Array('src' => $page->image(DIR_PROGS_SCREENSHOTS.'folder_actions_thumbs_view.png'), 'title' => 'Main window (thumbnails view mode)'),
				Array('src' => $page->image(DIR_PROGS_SCREENSHOTS.'folder_actions_images_compressor.png'), 'title' => 'Action selected: Images compressor'),
				Array('src' => $page->image(DIR_PROGS_SCREENSHOTS.'folder_actions_files_renamer.png'), 'title' => 'Action selected: Files renamer'),
				Array('src' => $page->image(DIR_PROGS_SCREENSHOTS.'folder_actions_files_appender.png'), 'title' => 'Action selected: Files appender'),
				Array('src' => $page->image(DIR_PROGS_SCREENSHOTS.'folder_actions_shell_integration.png'), 'title' => 'Shell integration')
			),
			'requirements' => Array(
				Array('text' => 'Framework .NET 4.5', 'url' => 'https://www.microsoft.com/en-us/download/details.aspx?id=30653'),
				Array('text' => 'Optional: Folder Actions needs to run with administrator privileges to add itself into the context menu in Windows Explorer. This will unlock the Shell integration option. Afterwards privileges elevation won\'t be necessary anymore.')
			)
		)
	);
	
	// Post processing
	foreach( $progs as &$prog )
	{
		$stat = @stat($prog['bin_src']);
		if( $stat !== FALSE )
		{
			$prog['size'] = format_filesize(intval($stat['size']));
			if( !array_key_exists('date', $prog) )
			{
				$prog['date'] = generate_date(intval($stat['mtime']));
			}
		}
	}
	
	// Return the JSON object
	return Array
	(
		'categories' => $categories,
		'languages' => $languages,
		'programming_languages' => $proglangs,
		'programs' => $progs
	);
}
