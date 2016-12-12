'use strict'

var defaultController = function(title) {
	document.slider.hide()
	document.title = 'Lionel Luchez'  + (title ? ' - '+title : '')
}

var initCarousel = function($timeout, $selector) {
	$timeout( function() { 
		($selector || $('.carousel')).owlCarousel()
	} )
}

/*var initCarousel = function(images, $carousel) {
	$.each(images, function(index, img) {
		$carousel.append($('<img>', {src: img.src, title: img.title, alt: img.title}))
	})
	$carousel.owlCarousel()
}*/

var requestProgramsList = function($scope, $http, data, success) {
	var preProcess = function(array, prog, id, titleFormat, images, key) {
		$.each(array, function(index, value) {
			if( value.id === id ) {
				images.push({src: value.src, title: titleFormat.format(value.name)})
				if( prog[key] )
					prog[key].push(value)
				else
					prog[key] = value
			}
		})
	}, errorCallback = function(error) {
		$scope.error = error
	}
	$http.get('?programs.json').then(function(response) {
		try {
			var json = response.data
			if( !json || !json.programs ) throw 'Invalid data received'
			$.each(json.programs, function(index, prog){
				prog.icons = []
				prog.languages = []
				prog.proglangs = []
				$.each(prog.prog_lang_ids, function(n, proglang_id) {
					preProcess(json.programming_languages, prog, proglang_id, 'Developed in {0}', prog.icons, 'proglangs')
				})
				preProcess(json.categories, prog, prog.category_id, 'Category: {0}', prog.icons, 'category')
				$.each(prog.lang_ids, function(n, lang_id) {
					preProcess(json.languages, prog, lang_id, 'Available in {0}', prog.icons, 'languages')
				})
			})
			data.progs = json
			if( success ) success()
		} catch(e) {
			errorCallback(e)
		}
	}, errorCallback)
}

var requestWebsitesList = function($scope, $http, data, success) {
	var preProcess = function(array, site, id, titleFormat, images, key) {
		$.each(array, function(index, value) {
			if( value.id === id ) {
				images.push({src: value.src, title: titleFormat.format(value.name)})
				if( site[key] )
					site[key].push(value)
				else
					site[key] = value
			}
		})
	}, errorCallback = function(error) {
		$scope.error = error
	}
	$http.get('?websites.json').then(function(response) {
		try {
			var json = response.data
			if( !json || !json.websites ) throw 'Invalid data received'
			$.each(json.websites, function(index, site){
				site.icons = []
				site.languages = []
				$.each(site.lang_ids, function(n, lang_id) {
					preProcess(json.languages, site, lang_id, 'Available in {0}', site.icons, 'languages')
				})
			})
			data.sites = json
			if( success ) success()
		} catch(e) {
			errorCallback(e)
		}
	}, errorCallback)
}



// define the module
angular.module("myApp", ['ngRoute'])

// routing
.config(['$routeProvider',
	function($routeProvider) {
		$routeProvider.
			when('/home', {
				templateUrl: '?views/home.html',
				controller: 'homeController'
			}).
			when('/programs', {
				templateUrl: '?views/programs.html',
				controller: 'programsController'
			}).
			when('/programs/:prog_id', {
				templateUrl: '?views/view-program.html',
				controller: 'viewProgramController'
			}).
			when('/websites', {
				templateUrl: '?views/websites.html',
				controller: 'websitesController'
			}).
			when('/websites/:site_id', {
				templateUrl: '?views/view-website.html',
				controller: 'viewWebsiteController'
			}).
			when('/istria', {
				templateUrl: '?views/istria.html',
				controller: 'istriaController'
			}).
			when('/drawings', {
				templateUrl: '?views/drawings.html',
				controller: 'drawingsController'
			}).
			// when('/resume', {
				// templateUrl: '?views/resume.html',
				// controller: 'resumeController'
			// }).
			// when('/contact', {
				// templateUrl: '?views/contact.html',
				// controller: 'contactController'
			// }).
			when('/error404', {
				templateUrl: '?views/error404.html',
				controller: 'error404Controller'
			}).
			otherwise({
				redirectTo: '/home'
			})
	}
])

