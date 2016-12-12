<!-- Go Back button -->
<span class="btn btn-theme btn-back" onclick="goBack()">
	<span class="glyphicon glyphicon-arrow-left"></span>
	Back to programs
</span>

<!-- Error Panel -->
<div ng-show="dataLoadingFailed()">
	<div class="container">
		<div class="alert alert-danger alert-box" role="alert">
			<b ng-bind="loadingErrorText()"></b><br />
			<span>The ID <i>{{prog_id}}</i> doesn't refer to any valid program identifier</span>.
			<a href="#/programs">Back to programs gallery</a>
		</div>
	</div>
</div>

<!-- Program View -->
<div ng-show="isValidProgram()" class="show-program">
	<h1 ng-bind="prog.name"></h1>
	
	<div class="block">
		<div class="container" ng-show="hasRequirements()">
			<div class="alert alert-warning fade in" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="close" title="Close">&times;</button>
				<b>Requirements to run {{prog.name}}:</b><br />
				<ul>
					<li ng-repeat="req in prog.requirements || []">
						<span ng-hide="req.url">{{ req.text }}</span>
						<a ng-show="req.url" ng-href="{{req.url}}" target="_blank">{{ req.text }} <span class="glyphicon glyphicon-share-alt"></span></a>
					</li>
				</ul>
			</div>
		</div>
		<div class="row">
			<div class="col-md-1"></div>
			<div class="col-md-4">
				<table class="table table-hover table-bordered table-responsive prog-details">
					<tr>
						<th>Category <span class="glyphicon glyphicon-tags symbol"></span></th>
						<td ng-bind="prog.category.name"></td>
					</tr>
					<tr>
						<th>Programming language(s) <span class="glyphicon glyphicon-wrench symbol"></th>
						<td ng-bind="programmingLanguages()"></td>
					</tr>
					<tr>
						<th>Language(s) <span class="glyphicon glyphicon-globe symbol"></th>
						<td ng-bind="languages()"></td>
					</tr>
					<tr>
						<th>Date / Version <span class="glyphicon glyphicon-calendar symbol"></th>
						<td ng-bind="dateAndVersion()"></td>
					</tr>
					<tr>
						<th>File Size <span class="glyphicon glyphicon-paperclip symbol"></th>
						<td ng-bind="prog.size"></td>
					</tr>
				</table>
			</div>
			<div class="col-md-6 img-preview">
				<img ng-src="{{ prog.thumbnail_src }}" class="preview" />
				<a target="_blank" ng-href="{{ prog.bin_src }}" title="Download {{prog.name}}" class="download-btn"></a>
			</div>
			<div class="col-md-1"></div>
		</div>
		
		<h2>Description</h2>
		<div class="text-block">
			<p ng-bind="prog.description"></p>
		</div>
		
		<h2>Screenshots</h2>
		<div class="block">
			<div id="screenshots-carousel" class="carousel">
				<div ng-repeat="img in prog.screenshots" class="item" title="{{img.title}}">
					<img ng-src="{{img.src}}" title="{{img.title}}" ng-click="enlargeImage(img)" />
				</div>
			</div>
		</div>
	</div>
	
	<div class="block centered">
		<a target="_blank" ng-href="{{ prog.bin_src }}" title="Download {{prog.name}}" class="btn btn-theme btn-theme-md">
			<span class="text">Download {{ prog.name }}</span>
			<span class="glyphicon glyphicon-download"></span>
		</a>
	</div>
	
</div>

