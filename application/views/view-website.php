<!-- Go Back button -->
<span class="btn btn-theme btn-back" onclick="goBack()">
	<span class="glyphicon glyphicon-arrow-left"></span>
	Back to websites
</span>

<!-- Error Panel -->
<div ng-show="dataLoadingFailed()">
	<div class="container">
		<div class="alert alert-danger alert-box" role="alert">
			<b ng-bind="loadingErrorText()"></b><br />
			<span>The ID <i>{{site_id}}</i> doesn't refer to any valid website identifier</span>.
			<a href="#/websites">Back to Websites gallery</a>
		</div>
	</div>
</div>

<!-- Program View -->
<div ng-show="isValidWebsite()" class="show-website">
	<h1>
		<span ng-bind="site.name"></span>
		<i>({{ site.creation_year }})</i>
	</h1>
	
	<div class="block">
		<img ng-src="{{ site.logo }}" class="site-logo" title="Logo {{site.name}}" />
		<h2>Description</h2>
		<div class="text-block">
			<!--<p>Created in <b>{{ site.creation_year }}</b></p>-->
			<p ng-bind="site.description"></p>
		</div>
		
		<h2>Screenshots</h2>
		<div class="block">
			<div id="screenshots-carousel" class="carousel">
				<div ng-repeat="img in site.screenshots" class="item" title="{{img.title}}">
					<img ng-src="{{img.src}}" title="{{img.title}}" ng-click="enlargeImage(img)" />
				</div>
			</div>
		</div>
		
		<!-- Warning box if the site is Offline -->
		<div class="container" ng-show="isOffline()">
			<div class="alert alert-warning fade in" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="close" title="Close">&times;</button>
				<b>{{site.name}} is offline since {{site.offline.year}}</b><br />
				<span ng-bind="site.offline.reason"></span>
			</div>
		</div>
		
		<div class="block centered" ng-show="hasUrl()">
			<a target="_blank" ng-href="{{site.url}}" title="Visit {{site.name}}" class="btn btn-theme btn-theme-md">
				<span class="text">Visit {{site.name}}</span>
				<span class="glyphicon glyphicon-share-alt"></span>
			</a>
		</div>
	</div>
</div>