// Stored values
.value('data', {
	progs: null,
	sites: null
})

// Filters
.filter("programsFilter", function () {
	return function (items, textFiler, categoriesFilter, languagesFilter, progLangFilter) {
		if( (!textFiler.trim().length) && (!categoriesFilter.length) && (!languagesFilter.length) && (!progLangFilter.length) ) return items
		var results = [], words = textFiler.trim().toLowerCase().split(/\s+/)
		angular.forEach(items, function (item) {
			var match = true, name = item.name.toLowerCase(), desc = item.description.toLowerCase()
			angular.forEach(words, function(word) {
				match = match && (name.includes(word) || desc.includes(word))
			})
			if( categoriesFilter.length )
				match = match && categoriesFilter.includes(item.category_id)
			if( languagesFilter.length && match ) {
				var langMatch = false
				angular.forEach(item.lang_ids, function(lang_id) {
					langMatch = langMatch || languagesFilter.includes(lang_id)
				})
				match = match && langMatch
			}
			if( progLangFilter.length && match ) {
				var progLangMatch = false
				angular.forEach(item.prog_lang_ids, function(prog_lang_id) {
					progLangMatch = progLangMatch || progLangFilter.includes(prog_lang_id)
				})
				match = match && progLangMatch
			}
			if( match ) results.push(item)
		})
		return results
	}
})

