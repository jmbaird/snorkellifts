(function( $ ) {
	'use strict';

	// Create the defaults once
	var pluginName = "storeLocator",
		defaults = {
			store_locator: '#store_locator',

			store_modal: "#store_modal",
			store_modal_button: ".store_modal_button",
			store_modal_close: ".store_modal_close",

			contact_all_stores_modal: "#contact_all_stores_modal",
			contact_all_stores_modal_button: "#contact_all_stores_modal_button",
			contact_all_stores_modal_close: "#contact_all_stores_modal_close",

			map_container: "#store_locator_map",
			map_min_height: 300,
			store_locator_sidebar: '#store_locator_sidebar',
			store_locator_search_box: '#store_locator_search_box',
			result_list: "#store_locator_result_list",
			store_locator_address_field: '#store_locator_address_field',
			store_locator_name_search_field: '#store_locator_name_search_field',
			store_locator_find_stores_button: '#store_locator_find_stores_button',
			store_locator_loading: '#store_locator_loading',
			store_locator_filter_radius: '#store_locator_filter_radius',
			store_locator_filter_categories: '#store_locator_filter_categories',
			store_locator_filter: '#store_locator_filter',
			store_locator_filter_active_filter: '#store_locator_filter_active_filter',
			store_locator_filter_open_close: '#store_locator_filter_open_close',
			store_locator_result_open_close: '#store_locator_result_open_close',
			
			store_locator_filter_content: '#store_locator_filter_content',
			store_locator_filter_checkbox: '.store_locator_filter_checkbox',
			store_locator_filter_select: '.store_locator_filter_select',

			store_locator_along_route_btn: '.wordpress-store-locator-along-route-btn',

			store_locator_form_customer_address: 'input[name="store_locator_form_customer_address"]',
			store_locator_form_store_select: 'select[name="store_locator_form_store_select"]',

			store_locator_embedded_search: '#store_locator_embedded_search',

			store_locator_get_my_position: '#store_locator_get_my_position',
			store_locator_reset_filters: '#store_locator_reset_filters',
			store_locator_get_all_stores: '#store_locator_get_all_stores',
			store_locator_dragged_button: '#store_locator_dragged_button',
			store_locator_nearest_store: '#store_locator_nearest_store',
			store_locator_category_icon: '',
			earthRadi: {
				mi: 3963.1676,
				km: 6378.1,
				ft: 20925524.9,
				mt: 6378100,
				"in": 251106299,
				yd: 6975174.98,
				fa: 3487587.49,
				na: 3443.89849,
				ch: 317053.408,
				rd: 1268213.63,
				fr: 31705.3408
			},
		};

	// The actual plugin constructor
	function Plugin ( element, options ) {
		this.element = element;
		this.settings = $.extend( {}, defaults, options );
		this._defaults = defaults;

		this._name = pluginName;
		this.init();
	}

	// Avoid Plugin.prototype conflicts
	$.extend( Plugin.prototype, {
		init: function() {
			var that = this;
			this.window = $(window);
			this.currentURL = window.location.href;
			this.documentHeight = $( document ).height();
			this.windowHeight = this.window.height();
			this.lastClickedButton = 'search';
			this.settings.mapDefaultZoom = parseInt(that.settings.mapDefaultZoom);
			this.isAlongRouteSearch = false;
			this.templateCache = {};
			this.markers = [];
			this.ownMarker = {};
			this.radiusCircle = {};
			this.categories = {};
			this.onlineOffline = 'all';
			this.filter = {};
			this.address = "";
			this.resultListScrollingActive = false;

			this.product_id = false;
			if(!that.isEmpty(that.getParameterByName('product-id'))) {
				this.product_id = that.getParameterByName('product-id');
			};

			this.settings.hideStoresOnFirstView = false;
			this.isFirsView = true;

			this.geocoder = new google.maps.Geocoder();

			this.mapDiv = $(this.settings.store_locator);


			if(!this.isEmpty(this.mapDiv)){

				var defaultLat = this.mapDiv.data('default-lat');
				if(defaultLat && defaultLat != "") {
					this.settings.mapDefaultLat = defaultLat;
				}

				var defaultLng = this.mapDiv.data('default-lng');
				if(defaultLng && defaultLng != "") {
					this.settings.mapDefaultLng = defaultLng;
				}

				var defaultZoom = this.mapDiv.data('default-zoom');
				if(defaultZoom && defaultZoom != "") {
					this.settings.mapDefaultZoom = defaultZoom;
				}

				var hideStoresOnFirstView = this.mapDiv.data('hide-stores-on-first-view');
				if(hideStoresOnFirstView && hideStoresOnFirstView == "yes") {
					this.settings.hideStoresOnFirstView = true;
				}

				this.setResultListMaxHeight();

				// Check if we have a Modal Button (Product Page)
				if(!this.isEmpty($(this.settings.store_modal_button))){
					this.initModal(function(){
						that.initStoreLocator();
						that.setResultListMaxHeight();
					});
				} else {
					$(this.settings.store_modal_close).hide();
					that.initStoreLocator();
				}

				that.initContactAllStoresModal();
			}

			if(!this.isEmpty($(this.settings.store_locator_form_store_select))){
				that.initForm();
			}

			if(!this.isEmpty($(this.settings.store_locator_embedded_search))){
				that.initEmbeddedSearch();
			}

			if(!this.isEmpty($(this.settings.store_locator_nearest_store))){
				that.initNearestStore();
			}

			that.initListing();
			that.initList();

		},
		setResultListMaxHeight: function() {

			var resultList = $(this.settings.result_list);
			if(this.settings.resultListAutoHeight == "0") {
				return;
			}
			
			var store_locator_sidebar = $(this.settings.store_locator_sidebar);
			var height = store_locator_sidebar.height() + 100;

			if(this.settings.mapFullHeight == "1") {
				height = this.windowHeight - $(this.settings.store_locator_search_box).height();

				var resultListTitle = $('.store_locator_result_list_title');
				if(resultListTitle.length > 0) {
					height = height - resultListTitle.outerHeight();
				}
			} 

			var store_locator_filter_content = $(this.settings.store_locator_filter_content);
			if(store_locator_filter_content.is(":hidden")) {
				height = height + $('#store_locator_filter').height() - 50;
			} 

			if( this.settings.layout == "7" || this.settings.layout == "8" || this.settings.layout == "9" || this.settings.layout == "10" || this.settings.layout == "11" || this.settings.layout == "12") {
				height = $('#store_locator_main').height() + $('#store_locator_search_box').height() + 100;;
			}

			resultList.css('max-height', height);
		},
		initModal: function(callback) {

			var store_modal = $(this.settings.store_modal);
			var store_modal_button = $(this.settings.store_modal_button);
			var store_modal_close = $(this.settings.store_modal_close);
			var that = this;

		    store_modal_button.on('click', function()
		    {
		    	that.product_id = $(this).data('product-id');

		    	store_modal.show();
			    store_modal.modal('show');
			    callback();
		    });

		    store_modal_close.on('click', function()
		    {
		    	store_modal.hide();
		    	$('.modal-backdrop').remove();
			    store_modal.modal('hide');
		    });
		},
		initContactAllStoresModal: function(callback) {

			var contact_all_stores_modal = $(this.settings.contact_all_stores_modal);
			var contact_all_stores_modal_button = $(this.settings.contact_all_stores_modal_button);
			var contact_all_stores_modal_close = $(this.settings.contact_all_stores_modal_close);
			var that = this;


		    contact_all_stores_modal_button.on('click', function(e)
		    {
		    	e.preventDefault();

		    	var resultListItems = $('.store_locator_result_list_item');
		    	if(resultListItems.length < 1) {
		    		alert(that.settings.searchBoxContactAllStoresNoStoresText);
		    		return false;
		    	}

		    	var toEmails = "";
		    	resultListItems.each(function(i, index) {

		    		var email = $(this).find('.store_locator_email a').attr('href');
		    		if(email && email != "") {
		    			email = email.replace('mailto:', '');
		    			toEmails += email + ',';
		    		}

		    	});
		    	console.log(toEmails);

		    	contact_all_stores_modal.show();
			    contact_all_stores_modal.modal('show');

			    contact_all_stores_modal.find('input[name="' + that.settings.searchBoxContactAllStoresFieldName + '"]').val(toEmails);

			    // get emails
		    });

		    contact_all_stores_modal_close.on('click', function()
		    {
		    	contact_all_stores_modal.hide();
		    	$('.modal-backdrop').remove();
			    contact_all_stores_modal.modal('hide');
		    });
		},
		initStoreLocator: function() {
			var that = this;

			// Do not load Map again when Modal gets reopened
			if(that.isEmpty(that.map)){
				that.initMap(function(){
					if(that.settings.searchBoxAutocomplete === "1") {
						that.initAutocomplete();
					}
				    that.initStoreLocatorButton();
				    that.initGetCurrentPositionLink();
				    that.initResetFiltersButton();
				    that.initGetAllStoresLink();
				    that.initAlongRoute();
				    that.autoHeightMap();
				    that.watchMapDragged();
				    that.watchAddressFieldEmpty();
				    that.watchDraggedButton();

				    that.initFilter();
				    that.initResults();

					var predefinedAddress = that.getParameterByName('location');
					if(that.isEmpty(predefinedAddress) && $(that.settings.store_locator_address_field).length > 0) {
						var predefinedAddress = $(that.settings.store_locator_address_field).val();
					}					

					if(that.settings.searchBoxAutolocate === "1" && that.isEmpty(predefinedAddress)) {
						if(that.settings.searchBoxSaveAutolocate === "1") {
							that.getCurrentPosition();
						} else {
							that.getCurrentPosition(false);
						}					 
					} else {
						if(!that.isEmpty(predefinedAddress)) {

							var addressField = $(that.settings.store_locator_address_field);
							addressField.val(predefinedAddress);

							var addressFromField = $('#store_locator_from_field');
							if(addressFromField.length > 0) {
								addressFromField.val(predefinedAddress);
							}

							that.geocodeAddress(predefinedAddress);
						// Default Lat Lng
						} else {
							var currentPosition = new google.maps.LatLng(Number(that.settings.mapDefaultLat), Number(that.settings.mapDefaultLng)); 
							that.setCurrentPosition(currentPosition);
						}
					}		    
				});
			}
		},
		initMap: function(callback) {
			var mapContainer = $(this.settings.map_container);
		    var mapDefaultZoom = this.settings.mapDefaultZoom;
		    var mapDefaultType = this.settings.mapDefaultType;
		    var mapDefaultLat = Number(this.settings.mapDefaultLat);
		    var mapDefaultLng = Number(this.settings.mapDefaultLng);

		    var mapStyling = this.settings.mapStyling;
		    if( !this.isEmpty(mapStyling) ) {
		    	mapStyling = JSON.parse(mapStyling);
		    } else {
		    	mapStyling = "";
		    }

		    var options = {
				zoom: mapDefaultZoom,
				center: new google.maps.LatLng(mapDefaultLat, mapDefaultLng),
				mapTypeId: google.maps.MapTypeId[mapDefaultType],
				// scrollwheel: false,
				options: { 
    				gestureHandling: 'cooperative'
				},
				styles: mapStyling
		    };

		    if(this.settings.mapDisablePanControl == "1") {
		    	options.panControl = false;
		    }

		    if(this.settings.mapDisableZoomControl == "1") {
		    	options.zoomControl = false;
		    }

		    if(this.settings.mapDisableScaleControl == "1") {
		    	options.scaleControl = false;
		    }

		    if(this.settings.mapDisableStreetViewControl == "1") {
		    	options.streetViewControl = false;
		    }

		    if(this.settings.mapDisableFullscreenControl == "1") {
		    	options.fullscreenControl = false;
		    }

		    if(this.settings.mapDisableMapTypeControl == "1") {
		    	options.mapTypeControl = false;
		    }

		    // Construct Map
		   	this.map = new google.maps.Map(mapContainer[0], options );

		    callback();
		},
		getCurrentPosition: function(useCookie) {
			var that = this;

			var ip_geoservice = "https://get.geojs.io/v1/ip/geo.json";

			var cookieLat = that.getCookie('store_locator_lat');
			var cookieLng = that.getCookie('store_locator_lng');
			var currentPosition;

			that.maybeShowLoading();

			if (typeof(useCookie)==='undefined') useCookie = true;

			if(cookieLat !== "" && cookieLng !== "" && useCookie === true){
				currentPosition = new google.maps.LatLng(cookieLat, cookieLng);
			}

			if(typeof(currentPosition) == "undefined") {
				
				if (navigator.geolocation) {

					var options = {
					  enableHighAccuracy: true,
					  timeout: 8000,
					  maximumAge: 0
					};

					navigator.geolocation.getCurrentPosition(function(position) {
					
						var currentPosition = new google.maps.LatLng(position.coords.latitude, position.coords.longitude); 
						document.cookie="store_locator_lat="+position.coords.latitude;
						document.cookie="store_locator_lng="+position.coords.longitude;
						that.setCurrentPosition(currentPosition, true);
					}, function(error) {
						console.log(error);

						if(that.settings.searchBoxAutolocateIP == "1") {

							console.log('Getting position via IP!');
							$.getJSON(ip_geoservice)
								.done(function( location ) {
									var ipLat = location.latitude;
									var ipLng = location.longitude;
									if(ipLat == "" || ipLng == "") {

										if(that.settings.searchBoxAutolocateShowAlert == "1") {
											alert('Could not find your position. Please turn on Browser Geolocation or enter your address manually.');
										} else {
											var currentPosition = new google.maps.LatLng(Number(that.settings.mapDefaultLat), Number(that.settings.mapDefaultLng)); 
											that.setCurrentPosition(currentPosition);
										}
										that.maybeShowLoading();
										return;
									}
									var currentPosition = new google.maps.LatLng(ipLat, ipLng); 
									document.cookie="store_locator_lat="+ipLat;
									document.cookie="store_locator_lng="+ipLng;
									that.setCurrentPosition(currentPosition, true);
							});	
						} else {
							
							console.log('HTML5 Position disabled');
							if(that.settings.searchBoxAutolocateShowAlert == "1") {
								alert('Could not find your position. Please turn on Browser Geolocation or enter your address manually.');
							} else {
								var currentPosition = new google.maps.LatLng(Number(that.settings.mapDefaultLat), Number(that.settings.mapDefaultLng)); 
								that.setCurrentPosition(currentPosition);
							}
							that.maybeShowLoading();
						}

					}, options);

				} else {
					
					if(that.settings.searchBoxAutolocateIP == "1") {

						console.log('Browser Geolocation not supported! Getting position via IP');

						$.getJSON(ip_geoservice)
							.done(function( location ) {
								var ipLat = location.latitude;
								var ipLng = location.longitude;
								if(ipLat == "" || ipLng == "") {

									if(that.settings.searchBoxAutolocateShowAlert == "1") {
										alert('Could not find your position. Please turn on Browser Geolocation or enter your address manually.');
									} else {
										var currentPosition = new google.maps.LatLng(Number(that.settings.mapDefaultLat), Number(that.settings.mapDefaultLng)); 
										that.setCurrentPosition(currentPosition);
									}
									that.maybeShowLoading();
									return;
								}
								var currentPosition = new google.maps.LatLng(ipLat, ipLng); 
								document.cookie="store_locator_lat="+ipLat;
								document.cookie="store_locator_lng="+ipLng;
								that.setCurrentPosition(currentPosition, true);
						});	
					} else {
						console.log('Browser Geolocation not supported!');

						if(that.settings.searchBoxAutolocateShowAlert == "1") {
							alert('Could not find your position. Please turn on Browser Geolocation or enter your address manually.');
						} else {
							var currentPosition = new google.maps.LatLng(Number(that.settings.mapDefaultLat), Number(that.settings.mapDefaultLng)); 
							that.setCurrentPosition(currentPosition);
						}
						that.maybeShowLoading();
					}			
				}

			} else {
				that.setCurrentPosition(currentPosition, true);
			}
		},
		setCurrentPosition: function(latlng, override) {
			var that = this;
			var store_locator_address_field = $(this.settings.store_locator_address_field);

			this.currentPosition = latlng;
			this.lat = latlng.lat();
			this.lng = latlng.lng();

			if(override) {
				that.maybeShowLoading();
			}
			
			if( (store_locator_address_field.val() === "" || override) && that.settings.searchBoxEmptyAddressByDefault == "0") {
				this.geocodeLatLng(function(address){
					store_locator_address_field.val(address);
				});
			}

			// Delete old marker
			if(!this.isEmpty(this.ownMarker)) {
				this.ownMarker.setMap(null);
			}
			
			this.ownMarker = new google.maps.Marker({
				position: latlng,
				map: this.map,
				title: that.settings.trans_your_position,
				icon: this.settings.mapDefaultUserIcon
			});

			if(that.settings.hideStoresOnFirstView && that.isFirsView) {
				that.isFirsView = false;
				return;
			}

			this.drawRadiusCircle(true);
			this.getStores();

		},
		drawRadiusCircle: function(inital) {
			var that = this;
			var mapRadius;
			var distanceUnit = this.settings.mapDistanceUnit;
			var earthRadius = this.settings.earthRadi[distanceUnit];
			var selectedRadius = $(this.settings.store_locator_filter_radius).find(":selected").val();

			if(!this.isEmpty(selectedRadius)){
				this.radius = parseFloat(selectedRadius);
			} else {
				this.radius = parseFloat(this.settings.mapRadius);
			}

			if(!this.isEmpty(this.radiusCircle) && typeof(this.radiusCircle.setMap) !== "undefined") {
				this.radiusCircle.setMap(null);
			}

			if(this.settings.mapDrawRadiusCircle === "0"){
				if(this.settings.mapRadiusToZoom === "1") {
					this.map.setZoom(this.radiusToZoom(this.radius));
				}
				return false;
			}

			mapRadius = (this.radius / earthRadius) * this.settings.earthRadi.mt;
			this.radiusCircle = new google.maps.Circle({
				center: this.currentPosition,
				clickable: true,
				draggable: false,
				editable: false,
				fillColor: that.settings.mapDrawRadiusCircleFillColor,
				fillOpacity: that.settings.mapDrawRadiusCircleFillOpacity / 100,
				map: this.map,
				radius: mapRadius,
				strokeColor: that.settings.mapDrawRadiusCircleStrokeColor,
				strokeOpacity: that.settings.mapDrawRadiusCircleStrokeOpacity / 100,
				strokeWeight: 1
			});

			if(inital !== true) {
				this.map.fitBounds(this.radiusCircle.getBounds());
			}
		},
		initAutocomplete: function() {
			var that = this;
			var addressField = $(this.settings.store_locator_address_field);
			var countryRestrict = this.settings.autocompleteCountryRestrict;
			var type = this.settings.autocompleteType;
			var map = this.map;
			
			if ( !addressField) { return; }

			var autocompleteOptions = {
				fields: ["name", "geometry.location", "place_id", "formatted_address"]
			};
			if(!that.isEmpty(countryRestrict)) {
				autocompleteOptions.componentRestrictions = {'country' : countryRestrict.split(',') };
			}

			if(!that.isEmpty(type)) {
				autocompleteOptions.types = [type];
			} else {
				autocompleteOptions.types = ['geocode'];
			}

			var autocomplete = new google.maps.places.Autocomplete(addressField[0], autocompleteOptions);
			autocomplete.bindTo('bounds', map);

			if($('#store_locator_from_field').length > 0) {
				var autocompleteFrom = new google.maps.places.Autocomplete($('#store_locator_from_field')[0], autocompleteOptions);
				autocompleteFrom.bindTo('bounds', map);

				autocompleteFrom.addListener('place_changed', function(e){
					$(that.settings.store_locator_along_route_btn).trigger('click');
				});

				var autocompleteTo = new google.maps.places.Autocomplete($('#store_locator_to_field')[0], autocompleteOptions);
				autocompleteTo.bindTo('bounds', map);

				autocompleteTo.addListener('place_changed', function(e){
					$(that.settings.store_locator_along_route_btn).trigger('click');
				});
			}

			autocomplete.addListener('place_changed', function(e){
				var place = autocomplete.getPlace();
				if(!that.isEmpty(place.formatted_address)) {
					that.geocodeAddress(place.formatted_address);
				} else {
					// Use First autocomplete result
					if(that.settings.searchBoxAutocompleteFirstResultOnEnter == "1") {
						var firstAutoCompleteResult = $(".pac-container .pac-item:first").text();
						if(firstAutoCompleteResult) {
							$('#store_locator_address_field').val(firstAutoCompleteResult);
							that.geocodeAddress( firstAutoCompleteResult );
						} else {
							that.geocodeAddress(place.name);
						}
						
					} else {
						that.geocodeAddress(place.name);
					}
				}
			});

			var predefinedAddress = that.getParameterByName('location');
			if(!that.isEmpty(predefinedAddress)) {
				addressField.val(predefinedAddress);
				that.geocodeAddress(predefinedAddress);
			}
		},
		initStoreLocatorButton: function() {
			var that = this;
			var button = $(this.settings.store_locator_find_stores_button);
			var addressField = $(this.settings.store_locator_address_field);
			var searchStoreNameField = $(this.settings.store_locator_name_search_field);
			var currentAddress;

			that.searchStoreName = '';

			addressField.on('keypress', function(e) {
				if(e.keyCode == 13) {
					button.trigger('click');
				}

			});

			button.on('click', function(e) {

				e.preventDefault();
				currentAddress = addressField.val();
				currentAddress = addressField.val();

				that.lastClickedButton = 'search';

				if(that.directionsRenderer) {
					that.directionsRenderer.setMap(null);
				}

				if(that.isEmpty(currentAddress) && !that.isEmpty(searchStoreNameField) && !that.isEmpty(searchStoreNameField.val())) {
					that.searchByStoreName(searchStoreNameField.val())
				} else { 
					that.geocodeAddress(currentAddress);
				}
			});
		},
		watchAddressFieldEmpty : function() {
			var that = this;
			var address_field = $(that.settings.store_locator_address_field);

			address_field.on('keyup', function(e) {
				var $this = $(this);
				var val = $this.val()
				if(val == "") {
					$this.css('border', '2px solid red');
				} else {
					$this.css('border', '1px solid #eee');
				}
			});
		},
		initGetCurrentPositionLink: function() {
			
			var that = this;
			var store_locator_get_my_position = $(this.settings.store_locator_get_my_position);
			
			store_locator_get_my_position.on('click', function(e){
				e.preventDefault();
				that.getCurrentPosition(false);
			});
		},
		initResetFiltersButton: function(update) {

			var that = this;
			var store_locator_reset_filters = $(this.settings.store_locator_reset_filters);
			
			store_locator_reset_filters.on('click', function(e){
				e.preventDefault();
				that.resetFilters(true);
			});
			
		},
		resetFilters: function(update) {

			var that = this;

			that.categories = {};
			that.filter = {};
			that.onlineOffline = 'all';

			$(that.settings.store_locator_filter_categories + ' option:selected').removeAttr('selected');
			$('.store_locator_category_filter_image').removeClass('store_locator_category_filter_image_selected');

			$('.store-locator-online-offline-filter').val('all');

			var filterCheckboxes = $(that.settings.store_locator_filter_checkbox);
			var filterSelects = $(that.settings.store_locator_filter_select);

			filterCheckboxes.each(function(i, item) {
	    		var checkbox = $(item);
				checkbox.prop('checked', false);
			});

			filterSelects.each(function(i, item) {
	    		var filterSelect = $(item);
				filterSelect.find('option:selected').removeAttr('selected');
			});

			if(update) {
	    		that.updateActiveFilter();
				that.getStores();
			}
			
		},
		initGetAllStoresLink: function() {
			var that = this;
			var store_locator_get_all_stores = $(this.settings.store_locator_get_all_stores);
			
			store_locator_get_all_stores.on('click', function(e){
				e.preventDefault();

				if(that.settings.searchBoxShowShowAllStoresKeepFilter == "1") {
					that.lat = that.settings.searchBoxShowShowAllStoresLat;
					that.lng = that.settings.searchBoxShowShowAllStoresLng;
					that.radius = 9999999;

					that.getStores();

				} else {
					
					that.maybeShowLoading();

					that.getAllStores('', '', function(response) {

						if(!that.isEmpty(that.radiusCircle) && typeof(that.radiusCircle.setMap) !== "undefined") {
							that.radiusCircle.setMap(null);
						}
						
						if(that.directionsRenderer) {
							that.directionsRenderer.setMap(null);
						}

						that.map.setZoom(parseInt(that.settings.searchBoxShowShowAllStoresZoom));
						var allStoresPosition = new google.maps.LatLng(Number(that.settings.searchBoxShowShowAllStoresLat), Number(that.settings.searchBoxShowShowAllStoresLng)); 
						that.map.setCenter(allStoresPosition);

						that.createMarker(response);
						that.createResultList(response);
						that.maybeShowLoading();
					}, false);
				}
			});
		},
		initAlongRoute : function() {

			var that = this;
			var alongRouteContainer = $('.wordpress-store-locator-along-route-container');
			if(alongRouteContainer.length < 1) {
				return;
			}

			that.directionsService = new google.maps.DirectionsService();
			that.directionsRenderer = new google.maps.DirectionsRenderer();
			that.directionsRenderer.setMap(null);

			$(document).on('click', that.settings.store_locator_along_route_btn, function(e) {
				e.preventDefault();
				
				var from = $('#store_locator_from_field').val();
				var to = $('#store_locator_to_field').val();
				if(that.isEmpty(from) || that.isEmpty(to)) {
					return false;
				}

				that.lastClickedButton = 'alongRoute';

				// Reset regular search
				that.radiusCircle.setMap(null);
				while(that.markers.length){
				    that.markers.pop().setMap(null);
				}

				var request = {
					origin: from,
					destination: to,
					travelMode: "DRIVING"
				};
				
				that.directionsService.route(request, function (result, status) {

					if (status == "OK") {
						that.directionsRenderer.setDirections(result);
						that.directionsRenderer.setMap(that.map);

						var waypoints = that.decodePolyline( result.routes[0].overview_polyline );
						
						that.isAlongRouteSearch = true;
						var tmp = [];
						for(let j = 0; j< waypoints.length; j+= parseInt(that.settings.searchBoxAlongRouteWaypointsInterval) ){
							tmp.push(waypoints[j]);
						}
						waypoints = tmp;

						var searchStoreNameField = $(that.settings.store_locator_name_search_field);
						var searchStoreName = '';
						if(searchStoreNameField.length > 0) {
							searchStoreName = searchStoreNameField.val();
						}

						that.maybeShowLoading();

						jQuery.ajax({
							url: that.settings.ajax_url,
							type: 'post',
							dataType: 'JSON',
							data: {
								action: 'get_along_route_stores',
								latLngs : waypoints,
								categories: that.categories,
								filter: that.filter,
								name: searchStoreName,
								product_id: that.product_id,
							},
							success : function( response ) {
								that.createMarker(response);
								that.createResultList(response);

								that.maybeShowLoading();

								if (window.history.replaceState) {
									that.buildReplaceState();
								}

								that.createMarkerClusterer();

								that.isAlongRouteSearch = false;

							},
							error: function(jqXHR, textStatus, errorThrown) {
							    that.maybeShowLoading();
							    alert('An Error Occured: ' + jqXHR.status + ' ' + errorThrown + '! Please contact System Administrator!');
							}
						});

						

					} else {
						alert( 'Could not calculate Route: ' + status);
					}
				});
				
			});

		},
		maybeShowLoading: function() {
			var store_locator_loading = $(this.settings.store_locator_loading);

			if(store_locator_loading.hasClass('store_locator_hidden'))
			{
				store_locator_loading.removeClass('store_locator_hidden');
			} else {
				store_locator_loading.addClass('store_locator_hidden');
			}
		},
		geocodeAddress: function (address) {
			var that = this;
			var countryRestrict = that.settings.autocompleteCountryRestrict;

			if ( address ) {
				if(!that.isEmpty(countryRestrict)) {
					var address2 = {
						address: address,
						// componentRestrictions : {'country' : countryRestrict }
					};
				} else {
					var address2 = {
						address: address,
					};
				}
				this.geocoder.geocode( address2, function ( results, status ) {
					if ( status === google.maps.GeocoderStatus.OK ) {
						that.setCurrentPosition(results[0].geometry.location);
					}
				} );
			} else {
				$(that.settings.store_locator_address_field).css('border', '2px solid red');
			}
		},
		geocodeLatLng: function (callback) {
			var that = this;
			var latlng = {lat: this.lat, lng: this.lng};

			this.geocoder.geocode({'location': latlng}, function(results, status) {
				if (status === google.maps.GeocoderStatus.OK) {
					if (results[1]) {
						callback(results[1].formatted_address);
					} else {
						window.alert('No results found');
					}
				} else {
					window.alert('Geocoder failed due to: ' + status);
				}
			});
		},
		autoHeightMap: function() {

			var mapContainer = $(this.settings.map_container);

			if(this.settings.mapAutoHeight == "0") {
				mapContainer.css('height', this.settings.mapHeight);
		    	google.maps.event.trigger(this.map, "resize");
				return;
			}
			
			var store_locator_sidebar = $(this.settings.store_locator_sidebar);
		    var mapHeight = $(store_locator_sidebar).height();

		    if(mapHeight < this.settings.map_min_height) {
		    	mapHeight = this.settings.map_min_height;
		    } 

		    if(this.settings.mapFullHeight == "1") {
		    	mapHeight = this.windowHeight;
		    }

		    mapContainer.css('height', mapHeight);
		    google.maps.event.trigger(this.map, "resize");

		},
		getStores: function() {
			var that = this;
			that.maybeShowLoading();

			var searchStoreNameField = $(this.settings.store_locator_name_search_field);
			var searchStoreName = '';
			if(searchStoreNameField.length > 0) {
				searchStoreName = searchStoreNameField.val();
			}

			if(!that.radius) {
				that.drawRadiusCircle();
			}

			jQuery.ajax({
				url: that.settings.ajax_url,
				type: 'post',
				dataType: 'JSON',
				data: {
					action: 'get_stores',
					lat: that.lat,
					lng: that.lng,
					radius: that.radius,
					categories: that.categories,
					filter: that.filter,
					online_offline: that.onlineOffline,
					name: searchStoreName,
					product_id: that.product_id,
				},
				success : function( response ) {
					that.createMarker(response);
					that.createResultList(response);

					that.maybeShowLoading();

					if (window.history.replaceState) {
						that.buildReplaceState();
					}

					if(that.onlineOffline == "online") {
						
						if(!that.isEmpty(that.radiusCircle) && typeof(that.radiusCircle.setMap) !== "undefined") {
							that.radiusCircle.setMap(null);
						}
						
						if(that.directionsRenderer) {
							that.directionsRenderer.setMap(null);
						}

						that.map.setZoom(parseInt(that.settings.onlineOfflineZoom));
						var allStoresPosition = new google.maps.LatLng(Number(that.settings.onlineOfflineLat), Number(that.settings.onlineOfflineLng)); 
						that.map.setCenter(allStoresPosition);
					
					} else {
						that.drawRadiusCircle();
						that.createMarkerClusterer();
					}

					$('#store_locator_result_list').trigger('wordpress_store_locator_get_results_loaded');

				},
				error: function(jqXHR, textStatus, errorThrown) {
				    that.maybeShowLoading();
				    alert('An Error Occured: ' + jqXHR.status + ' ' + errorThrown + '! Please contact System Administrator!');
				}
			});
		},
		createMarkerClusterer : function() {
			
			var that = this;
			if(that.settings.mapMarkerClusterer !== "1") {
				return false;
			}

	        var zoom = that.settings.mapMarkerClustererMaxZoom == "-1" ? null : that.settings.mapMarkerClustererMaxZoom;
	        var size = that.settings.mapMarkerClustererSize == "-1" ? null : that.settings.mapMarkerClustererSize;

	        if(that.markerCluster) {
	        	that.markerCluster.clearMarkers();
        	}
        	
			that.markerCluster = new MarkerClusterer(that.map, that.markers, {
				maxZoom: zoom,
				gridSize: size,
				imagePath:
					"https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m",
			});	
		},
		searchByStoreName : function(storeName) {

			var that = this;
			that.maybeShowLoading();

			jQuery.ajax({
				url: that.settings.ajax_url,
				type: 'post',
				dataType: 'JSON',
				data: {
					action: 'get_stores_by_name',
					name: storeName,
					categories: that.categories,
					filter: that.filter,
					online_offline: that.onlineOffline,
					product_id: that.product_id,
				},
				success : function( response ) {
					
					that.createMarker(response);
					that.createResultList(response);
					that.maybeShowLoading();
					if (window.history.replaceState) {
						that.buildReplaceState();
					}
					that.drawRadiusCircle();
					that.createMarkerClusterer();
				},
				error: function(jqXHR, textStatus, errorThrown) {
				    that.maybeShowLoading();
				    alert('An Error Occured: ' + jqXHR.status + ' ' + errorThrown + '! Please contact System Administrator!');
				}
			});
		},
		createMarker: function(stores) {
			var that = this;
		   	var storesLength = Object.keys(stores).length;
		   	var store;
		   	var i = 0;
		   	var marker;
		   	var map = this.map;
		    var infowindow =  new google.maps.InfoWindow({
		        content: ""
		    });

		    // Clean markers
		    if(!that.isAlongRouteSearch) {
				while(this.markers.length){
				    this.markers.pop().setMap(null);
				}
			}

			// Create Markers
			if(storesLength > 0) {
				for (i; i < storesLength; i++) {  

					store = stores[i];
					if(!store) {
						return true;
					}

					store.map = that.map;
					this.store = store;
					store.position = new google.maps.LatLng(store.lat, store.lng);

					if(!that.isEmpty(store.ic)) {
						store.icon = store.ic;
					} else if(!that.isEmpty(that.settings.store_locator_category_icon)) {
						store.icon = that.settings.store_locator_category_icon;
					} else {
						store.icon = that.settings.mapDefaultIcon;
					}

					// store.animation = google.maps.Animation.DROP;

					// Label?
					// store.label = i.toString();
				    marker = new google.maps.Marker(store);
				    this.markers.push(marker);
				    if(this.settings.infowindowEnabled === "1") {
				    	this.createInfowindow(marker, map, infowindow, store);
				    }
				}
			}
		},
		createInfowindow: function(marker, map, infowindow, store) {
			var that = this;

			var infowindowLinkAction = this.settings.infowindowLinkAction;
			store.infowindowAction = store.gu;
			if(infowindowLinkAction == "web") {
				store.infowindowAction = store.we;
			}
			if(infowindowLinkAction == "tel") {
				store.infowindowAction = 'tel:' + store.te;
			}
			if(infowindowLinkAction == "email") {
				store.infowindowAction = 'mailto:' + store.em;
			}
			if(infowindowLinkAction == "chat") {
				store.infowindowAction = store.ch;
			}

			var infowindowLinkActionNewTab = '';
			if(this.settings.infowindowLinkActionNewTab == "1") {
				infowindowLinkActionNewTab = ' target="_blank" ';
			}

			var premiumClass = '';
			if(store.pr === "1") {
				premiumClass = ' store-locator-is-premium';
			}

		   	if(!that.isEmpty(that.settings.showContactStorePage)) {
				var arr = that.settings.showContactStorePage.split('?');
				if (arr.length > 1 && arr[1] !== '') {
				  	var showContactStorePage = that.settings.showContactStorePage + '&';
				} else {
					var showContactStorePage = that.settings.showContactStorePage + '?';
				}
			}

			var customFields = "";
			if(!that.isEmpty(store.cs)) {

				customFields += '<div class="store_locator_custom_fields">';

					$.each(store.cs, function(i, item){
						customFields += '<span class="store_locator_custom_field">' + item.name + item.value + '<br></span>';
					});

				customFields += '</div>';
			}

			var content = '<div id="store_locator_infowindow_' + store.ID + '" class="store_locator_infowindow ' + premiumClass + '">' +
								'<div class="store-locator-col-sm-' + that.settings.infowindowDetailsColumns + ' store_locator_details">';
								if(this.settings.infowindowLinkAction !== "none") {
									content += '<a href="' + store.infowindowAction + '" ' + infowindowLinkActionNewTab + '>' +
													'<h3 class="store_locator_name">' + store.na + ' <i class="fas fa-chevron-right"></i></h3>' +
												'</a>';
									
								} else {
									content += '<h3 class="store_locator_name">' + store.na + '</h3>';
								}

								if(!that.isEmpty(store.rt) ) {

									var rating = Math.round( store.rt );
									if(rating > 5) {
										rating = 5;
									}

									if(that.settings.showRatingLinkToForm == "1") {
										content += '<a href="' + store.gu + '#store-locator-review">';
									}

									content += '<div class="store_locator_rating">';
									for (var i = 0; i < rating; i++) {
										content += '<span class="store_locator_rating_icon">★</span>';
									}
									content += '(' + rating +' / 5)</div>';

									if(that.settings.showRatingLinkToForm == "1") {
										content += '</a>';
									}
								}

								var filterBadges = "";
								if(!that.isEmpty(store.ca)) {

									if(that.settings.showFilterCategoriesAsImage == "1") {
										filterBadges += '<p class="store_locator_store_category_images">';
										$.each(store.ca, function(i, item){
											filterBadges += '<img src="' + item + '" alt="" />';
										});
										filterBadges += '</p>';
									} else {
										$.each(store.ca, function(i, item){
											filterBadges += that.createBadge(item);
										});
									}
								}

								if(!that.isEmpty(store.fi)) {
									$.each(store.fi, function(i, item){
										filterBadges += that.createBadge(item);
									});
								}

								content += !that.isEmpty(filterBadges) ? '<p class="store_locator_badges">' +
													filterBadges +
												'</p>' : '';

								content += !that.isEmpty(store.dc) ? '<span class="store_locator_distance">' + that.settings.showDistanceText + store.dc + '<br/></span>' : '';

								content += !that.isEmpty(store.ex) ? '<p class="store_locator_excerpt">' +
									'' + store.ex + '' +
								'</p>' : '';

								content += '<p class="store_locator_address">';

					if(that.settings.showAddressStyle == "american") {
						content += !that.isEmpty(store.st) ? '<span class="store_locator_street">' + store.st + '<br/></span>' : '';
						content += !that.isEmpty(store.ct) ? '<span class="store_locator_city">' + store.ct + ', </span>' : '';
						content += !that.isEmpty(store.rg) ? '<span class="store_locator_region">' + store.rg + ' </span>' : '';
						content += !that.isEmpty(store.zp) ? '<span class="store_locator_zip">' + store.zp + '<br/></span>' : '';						
						content += !that.isEmpty(store.co) ? '<span class="store_locator_country">' + store.co + '</span>' : '';
					} else {
						content += !that.isEmpty(store.st) ? '<span class="store_locator_street">' + store.st + '<br/></span>' : '';
						content += !that.isEmpty(store.zp) ? '<span class="store_locator_zip">' + store.zp + '</span>' : '';
						content += !that.isEmpty(store.ct) ? '<span class="store_locator_city">' + store.ct + '<br/></span>' : '';
						content += !that.isEmpty(store.rg) ? '<span class="store_locator_region">' + store.rg + '</span>' : '';
						content += !that.isEmpty(store.co) ? '<span class="store_locator_country">' + store.co + '</span>' : '';
					}

			content +=				'</p>';

			if(!that.isEmpty(store.aa)) {
				content += '<p class="store_locator_after_address">' + store.aa + '</p>';
			}

			content += '<p class="store_locator_contact">';
			content += !that.isEmpty(store.te) ? '<span class="store_locator_tel">' + that.settings.showTelephoneText + '<a href="tel:' + store.te + '">' + store.te + '</a><br/></span>' : '';

		 	if(!that.isEmpty(store.em))  {
		 		if(!that.isEmpty(store.emp))  {
		 			content += '<span class="store_locator_email">' + that.settings.showEmailText + '<a href="mailto:' + store.em + '">' + store.emp + '</a><br/></span>';
	 			} else {
	 				content += '<span class="store_locator_email">' + that.settings.showEmailText + '<a href="mailto:' + store.em + '">' + store.em + '</a><br/></span>';
	 			}
		 	}

			content += !that.isEmpty(store.mo) ? '<span class="store_locator_mobile">' + that.settings.showMobileText + '<a href="tel:' + store.mo + '">' + store.mo + '</a><br/></span>' : '';
			content += !that.isEmpty(store.fa) ? '<span class="store_locator_fax">' + that.settings.showFaxText + store.fa + '<br/></span>' : '';
			content += !that.isEmpty(store.we) ? '<span class="store_locator_website">' + that.settings.showWebsiteText + '<a href="' + store.we + '" target="_blank">' + store.we + '</a><br/></span>' : '';
			content +=				'</p>';

			content += customFields;


			content += '</div>';
								
			if(!that.isEmpty(store.im)) {

				if(this.settings.infowindowLinkAction !== "none") {
					content += 	'<a href="' + store.infowindowAction + '" ' + infowindowLinkActionNewTab + ' class="store-locator-col-sm-' + that.settings.infowindowImageColumns + ' store_locator_image">' +
				 					'<img src="' + store.im + '" class="img-responsive" width="' + that.settings.imageDimensions.width+'" height="' + that.settings.imageDimensions.height+'" />' + 
				 				'</a>';
				} else {
					content += 	'<div class="store-locator-col-sm-' + that.settings.infowindowImageColumns + ' store_locator_image">' +
				 					'<img src="' + store.im + '" class="img-responsive" width="' + that.settings.imageDimensions.width+'" height="' + that.settings.imageDimensions.height+'" />' + 
				 				'</div>';
 				}

			} 

			if(!that.isEmpty(store.op)) {
				content += 		'<div class="store-locator-col-sm-' + that.settings.infowindowOpeningHoursColumns + ' store_locator_opening_hours">' + 
									that.createOpeningHoursTable(store.op, false)+
								'</div>';
			}

			if(!that.isEmpty(store.op2)) {
				content += 		'<div class="store-locator-col-sm-' + that.settings.infowindowOpeningHoursColumns + ' store_locator_opening_hours2">' + 
									that.createOpeningHoursTable(store.op2, true)+
								'</div>';
			}

			content += !that.isEmpty(store.de) ? '<div class="store-locator-col-sm-12 store_locator_description">' +
									'' + store.de + '' +
								'</div>' : '';

			content +=				'<div class="store_locator_actions">';

			content += !that.isEmpty(store.re) ? store.re : '';

			if(that.settings.showGetDirectionEmptySource == "1") {
				content += !that.isEmpty(store.lat) ? '<a href="http://maps.google.com/maps?daddr=' + store.lat + ',' + store.lng + '" class="btn button btn-primary btn-lg store_locator_get_direction" target="_blank"><i class="fas fa-compass"></i> ' + that.settings.showGetDirectionText+'</a>' : '';
			} else {
				content += !that.isEmpty(store.lat) ? '<a href="http://maps.google.com/maps?saddr=' + this.lat + ',' + this.lng + '&daddr=' + store.lat + ',' + store.lng + '" class="btn button btn-primary btn-lg store_locator_get_direction" target="_blank"><i class="fas fa-compass"></i> ' + that.settings.showGetDirectionText+'</a>' : '';
			}

			content += !that.isEmpty(that.settings.showContactStorePage) ? '<a href="' + showContactStorePage + 'store_id=' + store.ID + '&address=' + encodeURIComponent($(that.settings.store_locator_address_field).val()) + '&lat=' + that.lat + '&lng=' + that.lng + '" class="btn button btn-primary btn-lg store_locator_contact_store"><i class="fas fa-paper-plane"></i> ' + that.settings.showContactStoreText+'</a>' : '';

			content += !that.isEmpty(store.te) ? '<a href="tel:' + store.te + '" class="btn button btn-primary btn-lg store_locator_call_now"><i class="fas fa-phone"></i> ' + that.settings.showCallNowText+'</a>' : '';

			content += !that.isEmpty(store.we) ? '<a href="' + store.we + '" class="btn button btn-primary btn-lg store_locator_visit_website" target="_blank"><i class="fas fa-globe"></i> ' + that.settings.showVisitWebsiteText+'</a>' : '';

			content += !that.isEmpty(store.em) ? '<a href="mailto:' + store.em + '" class="btn button btn-primary btn-lg store_locator_write_email"><i class="fas fa-envelope"></i> ' + that.settings.showWriteEmailText+'</a>' : '';

			content += !that.isEmpty(store.ch) ? '<a href="' + store.ch + '" target="_blank" class="btn button btn-primary btn-lg store_locator_chat"><i class="fas fa-video"></i> ' + that.settings.showChatText+'</a>' : '';

			content += !that.isEmpty(that.settings.showVisitStore) ? '<a href="' + store.gu + '" class="btn button btn-primary btn-lg store_locator_visit_store"><i class="fas fa-long-arrow-alt-right"></i> ' + that.settings.showVisitStoreText+'</a>' : '';

			if(that.settings.singleStoreLivePositionActionButton == "1" && !that.isEmpty(store.ll)) {
				content += '<a href="' + store.gu + '#store_locator_single_map" class="btn button btn-primary btn-lg store_locator_show_live_position"><i class="fas fa-search-location"></i> ' + that.settings.singleStoreLivePositionActionButtonText + '</a>';
			}

			if(that.settings.showChooseInventory == "1" && !that.isEmpty(store.mi)) {
				content += '<a href="#" data-id="' + store.mi.id + '" data-name="' + store.mi.name + '" class="btn button btn-primary btn-lg woocommerce-multi-inventory-choose-location"><i class="fas fa-warehouse"></i> ' + that.settings.showChooseInventoryText + '</a>';
			}

			content +=				'</div>';

			content +=		'</div>';

		    marker.addListener('click', function() {

				if(!that.isEmpty(store.ic)) {
					this.setIcon(store.ic);
				} else if(!that.isEmpty(that.settings.store_locator_category_icon)) {
					this.setIcon(that.settings.store_locator_category_icon);
				} else {
					this.setIcon(that.settings.mapDefaultIconHover);
				}

				infowindow.setContent(content);
		        infowindow.open(map, this);

		        $(document).trigger('wordpress_store_locator_infowindow_opened');

		        if(that.settings.mapPanToOnHover == "1") {
		        	that.map.panTo(this.getPosition());
	        	}

	        	if(that.settings.resultListScrollTo) {
		        	var resultItemRow = $('#store_locator_result_list_item_' + store.ID);
		        	if(resultItemRow.length > 0) {
		        		$('.store_locator_result_list_item').removeClass('store_locator_result_list_item_hover');
		        		resultItemRow.addClass('store_locator_result_list_item_hover');

		        		var container = $('#store_locator_result_list');

		        		if(!that.resultListScrollingActive) {
			        		that.resultListScrollingActive = true;

							container.animate({
							    scrollTop: resultItemRow.offset().top - container.offset().top + container.scrollTop()
							}, 100,
						    function() { 
						    	that.resultListScrollingActive = false; 
						    });
						}
		        	}
	        	}
		        
		     	google.maps.event.addListener(map, 'click', function() {
					infowindow.close();
			    });
		     	google.maps.event.addListener(that.radiusCircle, 'click', function() {
					infowindow.close();
			    });
		    });
		    
		    if(that.settings.infowindowOpenOnMouseover == "1") {
			    marker.addListener('mouseover', function() {
			    	if(that.settings.infowindowCheckClosed == "1") {
			    		if(!that.isInfoWindowOpen(infowindow)) {
			        		google.maps.event.trigger(this, 'click');
		        		}
	        		} else {
	        			google.maps.event.trigger(this, 'click');
	        		}
			    });
		    }

		    marker.addListener('mouseout', function() {

				if(!that.isEmpty(store.ic)) {
					this.setIcon(store.ic);
				} else if(!that.isEmpty(that.settings.store_locator_category_icon)) {
					this.setIcon(that.settings.store_locator_category_icon);
				} else {
					this.setIcon(that.settings.mapDefaultIcon);
				}

		    });
		},
		createResultList: function(stores)
		{
			var that = this;
		   	var storesLength = Object.keys(stores).length;
		   	var resultList = $(this.settings.result_list);
		   	var resultListIconEnabled = this.settings.resultListIconEnabled;
		   	var resultListIcon = this.settings.resultListIcon;
		   	var resultListIconSize = this.settings.resultListIconSize;
		   	var resultListIconColor = this.settings.resultListIconColor;

		   	var resultListPremiumIconEnabled = this.settings.resultListPremiumIconEnabled;
		   	var resultListPremiumIcon = this.settings.resultListPremiumIcon;
		   	var resultListPremiumIconSize = this.settings.resultListPremiumIconSize;
		   	var resultListPremiumIconColor = this.settings.resultListPremiumIconColor;

		   	var resultListLinkAction = this.settings.resultListLinkAction;
		   	
		   	var store;
		   	var premiumClass;
		   	var i = 0;
		   	var content;
		   	var filterBadges;

		   	if(!that.isEmpty(that.settings.showContactStorePage)) {
				var arr = that.settings.showContactStorePage.split('?');
				if (arr.length > 1 && arr[1] !== '') {
				  	var showContactStorePage = that.settings.showContactStorePage + '&';
				} else {
					var showContactStorePage = that.settings.showContactStorePage + '?';
				}
			}
			
			if(this.settings.resultListSlider == "1") {
				$('#store_locator_result_list.slick-initialized').slick('unslick');
			}
			
		   	resultList.html('');
		   	if(storesLength > 0) {

				for (i; i < storesLength; i++) {
					store = stores[i];
					if(!store) {
						return true;
					}

					content = '';
					premiumClass = '';
					if(store.pr === "1") {
						premiumClass = ' store-locator-is-premium';
					}

					var resultListLinkAction = this.settings.resultListLinkAction;

					store.resultListLinkAction = store.gu;
					if(resultListLinkAction == "web") {
						store.resultListLinkAction = store.we;
					}
					if(resultListLinkAction == "tel") {
						store.resultListLinkAction = 'tel:' + store.te;
					}
					if(resultListLinkAction == "email") {
						store.resultListLinkAction = 'mailto:' + store.em;
					}
					if(resultListLinkAction == "chat") {
						store.resultListLinkAction = store.ch;
					}

					var resultListLinkActionNewTab = '';
					if(this.settings.resultListLinkActionNewTab == "1") {
						resultListLinkActionNewTab = ' target="_blank" ';
					}

					if(resultListIconEnabled === "1") {
						content	+=	'<div class="store-locator-col-sm-2 store_locator_icon store-locator-hidden-sm store-locator-hidden">' +
											'<i style="color: ' + resultListIconColor +';" class="' + resultListIcon +' ' + resultListIconSize +'"></i>' +
										'</div>' +
										'<div class="store-locator-col-sm-10 store_locator_details ' + premiumClass + '">' +
											'<div class="store-locator-row">';
					} 

					if(that.settings.showImage == "1" && store.im) {

						if(that.settings.imagePosition == "store-locator-image-top") {

							if(this.settings.resultListLinkAction !== "none") {
								content	+=	'<a href="' + store.resultListLinkAction + '" ' + resultListLinkActionNewTab + ' class="store-locator-col-sm-12 store_locator_image_container ' + that.settings.imagePosition + '">';
									content	+=	!that.isEmpty(store.im) ? '<img src="' + store.im + '" class="store-locator-img-responsive" width="' + that.settings.imageDimensions.width+'" height="' + that.settings.imageDimensions.height+'" />' : '';
								content += '</a>';
							} else {
								content	+=	'<div class="store-locator-col-sm-12 store_locator_image_container ' + that.settings.imagePosition + '">';
									content	+=	!that.isEmpty(store.im) ? '<img src="' + store.im + '" class="store-locator-img-responsive" width="' + that.settings.imageDimensions.width+'" height="' + that.settings.imageDimensions.height+'" />' : '';
								content += '</div>';
							}
							
							content	+=	'<div class="store-locator-col-sm-12 store_locator_details ' + premiumClass + '">';
						} else {

							if(this.settings.resultListLinkAction !== "none") {

								content	+=	'<a href="' + store.resultListLinkAction + '" ' + resultListLinkActionNewTab + ' class="store-locator-col-sm-3 store_locator_image_container ' + that.settings.imagePosition + '">';
									content	+=	!that.isEmpty(store.im) ? '<img src="' + store.im + '" class="store-locator-img-responsive" width="' + that.settings.imageDimensions.width+'" height="' + that.settings.imageDimensions.height+'" />' : '';
								content += '</a>';
								
							} else {
								content	+=	'<div class="store-locator-col-sm-3 store_locator_image_container ' + that.settings.imagePosition + '">';
									content	+=	!that.isEmpty(store.im) ? '<img src="' + store.im + '" class="store-locator-img-responsive" width="' + that.settings.imageDimensions.width+'" height="' + that.settings.imageDimensions.height+'" />' : '';
								content += '</div>';
							}

							content	+=	'<div class="store-locator-col-sm-9 store_locator_details ' + premiumClass + '">';
						}	

					} else {
						content	+=	'<div class="store-locator-col-sm-12 store_locator_details ' + premiumClass + '">';
					}

					var name = "";
					if(this.settings.resultListLinkAction !== "none") {
						name += '<a href="' + store.resultListLinkAction + '" ' + resultListLinkActionNewTab + '>' +
										'<h3 class="store_locator_name">' + store.na + ' <i class="fas fa-chevron-right"></i></h3>' +
									'</a>';
						
					} else {
						name += '<h3 class="store_locator_name">' + store.na + '</h3>';
					}

					if(!that.isEmpty(store.rt) ) {
						var rating = Math.round( store.rt );
						if(rating > 5) {
							rating = 5;
						}
									
						if(that.settings.showRatingLinkToForm == "1") {
							name += '<a href="' + store.gu + '#store-locator-review">';
						}

						name += '<div class="store_locator_rating">';
						for (var ii = 1; ii <= rating; ii++) {
							name += '<span class="store_locator_rating_icon">★</span>';
						}
						name += '</div>';

						if(that.settings.showRatingLinkToForm == "1") {
							name += '</a>';
						}
					}

					name += !that.isEmpty(store.dc) ? '<span class="store_locator_distance">' + that.settings.showDistanceText + store.dc + '<br/></span>' : '';

					name += !that.isEmpty(store.ex) ? '<p class="store_locator_excerpt">' +
						'' + store.ex + '' +
					'</p>' : '';

					filterBadges = "";


					var customFields = "";
					if(!that.isEmpty(store.cs)) {

						customFields += '<div class="store_locator_custom_fields">';

							$.each(store.cs, function(i, item){
								customFields += '<span class="store_locator_custom_field">' + item.name + item.value + '<br></span>';
							});

						customFields += '</div>';
					}

					if(!that.isEmpty(store.ca)) {

						if(that.settings.showFilterCategoriesAsImage == "1") {
							filterBadges += '<p class="store_locator_store_category_images">';
							$.each(store.ca, function(i, item){
								filterBadges += '<img src="' + item + '" alt="" />';
							});
							filterBadges += '</p>';
						} else {
							$.each(store.ca, function(i, item){
								filterBadges += that.createBadge(item);
							});
						}
					}

					if(!that.isEmpty(store.fi)) {
						$.each(store.fi, function(i, item){
							filterBadges += that.createBadge(item);
						});
					}

					var filters = "";
					filters += !that.isEmpty(filterBadges) ? '<p class="store_locator_badges">' +
										filterBadges +
									'</p>' : '';

					var address = "";
					address += '<p class="store_locator_address">';

					if(that.settings.showAddressStyle == "american") {
						address += !that.isEmpty(store.st) ? '<span class="store_locator_street">' + store.st + '<br/></span>' : '';
						address += !that.isEmpty(store.ct) ? '<span class="store_locator_city">' + store.ct + ', </span>' : '';
						address += !that.isEmpty(store.rg) ? '<span class="store_locator_region">' + store.rg + ' </span>' : '';
						address += !that.isEmpty(store.zp) ? '<span class="store_locator_zip">' + store.zp + '<br/></span>' : '';						
						address += !that.isEmpty(store.co) ? '<span class="store_locator_country">' + store.co + '</span>' : '';
					} else {
						address += !that.isEmpty(store.st) ? '<span class="store_locator_street">' + store.st + '<br/></span>' : '';
						address += !that.isEmpty(store.zp) ? '<span class="store_locator_zip">' + store.zp + '</span>' : '';
						address += !that.isEmpty(store.ct) ? '<span class="store_locator_city">' + store.ct + '<br/></span>' : '';
						address += !that.isEmpty(store.rg) ? '<span class="store_locator_region">' + store.rg + '</span>' : '';
						address += !that.isEmpty(store.co) ? '<span class="store_locator_country">' + store.co + '</span>' : '';
					}

					address +=				'</p>';

					if(!that.isEmpty(store.aa)) {
						address += '<p class="store_locator_after_address">' + store.aa + '</p>';
					}

					var contact = "";


					contact += 			'<p class="store_locator_contact">';

					contact += !that.isEmpty(store.te) ? '<span class="store_locator_tel">' + that.settings.showTelephoneText + '<a href="tel:' + store.te + '">' + store.te + '</a><br/></span>' : '';

				 	if(!that.isEmpty(store.em))  {
				 		if(!that.isEmpty(store.emp))  {
				 			contact += !that.isEmpty(store.em) ? '<span class="store_locator_email">' + that.settings.showEmailText + '<a href="mailto:' + store.em + '">' + store.emp + '</a><br/></span>' : '';
			 			} else {
			 				contact += !that.isEmpty(store.em) ? '<span class="store_locator_email">' + that.settings.showEmailText + '<a href="mailto:' + store.em + '">' + store.em + '</a><br/></span>' : '';
			 			}
				 	}

					contact += !that.isEmpty(store.mo) ? '<span class="store_locator_mobile">' + that.settings.showMobileText + '<a href="tel:' + store.mo + '">' + store.mo + '</a><br/></span>' : '';
					contact += !that.isEmpty(store.fa) ? '<span class="store_locator_fax">' + that.settings.showFaxText + store.fa + '</span>' : '';
					
					contact += !that.isEmpty(store.we) ? '<span class="store_locator_website">' + that.settings.showWebsiteText + '<a href="' + store.we + '" target="_blank">' + store.we + '</a><br/></span>' : '';
					contact +=				'</p>';
					contact += !that.isEmpty(store.de) ? '<div class="store_locator_result_list_description">' +
															'<p>' + store.de + '</p>' +
														'</div>' : '';
					if(!that.isEmpty(store.op)) {
						contact += 		'<div class="store_locator_opening_hours">' + 
											that.createOpeningHoursTable(store.op, false)+
										'</div>';
					}

					if(!that.isEmpty(store.op2)) {
						contact += 		'<div class="store_locator_opening_hours2">' + 
											that.createOpeningHoursTable(store.op2, true)+
										'</div>';
					}

					var actions = "";

					actions += 				'<div class="store_locator_actions">';

					actions += !that.isEmpty(store.re) ? store.re : '';

					if(that.settings.showGetDirectionEmptySource == "1") {
						actions += !that.isEmpty(store.lat) ? '<a href="http://maps.google.com/maps?daddr=' + store.lat + ',' + store.lng + '" class="btn button btn-primary btn-lg store_locator_get_direction" target="_blank"><i class="fas fa-compass"></i> ' + that.settings.showGetDirectionText+'</a>' : '';
					} else {
						actions += !that.isEmpty(store.lat) ? '<a href="http://maps.google.com/maps?saddr=' + this.lat + ',' + this.lng + '&daddr=' + store.lat + ',' + store.lng + '" class="btn button btn-primary btn-lg store_locator_get_direction" target="_blank"><i class="fas fa-compass"></i> ' + that.settings.showGetDirectionText+'</a>' : '';
					}

					actions += !that.isEmpty(that.settings.showContactStorePage) ? '<a href="' + showContactStorePage + 'store_id=' + store.ID + '&address=' + encodeURIComponent($(that.settings.store_locator_address_field).val()) + '&lat=' + that.lat + '&lng=' + that.lng + '" class="btn button btn-primary btn-lg store_locator_contact_store"><i class="fas fa-paper-plane"></i> ' + that.settings.showContactStoreText+'</a>' : '';

					actions += !that.isEmpty(store.te) ? '<a href="tel:' + store.te + '" class="btn button btn-primary btn-lg store_locator_call_now"><i class="fas fa-phone"></i> ' + that.settings.showCallNowText+'</a>' : '';

					actions += !that.isEmpty(store.we) ? '<a href="' + store.we + '" class="btn button btn-primary btn-lg store_locator_visit_website" target="_blank"><i class="fas fa-globe"></i> ' + that.settings.showVisitWebsiteText+'</a>' : '';

					actions += !that.isEmpty(store.em) ? '<a href="mailto:' + store.em + '" class="btn button btn-primary btn-lg store_locator_write_email"><i class="fas fa-envelope"></i> ' + that.settings.showWriteEmailText+'</a>' : '';

					actions += !that.isEmpty(store.ch) ? '<a href="' + store.ch + '" target="_blank" class="btn button btn-primary btn-lg store_locator_chat"><i class="fas fa-video"></i> ' + that.settings.showChatText+'</a>' : '';

					actions += !that.isEmpty(that.settings.showVisitStore) ? '<a href="' + store.gu + '" class="btn button btn-primary btn-lg store_locator_visit_store"><i class="fas fa-long-arrow-alt-right"></i> ' + that.settings.showVisitStoreText+'</a>' : '';
					
					actions += '<a class="btn button btn-primary btn-lg store_locator_show_on_map"><i class="fas fa-map-marker"></i> ' + that.settings.showShowOnMapText + '</a>';

					if(that.settings.singleStoreLivePositionActionButton == "1" && !that.isEmpty(store.ll)) {
						actions += '<a href="' + store.gu + '#store_locator_single_map" class="btn button btn-primary btn-lg store_locator_show_live_position"><i class="fas fa-search-location"></i> ' + that.settings.singleStoreLivePositionActionButtonText + '</a>';
					}

					if(that.settings.showChooseInventory == "1" && !that.isEmpty(store.mi)) {
						actions += '<a href="#" data-id="' + store.mi.id + '" data-name="' + store.mi.name + '" class="btn button btn-primary btn-lg woocommerce-multi-inventory-choose-location"><i class="fas fa-warehouse"></i> ' + that.settings.showChooseInventoryText + '</a>';
					}
					// 

					if(that.settings.resultListItemLayout == "oneColumn") {
						content += name + filters + address + contact + customFields + actions;
					} else {
						content += '<div class="store-locator-row">';
							content += '<div class="store-locator-col-sm-4">' + name + address + contact + customFields + '</div>';
							content += '<div class="store-locator-col-sm-4">' + filters + '</div>';
							content += '<div class="store-locator-col-sm-4">' + actions + '</div>';
						content += '</div>';
					}

					content += '</div></div>';

					if(resultListIconEnabled === "1") {
						content += '</div>';
					}

					var render = '';
					var resultListItemColumns = that.settings.resultListItemColumns;	

					render = '<div id="store_locator_result_list_item_' + store.ID + '" class="store_locator_result_list_item store-locator-col-12 store-locator-col-md-' + resultListItemColumns +  '">' +
								'<div class="store-locator-row">';

										render += content;

						
					
					if(resultListPremiumIconEnabled === "1" && store.pr === "1") {
						render	+=	'<i style="color: ' + resultListPremiumIconColor +'; position: absolute; top: 5px; z-index: 999999; right: 10px;" class="' + resultListPremiumIcon + ' ' + resultListPremiumIconSize + '"></i>';
					}				

					render +=	'</div>' +
							'</div>';

					resultList.append(render);
				}
			} else {

				if(!that.isAlongRouteSearch) {
					if(this.settings.mapExtendRadius === "1") {
						if(!$(this.settings.store_locator_filter_radius + " option:last").is(":selected")) {
							$(this.settings.store_locator_filter_radius + ' option:selected').prop('selected', false).next().prop('selected', 'selected').trigger('change');
						} else {
							this.noResults();
						}
					} else {
						this.noResults();
					}
				}
			}

			this.autoHeightMap();

			if(!that.isAlongRouteSearch) {
				this.map.setCenter(this.currentPosition);
			}


			this.window.trigger('resize');

			if(this.settings.resultListHover == "1") {
				this.resultItemHover();
			}

			if(this.settings.showShowOnMap == "1") {
				this.showOnMap();
			}

			if(this.settings.resultListSlider == "1") {

				$('#store_locator_result_list').slick({
					infinite: false,
					slidesToShow: 4, //that.settings.testResultListSliderSlidesToShow,
					slidesToScroll: 1, // that.settings.testResultListSliderSlidesToShow,
					prevArrow: '<button type="button" class="slick-prev"><i class="fa fa-chevron-left"></i> </button>',
					nextArrow: '<button type="button" class="slick-next"><i class="fa fa-chevron-right"></i> </button>',
					responsive: [
					{
						breakpoint: 1024,
						settings: {
							slidesToShow: 3,
							slidesToScroll: 3,
						}
					},
					{
						breakpoint: 600,
						settings: {
							slidesToShow: 2,
							slidesToScroll: 2
						}
					},
					{
						breakpoint: 480,
						settings: {
							slidesToShow: 1,
							slidesToScroll: 1
						}
					}
					// You can unslick at a given breakpoint now by adding:
					// settings: "unslick"
					// instead of a settings object
					]
				});
			}

		},
		createOpeningHoursTable: function(openingHours, two) {
			var that = this;

			var table = '';
			$.each(openingHours, function(i, item) {
				if(that.isEmpty(item)) {
					return true;
				}

				if(i % 2 === 0) {
					table += '<div class="store-locator-row">';
					table += '<div class="store-locator-col-sm-12">';
				}
				
				if(two) {
					if(i % 2 === 0) {
						if(i === "0") { table += that.settings.showOpeningHours2Monday; }
						if(i === "2") { table += that.settings.showOpeningHours2Tuesday; }
						if(i === "4") { table += that.settings.showOpeningHours2Wednesday; }
						if(i === "6") { table += that.settings.showOpeningHours2Thursday; }
						if(i === "8") { table += that.settings.showOpeningHours2Friday; }
						if(i === "10") { table += that.settings.showOpeningHours2Saturday; }
						if(i === "12") { table += that.settings.showOpeningHours2Sunday; }

						table += ': ' + item;
					} else {
						table += " - " + item + ' ' + that.settings.showOpeningHours2Clock;
					}
				} else {
					if(i % 2 === 0) {
						if(i === "0") { table += that.settings.showOpeningHoursMonday; }
						if(i === "2") { table += that.settings.showOpeningHoursTuesday; }
						if(i === "4") { table += that.settings.showOpeningHoursWednesday; }
						if(i === "6") { table += that.settings.showOpeningHoursThursday; }
						if(i === "8") { table += that.settings.showOpeningHoursFriday; }
						if(i === "10") { table += that.settings.showOpeningHoursSaturday; }
						if(i === "12") { table += that.settings.showOpeningHoursSunday; }

						table += ': ' + item;
					} else {
						table += " - " + item + ' ' + that.settings.showOpeningHoursClock;
					}
				}


				if(i % 2 !== 0) {
					table += '</div>';
					table += '</div>';
				}
				
			});
			if(!that.isEmpty(table)) {
				if(two) { 
					var title = '<h3 class="store_locator_opening_hours_title2">' + that.settings.showOpeningHours2Text + '</h3>';
				} else {
					var title = '<h3 class="store_locator_opening_hours_title">' + that.settings.showOpeningHoursText + '</h3>';
				}
				table = '<div class="store-locator-opening-hours" id="store-locator-opening-hours">' + table + '</div>';
				table = title + table;
			}

			return table;
		},
		createBadge: function(value) {
			var that = this;

			var badgeCSS = that.slugify(value);
			var template = '<span class="store-locator-badge store-locator-badge-success ' + badgeCSS + '">%s</span> ';

			return that.sprintf(template, value);
		},
		noResults: function() {
		   	var resultList = $(this.settings.result_list);

		   	resultList.html('');
		   	resultList.append('<div class="store-locator-col-12"><p class="store_locator_no_stores">' + this.settings.resultListNoResultsText + '</p></div>');
			this.autoHeightMap();
		},
		resultItemHover: function() {
			var that = this;
			var resultList = $(this.settings.result_list);

			if(that.resultListScrollingActive == true) {
				return;
			}

			$('.store_locator_result_list_item').each(function(i, item){
				$(item).on('mouseenter', function(){
					that.resultListScrollingActive = true;
					google.maps.event.trigger(that.markers[i], 'click');
					that.resultListScrollingActive = false;
				});

				$(item).on('mouseleave', function(){
					that.resultListScrollingActive = true;
					google.maps.event.trigger(that.markers[i], 'mouseout');
					that.resultListScrollingActive = false;
				});
			});
		},
		showOnMap: function() {
			var that = this;
			var resultList = $(this.settings.result_list);

			$('.store_locator_show_on_map').each(function(i, item){
				$(item).on('click', function(){
					google.maps.event.trigger(that.markers[i], 'click');
				});
			});
		},
		initFilter: function() {
			var that = this;
			var store_locator_filter_open_close = $(this.settings.store_locator_filter_open_close);
			var store_locator_filter_icon = store_locator_filter_open_close.find('i');

			store_locator_filter_open_close.on('click', function(){
				that.maybeShowFilter();
			});
			
		    that.watchRadiusSelection();
		    that.watchCategoriesSelection();
		    that.watchCheckboxFilter();
		    that.watchSelectFilter();
		    that.updateActiveFilter();
		    that.watchOnlineOfflineFilters();
		},
		watchOnlineOfflineFilters : function() {

			var that = this;
			var onlineOfflineFilters = $('.store-locator-online-offline-filter');
			if(onlineOfflineFilters.length < 1) {
				return;
			}

			onlineOfflineFilters.on('change', function(e) {

				that.onlineOffline = $(this).val();
				that.getStores();
			});

		},
		maybeShowFilter: function() {
			var that = this;
			var store_locator_filter_content = $(this.settings.store_locator_filter_content);
			var store_locator_filter_open_close = $(this.settings.store_locator_filter_open_close);
			var store_locator_filter_icon = store_locator_filter_open_close.find('i');

			if(store_locator_filter_content.is(":hidden"))
			{
				store_locator_filter_icon.removeClass('fa-chevron-down');
				store_locator_filter_icon.addClass('fa-chevron-up');
				store_locator_filter_content.fadeIn(function() {
					that.setResultListMaxHeight();	
				});
				
			} else {
				store_locator_filter_icon.addClass('fa-chevron-down');
				store_locator_filter_icon.removeClass('fa-chevron-up');
				store_locator_filter_content.fadeOut(function() {
					that.setResultListMaxHeight();	
				});
				
			}
		},
		initResults: function() {
			var that = this;
			var store_locator_result_open_close = $(this.settings.store_locator_result_open_close);
			var store_locator_result_icon = store_locator_result_open_close.find('i');

			store_locator_result_open_close.on('click', function(){
				that.maybeShowResults();
			});
		},
		maybeShowResults: function() {
			var that = this;
			var store_locator_result_content = $(this.settings.result_list);
			var store_locator_result_open_close = $(this.settings.store_locator_result_open_close);
			var store_locator_result_icon = store_locator_result_open_close.find('i');

			if(store_locator_result_content.is(":hidden"))
			{
				store_locator_result_icon.removeClass('fa-chevron-down');
				store_locator_result_icon.addClass('fa-chevron-up');
				store_locator_result_content.fadeIn(function() {
					that.setResultListMaxHeight();	
					that.autoHeightMap();
				});
				
			} else {
				store_locator_result_icon.addClass('fa-chevron-down');
				store_locator_result_icon.removeClass('fa-chevron-up');
				store_locator_result_content.fadeOut(function() {
					that.setResultListMaxHeight();	
					that.autoHeightMap();
				});
				
			}
		},
		watchRadiusSelection: function() {
			var that = this;
			var selectedRadius = $(this.settings.store_locator_filter_radius);

			selectedRadius.on('change', function(){
				that.drawRadiusCircle();

				that.updateActiveFilter();

				if(that.lastClickedButton == "alongRoute") {
					$(that.settings.store_locator_along_route_btn).trigger('click');
				} else {
					that.getStores();
				}
				
			});

			var predefinedRadius = that.getParameterByName('radius');
			if(!that.isEmpty(predefinedRadius)) {
				var options = selectedRadius.find('option');
				$.each(options, function(i, index) {
					var option = $(this);
					option.prop('selected', false);
					if(option.val() == predefinedRadius) {
						option.prop('selected', true);
					}
				});
			}
		},
		watchCategoriesSelection: function() {
			var that = this;
			var selectedCategories = $(this.settings.store_locator_filter_categories);

			if(selectedCategories.length == 0) {
				var selectedCategories = $('.store_locator_category_filter_image');
				var selectedCategoryID = $('.store_locator_category_filter_image[data-selected="selected"]').data('category');

				if(selectedCategoryID > 0) {
					that.categories = {0: selectedCategoryID };
				}

				selectedCategories.on('click', function(){
					var selected = $(this);

					selectedCategoryID = selected.data('category');

					$('.show_for_store_category').hide(function() {
						$('.show_for_store_category').find('select').val('').trigger('change');
						$('.show_for_store_category_' + selectedCategoryID).show();	

					});

					selectedCategories.each(function(i, index) {
						$(this).removeClass('store_locator_category_filter_image_selected');
					});

					selected.addClass('store_locator_category_filter_image_selected');

					var categoryIcon = $(selected).data('icon');
					if(!that.isEmpty(categoryIcon)) {
						that.settings.store_locator_category_icon = categoryIcon;
					} else {
						that.settings.store_locator_category_icon = '';
					}
					that.categories = {0: selectedCategoryID };
					that.updateActiveFilter();

					if(that.lastClickedButton == "alongRoute") {
						$(that.settings.store_locator_along_route_btn).trigger('click');
					} else {
						that.getStores();
					}
				});
			} else {

				var selectedCategoryID = selectedCategories.find(':selected').val();
				var predefinedCategory = that.getParameterByName('category');

				if(isNaN(selectedCategoryID)) {
					return;
				}

				if(!that.isEmpty(predefinedCategory) ) {
					var tst = selectedCategories.val(predefinedCategory);
					selectedCategoryID = predefinedCategory;
				}

				that.categories = {0: selectedCategoryID };
				selectedCategories.on('change', function(){
					var selected = selectedCategories.find(':selected');
					selectedCategoryID = selected.val();

					$('.show_for_store_category').hide(function() {
						$('.show_for_store_category').find('select').val('').trigger('change');
						$('.show_for_store_category_' + selectedCategoryID).show();	
					});

					var categoryIcon = $(selected).data('icon');
					if(!that.isEmpty(categoryIcon)) {
						that.settings.store_locator_category_icon = categoryIcon;
					} else {
						that.settings.store_locator_category_icon = '';
					}
					that.categories = {0: selectedCategoryID };
					that.updateActiveFilter();

					if(that.lastClickedButton == "alongRoute") {
						$(that.settings.store_locator_along_route_btn).trigger('click');
					} else {
						that.getStores();
					}
				});
			}
		},
		watchCheckboxFilter: function() {
			var that = this;
			var filterCheckboxes = $(this.settings.store_locator_filter_checkbox);
			var filterSelects = $(this.settings.store_locator_filter_select);

			var predefinedFilter = that.getQuerystringData('filter[]');
			if(typeof predefinedFilter == 'undefined' ) {
				var predefinedFilter = that.getQuerystringData('filter[0]');
			}

			if(typeof predefinedFilter == 'string' ) {
				predefinedFilter = {0 : predefinedFilter};
			}

			if(typeof predefinedFilter == 'undefined' ) {
				predefinedFilter = {};
			}

		    filterCheckboxes.each(function(i, item) {
		    	var checkbox = $(item);

				if(!that.isEmpty(predefinedFilter)) {
					$.each(predefinedFilter, function(i, index) {

						var isArray = Array.isArray(index) ;
						if(isArray) {

							$.each(index, function(ii, indexx) {
								if(checkbox.prop('name') == indexx) {
									checkbox.prop('checked', 'checked');
								}

							});
						} else {
							if(checkbox.prop('name') == index) {
								checkbox.prop('checked', 'checked');
							}
						}

					});
				}

			    var isChecked = checkbox.is(":checked");

			    if(isChecked) {
			    	var filter = checkbox.prop("name");
			    	that.filter[filter] = filter;
			    }
		    });

			$(filterCheckboxes).on('change', function () {
				that.filter = {};
			    filterCheckboxes.each(function(i, item) {
			    	var checkbox = $(item);
				    var isChecked = checkbox.is(":checked");

				    if(isChecked) {

				    	var filter = checkbox.prop("name");
				    	that.filter[filter] = filter;

				    	var filterLat = checkbox.data('lat');
				    	var filterLng = checkbox.data('lng');
				    	if(filterLat != "" && filterLng != "") {
							var currentPosition = new google.maps.LatLng(Number(filterLat), Number(filterLng)); 
							that.setCurrentPosition(currentPosition);
						}

						var filterZoom = checkbox.data('zoom');
						if(filterZoom != "") {
							that.map.setZoom(filterZoom);
						}

						var filterResetFilters = checkbox.data('reset-filters');
						if(filterResetFilters == "on") {
							// that.resetFilters(false);
						}
				    }
			    });
			    filterSelects.each(function(i, item) {
			    	var select = $(item);
				    var isSelected = select.find(":selected");

				    if(isSelected) {
				    	var filter = isSelected.val();
				    	if(!that.isEmpty(filter)) {
				    		that.filter[filter] = filter;

					    	var filterLat = isSelected.data('lat');
					    	var filterLng = isSelected.data('lng');
					    	if(filterLat != "" && filterLng != "") {
								var currentPosition = new google.maps.LatLng(Number(filterLat), Number(filterLng)); 
								that.setCurrentPosition(currentPosition);
							}

							var filterZoom = isSelected.data('zoom');
							if(filterZoom != "") {
								that.map.setZoom(filterZoom);
							}

							var filterResetFilters = isSelected.data('reset-filters');
							if(filterResetFilters == "on") {
								// that.resetFilters(false);
							}
			    		}
				    }
			    });

				that.updateActiveFilter();

				if(that.lastClickedButton == "alongRoute") {
					$(that.settings.store_locator_along_route_btn).trigger('click');
				} else {
					that.getStores();
				}

			});
		},
		watchSelectFilter: function() {
			var that = this;
			var filterSelects = $(this.settings.store_locator_filter_select);
			var filterCheckboxes = $(this.settings.store_locator_filter_checkbox);

			var predefinedFilter = that.getQuerystringData('filter[]');

			if(typeof predefinedFilter == 'string' ) {
				predefinedFilter = {0 : predefinedFilter};
			}

			if(typeof predefinedFilter == 'undefined' ) {
				predefinedFilter = {};
			}

		    filterSelects.each(function(i, item) {
		    	var select = $(item);
		    	var options = select.find('option');
		    	options.each(function(i, item) {

		    		var option = $(this);
					if(!that.isEmpty(predefinedFilter)) {
						$.each(predefinedFilter, function(i, index) {
							if(option.val() == index) {
								select.val(index);
							}
						});
					}

				    var isSelected = select.find(":selected");
				    if(isSelected) {
				    	var filter = isSelected.val();
				    	if(!that.isEmpty(filter)) {
				    		that.filter[filter] = filter;
				    	}
				    }
			    });
		    });

			$(filterSelects).on('change', function () {
				that.filter = {};
			    filterSelects.each(function(i, item) {
			    	var select = $(item);
				    var isSelected = select.find(":selected");
				    
				    if(isSelected) {

				    	var filter = isSelected.val();
				    	if(!that.isEmpty(filter)) {
				    		that.filter[filter] = filter;
				    		
					    	var filterLat = isSelected.data('lat');
					    	var filterLng = isSelected.data('lng');
					    	if(filterLat != "" && filterLng != "") {
								var currentPosition = new google.maps.LatLng(Number(filterLat), Number(filterLng)); 
								that.setCurrentPosition(currentPosition);
							}

							var filterZoom = isSelected.data('zoom');
							if(filterZoom != "") {
								that.map.setZoom(filterZoom);
							}

							var filterResetFilters = isSelected.data('reset-filters');
							if(filterResetFilters == "on") {
								// that.resetFilters(false);
							}
			    		}
				    }
			    });

			    filterCheckboxes.each(function(i, item) {
			    	var checkbox = $(item);
				    var isChecked = checkbox.is(":checked");

				    if(isChecked) {
				    	var filter = checkbox.prop("name");
				    	that.filter[filter] = filter;

				    	var filterLat = checkbox.data('lat');
				    	var filterLng = checkbox.data('lng');
				    	if(filterLat != "" && filterLng != "") {
							var currentPosition = new google.maps.LatLng(Number(filterLat), Number(filterLng)); 
							that.setCurrentPosition(currentPosition);
						}

						var filterZoom = checkbox.data('zoom');
						if(filterZoom != "") {
							that.map.setZoom(filterZoom);
						}

						var filterResetFilters = checkbox.data('reset-filters');
						if(filterResetFilters == "on") {
							// that.resetFilters(false);
						}
				    }
			    });
				that.updateActiveFilter();

				if(that.lastClickedButton == "alongRoute") {
					$('.wordpress-store-locator-along-route-btn').trigger('click');
				} else {
					that.getStores();
				}
			});
		},
		updateActiveFilter: function()
		{
			var that = this;
			var store_locator_filter = $(this.settings.store_locator_filter);
			var store_locator_filter_active_filter = $(this.settings.store_locator_filter_active_filter);
			var selectedCategories = store_locator_filter.find('select');
			var selectedCheckboxFilters = store_locator_filter.find('input:checked');
			var selectedSelectFilters = store_locator_filter.find('.single_filter_filter select :selected');
			var selectedImageFilters = store_locator_filter.find('.store_locator_category_filter_image_selected');
			
			var template = '<span class="store_locator_filter_active store-locator-badge store-locator-badge-success %s">%s</span> ';
			var append = "";

			store_locator_filter_active_filter.html('');
			selectedCategories.each(function(i, item){
				var val = $(item).find(':selected').val();
				if(val !== "") {
					var text = $(item).find(':selected').text();
					var slug = that.slugify(text);
					append = append + that.sprintf(template, slug, text);
				}				
			});

			selectedCheckboxFilters.each(function(i, item) {
				var text = $(item).val();
				var slug = that.slugify(text);
				append = append + that.sprintf(template, slug, text);
			});

			selectedSelectFilters.each(function(i, item) {
				var text = $(item).val();
				if(!that.isEmpty(text)) {
					var slug = that.slugify(text);
					append = append + that.sprintf(template, slug, text);
				}
			});

			selectedImageFilters.each(function(i, item) {
				var text = $(item).text();
				if(!that.isEmpty(text)) {
					var slug = that.slugify(text);
					append = append + that.sprintf(template, slug, text);
				}
			});

			var showForStoreFilter = $('.show_for_store_filter');
			$.each(showForStoreFilter, function(i, index) {

				var filter = $(this);
				var parentFilter = $('[data-filter-id="' + filter.data('parent-filter-id') + '"]');
				if(!parentFilter) {
					return;
				}

				var parentFilterVal = parentFilter.val();

				if(!parentFilterVal || !parentFilter.is(':checked')) {
					var filterValue = filter.find('option:selected').val();
					delete that.filter[filterValue];
					filter.find('select, input').val('');
				}				

			}).hide();

		    $.each(that.filter, function(i, filter) {
				$('.show_for_store_filter_' + filter).show();
		    });

			store_locator_filter_active_filter.html(append);

		},
		watchResize: function() {
			var store_locator_sidebar = $(this.settings.store_locator_sidebar);
			var store_modal_close = $(this.settings.store_modal_close);
			var windowWidth = this.window.width();

			var top;
			// if(windowWidth < 769) {
			// 	top = store_locator_sidebar.height() * -1;
			// 	store_modal_close.css('top', top);
			// } else {
			// 	top = 20;
			// 	store_modal_close.css('top', top);
			// }
		},
		watchMapDragged : function() {

			var that = this;
			var map = that.map;
			
			var store_locator_dragged_button = $(that.settings.store_locator_dragged_button);
			store_locator_dragged_button.fadeOut();
			
			google.maps.event.addListener(map, 'dragend', function(e) {
				store_locator_dragged_button.fadeIn();
			} );

		},
		watchDraggedButton : function () {

			var that = this;
			var store_locator_dragged_button = $(that.settings.store_locator_dragged_button);

			store_locator_dragged_button.on('click', function(e) {
				store_locator_dragged_button.fadeOut();

				var coords = that.map.getCenter();

				if(that.directionsRenderer) {
					that.directionsRenderer.setMap(null);
				}

				var currentPosition = new google.maps.LatLng(coords.lat(), coords.lng()); 
				that.setCurrentPosition(currentPosition);
			});
		},
		radiusToZoom: function(radius){
		    return Math.round(14-Math.log(radius)/Math.LN2);
		},
		initForm : function() {
			var that = this;

			var predefinedAddress = that.getParameterByName('address');
			var predefinedLat = that.getParameterByName('lat');
			var predefinedLng = that.getParameterByName('lng');
			var addressField = $(this.settings.store_locator_form_customer_address);
			var address = addressField.val();
			var lat, lng;

			if(!that.isEmpty(predefinedAddress) && that.isEmpty(address)) {
				addressField.val(predefinedAddress);
			}

			if(!that.isEmpty(predefinedLat) && !that.isEmpty(predefinedLng)) {
				lat = predefinedLat;
				lng = predefinedLng;
			}

			that.watchFormSelectField();
			that.watchFormAddressField();
			that.initFormAutocomplete();
			that.loadFormStores(lat, lng);

		},
		initNearestStore : function () {
			var that = this;

			var predefinedLat = that.getParameterByName('lat');
			var predefinedLng = that.getParameterByName('lng');
			var lat, lng;

			if (navigator.geolocation) {

				var options = {
				  enableHighAccuracy: true,
				  timeout: 5000,
				  maximumAge: 0
				};

				navigator.geolocation.getCurrentPosition(function(position) {

					var currentPosition = new google.maps.LatLng(position.coords.latitude, position.coords.longitude); 

					jQuery.ajax({
						url: that.settings.ajax_url,
						type: 'post',
						dataType: 'JSON',
						data: {
							action: 'get_nearest_store',
							lat: currentPosition.lat(),
							lng: currentPosition.lng(),
							day: new Date().getDay()
						},
						success : function( response ) {

							var nearestStoreElements = $('.store_locator_nearest_store');

							nearestStoreElements.each(function(i, index) {

								var nearestStoreElement = $(this);
								var showName = nearestStoreElement.data('show-name');
								var showOpening = nearestStoreElement.data('show-opening');
								var textSeparator = nearestStoreElement.data('text-separator');

								var nearestStoreText = '';

								if(showName == "1") {
									nearestStoreText += response.na + textSeparator;
								}

								if(!that.isEmpty(response.st)) {
									nearestStoreText += response.st;
								}

								if(showOpening == "1" && !that.isEmpty(response.op)) {
									nearestStoreText += textSeparator + response.op + ' ' + that.settings.showOpeningHoursClock;
								}

								nearestStoreText = '<a href="' + response.gu + '" class="store_locator_visit_nearest_store">' + nearestStoreText + '</a>';

								nearestStoreElement.html(nearestStoreText);
							})
						},
						error: function(jqXHR, textStatus, errorThrown) {
						    alert('An Error Occured: ' + jqXHR.status + ' ' + errorThrown + '! Please contact System Administrator!');
						}
					});
				}, function(error) {

					var nearestStoreElement = $('.store_locator_nearest_store');
					var deniedText = nearestStoreElement.data('denied-text');

					nearestStoreElement.html(deniedText);

					console.log(error);
				}, options);
			}

		},
		loadFormStores : function(lat, lng) {
			var that = this;

			var storeSelectField = $(this.settings.store_locator_form_store_select);
			var addressField = $(this.settings.store_locator_form_customer_address);
			var address = addressField.val();
			var predefinedStoreId = that.getParameterByName('store_id');

			if( (that.isEmpty(lat) || that.isEmpty(lng)) && !that.isEmpty(address)) {
				that.geocoder.geocode( { 'address': address }, function ( results, status ) {
					if ( status === google.maps.GeocoderStatus.OK ) {
						var location = results[0].geometry.location;
						lat = location.lat();
						lng = location.lng();			
						that.getAllStores(lat, lng, that.storesToSelectField, { store_id : predefinedStoreId, that: that}, true);
					} else {
						that.getAllStores(lat, lng, that.storesToSelectField, { store_id : predefinedStoreId, that: that}, true);
					}
				} );
			} else {
				that.getAllStores(lat, lng, that.storesToSelectField, { store_id : predefinedStoreId, that: that}, true);
			}

		},
		watchFormAddressField : function() {
			var that = this;
			var addressField = $(this.settings.store_locator_form_customer_address);

			addressField.on('focusout', function(e) {
				var $this = $(this);
				var val = $this.val()
				
				that.loadFormStores();
			});
		},
		watchFormSelectField : function () {
			var that = this;
			var storeSelectField = $(this.settings.store_locator_form_store_select);
			var dataName, dataValue;
			storeSelectField.on('change', function(e) {
				var $this = $(this);
				var selected = storeSelectField.find(':selected');
				var val = $this.val()

				var possibleData = [
					'name',
					'address',
					'zip',
					'city',
					'country',
					'region',
					'telephone',
					'mobile',
					'fax',
					'email',
					'website',
				]
				
				$(possibleData).each(function(i, index) {
					var dataName = index;
					var dataValue = selected.data(dataName);

					if(typeof dataValue !== 'undefined') {
						dataValue = dataValue.toString();
					}

					if(that.isEmpty(dataValue)) {
						dataValue = "";
					}
					var inputField = $('input[name="store_locator_form_store_' + dataName + '"]');
					if(inputField.length > 0) {
						inputField.val(dataValue);
					}
					
					var infoField = $('.store_locator_store_info_' + dataName);
					if(infoField.length > 0) {
						if(dataName == "telephone" || dataValue == "mobile") {
							dataValue = '<a href="tel:' + dataValue + '">' + dataValue + '</a>';
						}
						infoField.html(dataValue);
					}
				});
			});
		},
		getAllStores: function(lat, lng, callback, options, contactform) {
			var that = this;

			jQuery.ajax({
				url: that.settings.ajax_url,
				type: 'post',
				dataType: 'JSON',
				data: {
					action: 'get_all_stores',
					lat: lat,
					lng: lng,
					contactform: contactform,
					product_id: that.product_id,
				},
				success : function( response ) {
					callback(response, options);
				},
				error: function(jqXHR, textStatus, errorThrown) {
				    alert('An Error Occured: ' + jqXHR.status + ' ' + errorThrown + '! Please contact System Administrator!');
				}
			});
		},
		// Form 
		initFormAutocomplete: function() {
			var that = this;
			var addressField = $(this.settings.store_locator_form_customer_address);
			var countryRestrict = this.settings.autocompleteCountryRestrict;
			var type = this.settings.autocompleteType;
			var map = this.map;
			
			if ( !addressField) { return; }

			var autocompleteOptions = {
				fields: ["name", "geometry.location", "place_id", "formatted_address"]
			};
			if(!that.isEmpty(countryRestrict)) {
				autocompleteOptions.componentRestrictions = {'country' : countryRestrict.split(',') };
			}

			if(!that.isEmpty(type)) {
				autocompleteOptions.types = [type];
			} else {
				autocompleteOptions.types = ['geocode'];
			}

			var autocomplete = new google.maps.places.Autocomplete(addressField[0], autocompleteOptions);

			autocomplete.addListener('place_changed', function(e){
				var place = autocomplete.getPlace();
				if(!that.isEmpty(place.formatted_address)) {
					addressField.val(place.formatted_address).trigger('focusout');
				} else {
					addressField.val(place.name).trigger('focusout');
				}
			});
		},
		storesToSelectField: function(stores, options) {

			var that = options.that;
			var store_id = options.store_id
			var storeSelectField = $(that.settings.store_locator_form_store_select);
			
			var html = '<option value="">' + that.settings.trans_select_store + '</option>';

			var storesLength = Object.keys(stores).length;
			var i = 0;
			var store;

			var selected;
			var data;
			var disabled;
			if(storesLength > 0) {
				for (i; i < storesLength; i++) { 
					
					store = stores[i];
					if(!store) {
						return true;
					}

					selected = "";
					if(store.ID == store_id) {
						selected = 'selected="selected"';
					}

					data = "";
					if(!that.isEmpty(store.na)) {
						data += ' data-name="' + store.na + '"';
						if(!that.isEmpty(store.distance)) {
							store.distance = parseFloat(store.distance).toFixed(2); 
							store.na = store.na + ' (' + store.distance + ' ' + that.settings.mapDistanceUnit + ')';
						}
					}
					if(!that.isEmpty(store.st)) {
						data += ' data-address="' + store.st + '"';
					}
					if(!that.isEmpty(store.zp)) {
						data += ' data-zip="' + store.zp + '"';
					}
					if(!that.isEmpty(store.ct)) {
						data += ' data-city="' + store.ct + '"';
					}
					if(!that.isEmpty(store.co)) {
						data += ' data-country="' + store.co + '"';
					}
					if(!that.isEmpty(store.rg)) {
						data += ' data-region="' + store.rg + '"';
					}
					if(!that.isEmpty(store.te)) {
						data += ' data-telephone="' + store.te + '"';
					}
					if(!that.isEmpty(store.mo)) {
						data += ' data-mobile="' + store.mo + '"';
					}
					if(!that.isEmpty(store.fa)) {
						data += ' data-fax="' + store.fa + '"';
					}
					if(!that.isEmpty(store.em)) {
						data += ' data-email="' + store.em + '"';
					}
					if(!that.isEmpty(store.we)) {
						data += ' data-website="' + store.we + '"';
					}


					html += '<option value="' + store.ID + '" ' + selected + ' ' +  data + '>' + store.na + '</option>';
				}
			}

			storeSelectField.html(html).trigger('change');
		},
		initEmbeddedSearch : function() {
			var that = this;
			var addressField = $(this.settings.store_locator_address_field);
			var countryRestrict = this.settings.autocompleteCountryRestrict;
			var type = this.settings.autocompleteType;
			var map = this.map;
			
			if ( !addressField) { return; }

			var autocompleteOptions = {};
			if(!that.isEmpty(countryRestrict)) {
				autocompleteOptions.componentRestrictions = {'country' : countryRestrict.split(',') };
			}

			if(!that.isEmpty(type)) {
				autocompleteOptions.types = [type];
			} else {
				autocompleteOptions.types = ['geocode'];
			}

			var autocomplete = new google.maps.places.Autocomplete(addressField[0], autocompleteOptions);

			autocomplete.addListener('place_changed', function(e){
				var place = autocomplete.getPlace();
				if(!that.isEmpty(place.formatted_address)) {
					addressField.val(place.formatted_address).trigger('focusout');
				} else {
					addressField.val(place.name).trigger('focusout');
				}
			});

			var store_locator_get_my_position = $(this.settings.store_locator_get_my_position);
			store_locator_get_my_position.on('click', function(e){
				
				e.preventDefault();

				if (navigator.geolocation) {

					var options = {
					  enableHighAccuracy: true,
					  timeout: 5000,
					  maximumAge: 0
					};

					navigator.geolocation.getCurrentPosition(function(position) {

						if(addressField.val() === "") {
							var currentPosition = new google.maps.LatLng(position.coords.latitude, position.coords.longitude); 

							that.currentPosition = currentPosition;
							that.lat = currentPosition.lat();
							that.lng = currentPosition.lng();

							that.geocodeLatLng(function(address){
								addressField.val(address);
							});
						}
					}, function(error) {
						console.log(error);
					}, options);
				}
			});

			if(that.settings.searchBoxAutolocate === "1") {
				store_locator_get_my_position.trigger('click');
			}
		},
		isInfoWindowOpen : function(infoWindow){
		    var map = infoWindow.getMap();
		    return (map !== null && typeof map !== "undefined");
		},
		buildReplaceState : function() {
			var that = this;
			var address = $(that.settings.store_locator_address_field).val();
			var categories = that.categories;
			var filter = that.filter;
			var radius = that.radius;

			if(that.settings.disableReplaceState == "1") {
				return;
			}


			var queryCheck = that.currentURL.split('?');
			if (queryCheck.length > 1 && queryCheck[1] !== '') {
				var url = that.currentURL + '&';
			} else {
				var url = that.currentURL + '?';
			}
			var url = queryCheck[0] + '?';

			var tmp = "";
			if(!that.isEmpty(address)) {
				tmp += 'location=' + address;
			}

			if(categories[0]) {
				if(tmp == "") {
					tmp += 'category=' + categories[0];
				} else {
					tmp += '&category=' + categories[0];
				}
			}
			
			if(radius) {
				if(tmp == "") {
					tmp += 'radius=' + radius;
				} else {
					tmp += '&radius=' + radius;
				}
			}

			if(filter) {
				var filterLoop = 0;
				$.each(filter, function(i, index) {
					if(filterLoop == 0 && tmp == "") {
						tmp += 'filter[]=' + index;
					} else {
						tmp += '&filter[]=' + index;
					}
					filterLoop++;
				});
			}
			

			window.history.replaceState('test', 'Store Locator', url + tmp);
		},
		initListing : function() {

			if($('.store-locator-listing').length < 1) {
				return;
			}

			$('.store-locator-listing-heading').on('click', function(e) {
				e.preventDefault();

				var $this = $(this);
				var id = $this.data('id');

				if(!$this.hasClass('store-locator-listing-heading-open')) {
					
					$('.store-locator-listing-heading').removeClass('store-locator-listing-heading-open').addClass('store-locator-listing-heading-closed');
					$('.store-locator-listing-content').addClass('store-locator-listing-hidden');
					
					$this.removeClass('store-locator-listing-heading-closed').addClass('store-locator-listing-heading-open');
					$('#store-locator-listing-content-' + id).removeClass('store-locator-listing-hidden').addClass('store-locator-listing-open');
					$('#store-locator-listing-content-' + id + ' .store-locator-listing-post-link').first().trigger('click');
					// open sub content auto
					// $('#store-locator-listing-content-' + id + ' .store-locator-listing-subheading').first().trigger('click');

					var subHeadings = $this.parent().find('.store-locator-listing-subheading');
					$.each(subHeadings, function(i, index) {

						var subHeading = $(this);
						var subHeadingId = $(this).data('id');

						subHeading.removeClass('store-locator-listing-subheading-open').addClass('store-locator-listing-subheading-closed');
						$('#store-locator-listing-content-' + subHeadingId).addClass('store-locator-listing-hidden');

					});

				} else {

					$('.store-locator-listing-heading').removeClass('store-locator-listing-heading-open').addClass('store-locator-listing-heading-closed');
					$('.store-locator-listing-content').addClass('store-locator-listing-hidden');
				}

			});

			$('.store-locator-listing-subheading').on('click', function(e) {
				e.preventDefault();

				var $this = $(this);
				var id = $this.data('id');

				if(!$this.hasClass('store-locator-listing-subheading-open')) {
					
					$('.store-locator-listing-subheading').removeClass('store-locator-listing-subheading-open').addClass('store-locator-listing-subheading-closed');
					$('.store-locator-listing-content-' + id).addClass('store-locator-listing-hidden');
					
					$this.removeClass('store-locator-listing-subheading-closed').addClass('store-locator-listing-subheading-open');
					$('#store-locator-listing-content-' + id).removeClass('store-locator-listing-hidden').addClass('store-locator-listing-open');
					$('#store-locator-listing-content-' + id + ' .store-locator-listing-post-link').first().trigger('click');
				} else {

					$('.store-locator-listing-subheading').removeClass('store-locator-listing-subheading-open').addClass('store-locator-listing-subheading-closed');
					$('#store-locator-listing-content-' + id).addClass('store-locator-listing-hidden');
				}

			});


			$('.store-locator-listing-post-link').on('click', function(e) {
				e.preventDefault();

				var $this = $(this);
				var id = $this.data('id');

				$('.store-locator-listing-post-link').removeClass('store-locator-listing-open');

				$('.store-locator-content-post').addClass('store-locator-listing-hidden');
				$('#store-locator-content-post-' + id).removeClass('store-locator-listing-hidden');
				$this.addClass('store-locator-listing-open');
				// open first post

			});
			// , .store-locator-listing-post-link


// 

		},
		initList : function() {

			var listContainer = $('.wordpress-store-locator-list-container');
			if(listContainer.length < 1) {
				return;
			}

			var that = this;
			var listDistances = $('.wordpress-store-locator-list-item-distance');
			var columns = listContainer.data('columns');
			var orderBy = listContainer.data('orderby');
			var maxResults = listContainer.data('max-results');

			if(listDistances.length > 0) {

				navigator.geolocation.getCurrentPosition(function(position) {
						
					var userLat = position.coords.latitude;
					var userLng = position.coords.longitude;

					listDistances.each(function(i, index) {
						var $this = $(this);

						var lat = $this.data('lat');
						var lng = $this.data('lng');

						if(!lat || lat == "" || !lng || lng == "") {
							return;
						}

						var distance = that.getDistance( lat, lng, userLat, userLng).toFixed(1);
						if(distance && distance > 0 && distance != "") {
							$(this).text(that.settings.showDistanceText + distance + ' ' + that.settings.mapDistanceUnit);
							$(this).parents('.wordpress-store-locator-list-item').attr('data-distance', distance);
						}
					});

					if(orderBy == "distance") {
						var listContainers = $('.wordpress-store-locator-list-items-container');
						$.each(listContainers, function(i, index) {

							var listContainer = $(this);
							var listContainerId = listContainer.data('id');
							var listContainerItems = listContainer.find('.wordpress-store-locator-list-item').parent();
							listContainerItems.sort(function(a, b){
							    return $(a).find('.wordpress-store-locator-list-item').data("distance")-$(b).find('.wordpress-store-locator-list-item').data("distance")
							});
							listContainerItems = listContainerItems.slice(0, maxResults);
			
							// var divListHTML = '<div class="store-locator-row">' + divList.html() + '</div>';

							var targetContainer = $('.wordpress-store-locator-list-items-container[data-id=' + listContainerId + ']');

							targetContainer.html('<div class="store-locator-row"></div>');
							// console.log();
							targetContainer.find('div.store-locator-row').html(listContainerItems);
						});

						// var divList = $(".wordpress-store-locator-list-item").parent();
						// divList.sort(function(a, b){
						//     return $(a).find('.wordpress-store-locator-list-item').data("distance")-$(b).find('.wordpress-store-locator-list-item').data("distance")
						// });


						// divList = divList.slice(0, maxResults);
						// // var divListHTML = '<div class="store-locator-row">' + divList.html() + '</div>';

						// $('.wordpress-store-locator-list-items-container').html('<div class="store-locator-row"></div>');
					
						// $('.wordpress-store-locator-list-items-container > div').html(divList);
					}
				});
			}

		},
		//////////////////////
		///Helper Functions///
		//////////////////////
		getDistance : function(lat1, lon1, lat2, lon2) 
		{

			var distanceUnit = this.settings.mapDistanceUnit;
			var earthRadius = this.settings.earthRadi[distanceUnit];
		  
			var dLat = this.toRad(lat2-lat1);
			var dLon = this.toRad(lon2-lon1);
			var lat1 = this.toRad(lat1);
			var lat2 = this.toRad(lat2);

			var a = Math.sin(dLat/2) * Math.sin(dLat/2) +
			Math.sin(dLon/2) * Math.sin(dLon/2) * Math.cos(lat1) * Math.cos(lat2); 
			var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a)); 
			var d = earthRadius * c;
			return d;
		},
		// Converts numeric degrees to radians
		toRad : function(value) {
		    return value * Math.PI / 180;
		},
		isEmpty: function(obj) {

		    if (obj == null)		return true;
		    if (obj.length > 0)		return false;
		    if (obj.length === 0)	return true;

		    for (var key in obj) {
		        if (hasOwnProperty.call(obj, key)) return false;
		    }

		    return true;
		},
		sprintf: function parse(str) {
		    var args = [].slice.call(arguments, 1),
		        i = 0;

		    return str.replace(/%s/g, function() {
		        return args[i++];
		    });
		},
		getCookie: function(cname) {
		    var name = cname + "=";
		    var ca = document.cookie.split(';');
		    for(var i=0; i<ca.length; i++) {
		        var c = ca[i];
		        while (c.charAt(0)==' ') c = c.substring(1);
		        if (c.indexOf(name) === 0) return c.substring(name.length, c.length);
		    }
		    return "";
		},
		slugify : function (text) {
		  return text.toString().toLowerCase()
		    .replace(/\s+/g, '-')           // Replace spaces with -
		    .replace(/[^\w\-]+/g, '')       // Remove all non-word chars
		    .replace(/\-\-+/g, '-')         // Replace multiple - with single -
		    .replace(/^-+/, '')             // Trim - from start of text
		    .replace(/-+$/, '');            // Trim - from end of text
		},
		getParameterByName : function (name, url) {
		    if (!url) url = window.location.href;
		    name = name.replace(/[\[\]]/g, "\\$&");
		    var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
		        results = regex.exec(url);
		    if (!results) return null;
		    if (!results[2]) return '';
		    return decodeURIComponent(results[2].replace(/\+/g, " "));
		},
		getQuerystringData : function (name) {
		    var data = { };
		    var parameters = window.location.search.substring(1).split("&");
		    for (var i = 0, j = parameters.length; i < j; i++) {
		        var parameter = parameters[i].split("=");
		        var parameterName = decodeURIComponent(parameter[0]);
		        var parameterValue = typeof parameter[1] === "undefined" ? parameter[1] : decodeURIComponent(parameter[1]);
		        var dataType = typeof data[parameterName];
		        if (dataType === "undefined") {
		            data[parameterName] = parameterValue;
		        } else if (dataType === "array") {
		            data[parameterName].push(parameterValue);
		        } else {
		            data[parameterName] = [data[parameterName]];
		            data[parameterName].push(parameterValue);
		        }
		    }
		    return typeof name === "string" ? data[name] : data;
		},
		decodePolyline : function (polyline) {

		  var _ = {};

		  _.Ya = function(a, b, c) {
		    null != b && (a = Math.max(a, b));
		    null != c && (a = Math.min(a, c));
		    return a
		  };
		  _.Za = function(a, b, c) { c -= b; return ((a - b) % c + c) % c + b };
		  _.w = function(a) { return a ? a.length : 0 };

		  _.E = function(a, b, c) {
		    a -= 0;
		    b -= 0;
		    c || (a = _.Ya(a, -90, 90), 180 != b && (b = _.Za(b, -180, 180)));
		    this.lat = function() { return a };
		    this.lng = function() { return b }
		  };

		  function decodePath(a) {
		    for (var b = _.w(a), c = Array(Math.floor(a.length / 2)), d = 0, e = 0, f = 0, g = 0; d < b; ++g) {
		      var h = 1,
		        l = 0,
		        n;
		      do n = a.charCodeAt(d++) - 63 - 1, h += n << l, l += 5; while (31 <= n);
		      e += h & 1 ? ~(h >> 1) : h >> 1;
		      h = 1;
		      l = 0;
		      do n = a.charCodeAt(d++) - 63 - 1, h += n << l, l += 5; while (31 <= n);
		      f += h & 1 ? ~(h >> 1) : h >> 1;
		      c[g] = new _.E(1E-5 * e, 1E-5 * f, !0)
		    }
		    c.length = g;
		    return c
		  }

		  var result = decodePath(polyline).map(function(el) {
		      return {lat:Number(el.lat().toFixed(5)),lng:Number(el.lng().toFixed(5))};
		  });

		  return result;

		}
	} );

	// Constructor wrapper
	$.fn[ pluginName ] = function( options ) {
		return this.each( function() {
			if ( !$.data( this, "plugin_" + pluginName ) ) {
				$.data( this, "plugin_" +
					pluginName, new Plugin( this, options ) );
			}
		} );
	};

	// $.fn.emulateTransitionEnd = function (duration) {
	// 	var called = false
	// 	var $el = this
	// 	$(this).one('bsTransitionEnd', function () { called = true })
	// 	var callback = function () { if (!called) $($el).trigger($.support.transition.end) }
	// 	setTimeout(callback, duration)
	// 	return this
	// }

	$(document).ready(function() {

		var mapsLoaded;



		mapsLoaded = setInterval( function() {
			if ( typeof google === 'object' && typeof google.maps === 'object' ) {
				clearInterval( mapsLoaded );

				$( "body" ).storeLocator( 
					store_locator_options
				);

			}
		}, 500 );
	} );

})( jQuery );