<h1>Programs</h1>

<div class="container">
	<div class="alert alert-info alert-with-icon alert-with-left-icon-48 fade in" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="close" title="Close">&times;</button>
		<div class="icon windows-logo" title="Windows"></div>
		<b>Important information</b><br />
		<span>These programs are available for Windows only.</span>
	</div>
</div>

<div class="block">
	<!-- Search Panel -->
	<div class="input-group">
		<span class="input-group-addon"><i class="glyphicon glyphicon-search"></i> <span class="hidden-xs">Filter</span></span>
		<input class="form-control" ng-model="textFilter">
		<div class="input-group-btn">
			<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				<span class="glyphicon glyphicon-tags"></span>
				<span class="hidden-xs">Programming Language</span>
				<span class="caret"></span>
			</button>
			<ul class="dropdown-menu dropdown-menu-right">
				<li><a href="" ng-class="cssAllProgLangs()" ng-click="showAllProgLangsClicked($event)">View all languages</a></li>
				<li role="separator" class="divider"></li>
				<li ng-repeat="progLang in data.programming_languages">
					<a href="" ng-class="cssProgLangItem(progLang)"  ng-click="progLangItemClicked($event, progLang)">{{progLang.name}}</a>
				</li>
			</ul>
		</div>
		<div class="input-group-btn">
			<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				<span class="glyphicon glyphicon-tags"></span>
				<span class="hidden-xs">Category</span>
				<span class="caret"></span>
			</button>
			<ul class="dropdown-menu dropdown-menu-right">
				<li><a href="" ng-class="cssAllCategories()" ng-click="showAllCategoriesClicked($event)">View all categories</a></li>
				<li role="separator" class="divider"></li>
				<li ng-repeat="cat in data.categories">
					<a href="" ng-class="cssCategoryItem(cat)"  ng-click="categoryItemClicked($event, cat)">{{cat.name}}</a>
				</li>
			</ul>
		</div>
		<div class="input-group-btn">
			<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				<span class="glyphicon glyphicon-globe"></span>
				<span class="hidden-xs">Language</span>
				<span class="caret"></span>
			</button>
			<ul class="dropdown-menu dropdown-menu-right">
				<li><a href="" ng-class="cssAllLanguages()" ng-click="showAllLanguagesClicked()">View all languages</a></li>
				<li role="separator" class="divider"></li>
				<li ng-repeat="lang in data.languages">
					<a href="" ng-class="cssLanguageItem(lang)"  ng-click="languageItemClicked($event, lang)">{{lang.name}}</a>
				</li>
			</ul>
		</div>
	</div>
	
	<!-- Showing the programs -->
	<div class="programs thumbs-collection">
		<a ng-href="#/programs/{{prog.id}}" ng-repeat="prog in data.programs | programsFilter:textFilter:categoryFilter:languageFilter:progLangFilter | orderBy:'name'" class="thumbs-item" title="{{prog.name}}">
			<div class="title">{{prog.name}}</div>
			<img ng-src="{{prog.thumbnail_src}}" class="thumb" />
			<div class="logos">
				<img ng-repeat="img in prog.icons" ng-src="{{img.src}}" title="{{img.title}}" class="icon" />
			</div>
		</a>
		<div class="clear"></div>
	</div>
</div>