// Controllers
.controller("programsController", ['$scope', '$http', 'data', function ($scope, $http, data) {
	// Init
	defaultController('Programs')
	var callback = function() {
		// init once AJAX data has been loaded
		$scope.data = data.progs
	}
	if( data.progs ) {
		callback()
	} else {
		requestProgramsList($scope, $http, data, callback)
	}
	$scope.textFilter = ''
	$scope.categoryFilter = []
	$scope.languageFilter = []
	$scope.progLangFilter = []
	
	// Functions
	var cssAll = function(filter) { return filter.length ? 'radio-not-selected' : 'radio-selected' },
		cssItem = function(filter, item) { return filter.includes(item.id) ? 'checkbox-selected' : 'checkbox-not-selected' },
		itemClicked = function(event, filter, item, items) {
			var code = item.id, index = _.indexOf(filter, code), addMode = event.ctrlKey || event.shiftKey
			if( index != -1 ) filter.splice(index, 1)
			else if( addMode && filter.length+1 == items.length ) filter.splice(0, filter.length)
			else if( addMode ) filter.push(code)
			else { filter.splice(0, filter.length); filter.push(code) }
		}
	$scope.cssAllCategories = function() { return cssAll($scope.categoryFilter) }
	$scope.cssAllLanguages = function() { return cssAll($scope.languageFilter) }
	$scope.cssAllProgLangs = function() { return cssAll($scope.progLangFilter) }
	$scope.cssCategoryItem = function(category) { return cssItem($scope.categoryFilter, category) }
	$scope.cssLanguageItem = function(language) { return cssItem($scope.languageFilter, language) }
	$scope.cssProgLangItem = function(progLang) { return cssItem($scope.progLangFilter, progLang) }
	$scope.showAllCategoriesClicked = function() { $scope.categoryFilter = [] }
	$scope.showAllLanguagesClicked = function() { $scope.languageFilter = [] }
	$scope.showAllProgLangsClicked = function() { $scope.progLangFilter = [] }
	$scope.categoryItemClicked = function(category) { itemClicked($scope.categoryFilter, category, $scope.data.categories) }
	$scope.languageItemClicked = function(language) { itemClicked($scope.languageFilter, language, $scope.data.languages) }
	$scope.progLangItemClicked = function(event, progLang) { itemClicked(event, $scope.progLangFilter, progLang, $scope.data.programming_languages) }
}])
.controller("viewProgramController", ['$scope', '$http', '$routeParams', '$timeout', 'data', function ($scope, $http, $routeParams, $timeout, data) {
	defaultController('Programs')
	$scope.prog_id = $routeParams.prog_id
	var callback = function() {
		// init once AJAX data has been loaded
		if( !($scope.prog = _.find(data.progs.programs, {id: $scope.prog_id})) )
			throw 'Unknow program ID'
		initCarousel($timeout)
	}
	if( data.progs ) {
		callback()
	} else {
		requestProgramsList($scope, $http, data, callback)
	}
	$scope.languages = function() {
		if( ! $scope.prog ) return ''
		return _.map($scope.prog.languages, function(lang) { return lang.name }).join(', ')
	}
	$scope.programmingLanguages = function() {
		if( ! $scope.prog ) return ''
		return _.map($scope.prog.proglangs, function(progLang) { return progLang.name }).join(', ')
	}
	$scope.dateAndVersion = function() {
		if( ! $scope.prog ) return ''
		var vers = $scope.prog.version, dt = $scope.prog.date, date = new Date(Date.UTC(dt.year, dt.month-1, dt.day, 0,0,0))
		return date.toLocaleDateString() + (vers ? ' (version '+vers+')' : '')
	}
	$scope.isValidProgram = function() {
		return !!$scope.prog
	}
	$scope.dataLoadingFailed = function() {
		return !!$scope.error
	}
	$scope.loadingErrorText = function() {
		if( !$scope.error ) return ''
		if( $scope.error.status ) return 'Oups! '+$scope.error.statusText+' (error '+$scope.error.status+')'
		return $scope.error
	}
	$scope.hasRequirements = function() {
		return $scope.prog && $scope.prog.requirements && $scope.prog.requirements.length
	}
	$scope.enlargeImage = function(image) {
		document.slider.showImage(image, $scope.prog.screenshots)
	}
}])
.controller("websitesController", ['$scope', '$http', 'data', function ($scope, $http, data) {
	// Init
	defaultController('Websites')
	var callback = function() {
		// init once AJAX data has been loaded
		$scope.data = data.sites
	}
	if( data.sites ) {
		callback()
	} else {
		requestWebsitesList($scope, $http, data, callback)
	}
}])
.controller("viewWebsiteController", ['$scope', '$http', '$routeParams', '$timeout', 'data', function ($scope, $http, $routeParams, $timeout, data) {
	defaultController('Websites')
	$scope.site_id = $routeParams.site_id
	var callback = function() {
		// init once AJAX data has been loaded
		if( !($scope.site = _.find(data.sites.websites, {id: $scope.site_id})) )
			throw 'Unknow website ID'
		initCarousel($timeout)
	}
	if( data.progs ) {
		callback()
	} else {
		requestWebsitesList($scope, $http, data, callback)
	}
	$scope.languages = function() {
		if( ! $scope.site ) return ''
		return _.map($scope.site.languages, function(lang) { return lang.name }).join(', ')
	}
	$scope.isValidWebsite = function() {
		return !!$scope.site
	}
	$scope.dataLoadingFailed = function() {
		return !!$scope.error
	}
	$scope.loadingErrorText = function() {
		if( !$scope.error ) return ''
		if( $scope.error.status ) return 'Oups! '+$scope.error.statusText+' (error '+$scope.error.status+')'
		return $scope.error
	}
	$scope.isOffline = function() {
		return $scope.site && $scope.site.offline && $scope.site.offline.year
	}
	$scope.hasUrl = function() {
		return $scope.site && $scope.site.url
	}
	$scope.enlargeImage = function(image) {
		document.slider.showImage(image, $scope.site.screenshots)
	}
}])
.controller("istriaController", ['$scope', '$http', '$timeout', function ($scope, $http, $timeout) {
	defaultController('Project Istria')
	$http.get('?istria.json').then(function(response) {
		$scope.data = response.data
		initCarousel($timeout)
	})
	$scope.date = function(item) {
		if( !item ) return ''
		var dt = item.date, date = new Date(Date.UTC(dt.year, dt.month-1, dt.day, 0,0,0))
		return date.toLocaleDateString()
	}
	$scope.enlargeImage = function(image, images) {
		document.slider.showImage(image, images)
	}
}])
.controller("drawingsController", ['$scope', '$http', function ($scope, $http) {
	defaultController('Drawings')
	$http.get('?drawings.json').then(function(response) {
		$scope.images = response.data
	})
	$scope.enlargeImage = function(image) {
		document.slider.showImage(image, $scope.images, 'src.large')
	}
}])
.controller("homeController", defaultController.bind(this, 'Home'))
.controller("resumeController", defaultController.bind(this, 'Resume'))
.controller("contactController", defaultController.bind(this, 'Contact'))
.controller("error404Controller", defaultController.bind(this, 'Page Not Found'))


