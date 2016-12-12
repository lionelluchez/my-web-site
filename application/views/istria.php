<h1>Project Istria</h1>

<div class="block">
	<h2>Description</h2>
	<div class="text-block">
		<p>During the summer 2004 I started to work on the creation of an RPG game named Istria, developer in <a href="https://www.thegamecreators.com/product/dark-basic-pro-open-source" target="_blank">Dark Basic</a>.
		I'm not a designer, nor a musician. I choose to use the assets from <a href="http://www.rpgmakerweb.com/" tager="_blank">RPG Maker</a>.
		I started to create technical demos first to improve my 2D skills with this programming language and to make sure I could actually commit myself to such an important project.
		After a few weeks of practice and tests I felt that I was ready for this challenge.</p>
		<p>With these experimentations I already created a basic display engine.
		I knew the next step was to be able to generate maps quickly so I created a basic map editor for my needs.
		Then I worked on improving my engine to animate the characters, move our hero around the map, handle the map scrolling, add NPCs <i>(Non-player character)</i> and develop the events (map change when reaching specific tiles, interactions with NPCs, saving, etc).
		Once all the basic was coded I worked on the engine for turn-based battles (with up to 3 fighters in each side).</p>
		<p>The engine for the itself was then basically done.
		I needed now to create content and for that I needed a much more advanced editor to create maps faster and save time when placing event markers, populate maps with NPCs and random foes, etc.
		I choose to split the editors: MapMaker for the design, MapCompletor for all other things.
		Both were coded with <a href="https://www.purebasic.com/" target="_blank">PureBasic</a>, a language I recently discovered showing much better performances and with OOP.</p>
		<p>Istria offers about 20 minutes of gameplay.
		The project was stopped in May 2005 as I was unable to allocate enough time anymore to work on it regularly due to homeworks/studies.
		The game engine is fully working, it is then just a matter of dedicating time to add maps, events, etc.
		The challenge was successfully completed and I learned a lot from this experience.</p>
	</div>

	<h3>Screenshots of the project</h3>
	<div class="block">
		<div id="istria-game-carousel" class="carousel">
			<div ng-repeat="img in data.game_images" class="item" title="{{img.title}}">
				<img ng-src="{{img.src}}" title="{{img.title}}" ng-click="enlargeImage(img, data.game_images)" />
			</div>
		</div>
	</div>

	<h3>Screenshots of the editors</h3>
	<div class="block">
		<div id="istria-editors-carousel" class="carousel">
			<div ng-repeat="img in data.editors_images" class="item" title="{{img.title}}">
				<img ng-src="{{img.src}}" title="{{img.title}}" ng-click="enlargeImage(img, data.editors_images)" />
			</div>
		</div>
	</div>
	
	<h3>Downloads</h3>
	<div class="alert alert-warning fade in" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="close" title="Close">×</button>
		<b class="ng-binding">Requirements to run Istria:</b><br>
		<ul>
			<li>
				<span>Istria might not work in windowed mode. If so, please run it in fullscreen instead.</span>
			</li>
		</ul>
	</div>
	<table class="hidden-xs table table-hover table-bordered table-responsive downloads-istria">
		<thead>
			<tr>
				<th rowspan="2" class="centered-header-cell">Name</th>
				<th colspan="3" class="centered">Binaries</th>
				<th colspan="3" class="centered">Source Code</th>
			</tr>
			<tr>
				<th class="centered">Size</th>
				<th class="centered">Date</th>
				<th class="centered">Link</th>
				<th class="centered">Size</th>
				<th class="centered">Date</th>
				<th class="centered">Link</th>
			</tr>
		</thead>
		<tbody>
			<tr ng-repeat="item in data.downloads">
				<td ng-bind="item.name"></td>
				<td ng-bind="item.links.binaries.size" class="centered"></td>
				<td ng-bind="date(item.links.binaries)" class="centered"></td>
				<td class="centered">
					<a ng-href="{{ item.links.binaries.url }}">
						Binaries <span class="glyphicon glyphicon-download-alt"></span>
					</a>
				</td>
				<td ng-bind="item.links.sources.size" class="centered"></td>
				<td ng-bind="date(item.links.sources)" class="centered"></td>
				<td class="centered">
					<a ng-href="{{ item.links.sources.url }}">
						Source code <span class="glyphicon glyphicon-download-alt"></span>
					</a>
				</td>
			</tr>
		</tbody>
	</table>
	<table class="visible-xs table table-hover table-bordered table-responsive downloads-istria">
		<thead>
			<tr>
				<th>Name</th>
				<th class="centered">Binaries</th>
				<th class="centered">Source Code</th>
			</tr>
		</thead>
		<tbody>
			<tr ng-repeat="item in data.downloads">
				<td ng-bind="item.name"></td>
				<td class="centered">
					<a ng-href="{{ item.links.binaries.url }}"><span ng-bind="item.links.binaries.size"></span> <span class="glyphicon glyphicon-download-alt"></span></a>
				</td>
				<td class="centered">
					<a ng-href="{{ item.links.sources.url }}"><span ng-bind="item.links.sources.size"></span> <span class="glyphicon glyphicon-download-alt"></span></a>
				</td>
			</tr>
		</tbody>
	</table>
</div>