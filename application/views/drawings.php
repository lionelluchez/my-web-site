<h1>Drawings</h1>

<div class="block">
	<!-- Showing the drawings -->
	<div class="websites thumbs-collection">
		<div ng-repeat="img in images" class="thumbs-item" title="{{img.title}}">
			<img ng-src="{{img.src.thumb}}" alt="{{img.title}}" class="thumb" ng-click="enlargeImage(img)" />
		</div>
		<div class="clear"></div>
	</div>
</div>