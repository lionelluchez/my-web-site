<h1>Websites</h1>

<div class="block">
	<!-- Showing the websites -->
	<div class="websites thumbs-collection">
		<a ng-href="#/websites/{{site.id}}" ng-repeat="site in data.websites | orderBy:'-creation_year'" class="thumbs-item" title="{{site.name}}">
			<!-- <div class="title">{{site.name}}</div> -->
			<img ng-src="{{site.logo}}" class="thumb" />
 			<div class="logos">
				<img ng-repeat="img in site.icons" ng-src="{{img.src}}" title="{{img.title}}" class="icon" />
			</div>
		</a>
		<div class="clear"></div>
	</div>
</div>