// Slider class
function Slider($panel) {
	this.$slider = $panel
	this.$label = $panel.find('.image-title')
	this.$img = $panel.find('img')
	this.spinner = this.$img.attr('src')
	this.$img.draggable({
		axis: 'x',
		start: function(event, ui) {
			this.sliderStartPos = ui.position.left
		}.bind(this),
		drag: function(event, ui) {
			this.sliderCurrentPos = ui.position.left
		}.bind(this),
		revert: function() {
			return ( (this.sliderAction = this.getSliderAction()) === 0 ) // || true
		}.bind(this),
		stop: function(event, ui) {
			this.showImage(this.index + this.sliderAction)
			this.$img.css("left", 0)
		}.bind(this),
		revertDuration: 200
	});
	$panel.find('[aria-action=close]').click( this.hide.bind(this) )
	$(document).keydown( this.onKeyDown.bind(this) )
	$(window).resize( this.onResize.bind(this) )
	this.onResize()
}
Slider.prototype.hide = function() {
	this.$slider.hide()
}
Slider.prototype.showImage = function(image, images, propAt) {
	this.images = images || this.images
	this.propAt = propAt || this.propAt || 'src'
	if( typeof image === 'number' ) {
		if( (image < 0) || (image >= this.images.length) )
			return
		image = this.images[image]
	}
	if( (this.index = _.indexOf(this.images, image)) < 0 )
		return
	this.$img.attr("src", this.spinner) // show the spinner until the picture while the picture loads
	var that = this, src = _(image).at(this.propAt).value()
	$('<img/>').attr("src", src).attr("alt", image.title).one('load', function(event) {
		that.$img.attr("src", src)
	})
	this.$label.html(image.title)
	this.$slider.show()
}
Slider.prototype.getSliderAction = function() {
	var diff = this.sliderCurrentPos - this.sliderStartPos, threshold = 100, imgWidth = parseInt(this.$img.css('width'), 10)
	if( imgWidth ) threshold = imgWidth / 3
	if( Math.abs(diff) < threshold ) return 0
	if( diff < 0 && (this.index < this.images.length-1) ) return 1
	if( diff > 0 && (this.index > 0) ) return -1
	return 0
}
Slider.prototype.onKeyDown = function(event) {
	if( this.$slider.is(':visible') ) {
		switch(event.which) {
			case 27: return this.hide();
			case 37: return this.showImage(this.index - 1);
			case 39: return this.showImage(this.index + 1);
		}
	}
}
Slider.prototype.onResize = function(event) {
	this.$img.css("maxHeight", $(window).height() - 40)
}


// DOM-ready initialization
$(document).ready( function(e) {
  $(".navbar-nav li a").click(function(event) {
		if( (this.href) )
			$(".navbar-collapse").collapse('hide')
  })
	document.slider = new Slider($('.fullscreen-slider'));
})