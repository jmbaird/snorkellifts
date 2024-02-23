(function( $ ) {
	'use strict';

	// Create the defaults once
	var pluginName = "storeLocatorSingle",
		defaults = {
			map_min_height: 300,
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

		this.settings.lat = $(element).data('lat');
		this.settings.lng = $(element).data('lng');

		this._name = pluginName;
		this.init();
	}

	// Avoid Plugin.prototype conflicts
	$.extend( Plugin.prototype, {
		init: function() {
			var that = this;
			this.window = $(window);
			this.documentHeight = $( document ).height();
			this.windowHeight = this.window.height();
			this.settings.singleStoreShowMapZoom = parseInt(that.settings.singleStoreShowMapZoom);
			this.templateCache = {};
			this.bounds = new google.maps.LatLngBounds();

			that.initStoreLocatorSingle();
		},
		initStoreLocatorSingle: function() {
			var that = this;

			that.initMap(function(){
				that.createMarker();  

				if(that.settings.singleStoreLivePosition == "1") {
					that.createLivePosition();
				}
			});
		},
		initMap: function(callback) {

			var that = this;

			var mapContainer = $(this.element);
		    var singleStoreShowMapZoom = this.settings.singleStoreShowMapZoom;
		    var mapDefaultType = this.settings.mapDefaultType;
		    var mapDefaultLat = Number(this.settings.lat);
		    var mapDefaultLng = Number(this.settings.lng);

		    var mapStyling = this.settings.mapStyling;
		    if( !this.isEmpty(mapStyling) ) {
		    	mapStyling = JSON.parse(mapStyling);
		    } else {
		    	mapStyling = "";
		    }

		    var options = {
				zoom: singleStoreShowMapZoom,
				center: new google.maps.LatLng(mapDefaultLat, mapDefaultLng),
				mapTypeId: google.maps.MapTypeId[mapDefaultType],
				scrollwheel: false,
				styles: mapStyling
		    };

		    if(this.settings.singleStoreShowMapDisablePanControl == "1") {
		    	options.panControl = false;
		    }

		    if(this.settings.singleStoreShowMapDisableZoomControl == "1") {
		    	options.zoomControl = false;
		    }

		    if(this.settings.singleStoreShowMapDisableScaleControl == "1") {
		    	options.scaleControl = false;
		    }

		    if(this.settings.singleStoreShowMapDisableStreetViewControl == "1") {
		    	options.streetViewControl = false;
		    }

		    if(this.settings.singleStoreShowMapDisableFullscreenControl == "1") {
		    	options.fullscreenControl = false;
		    }

		    if(this.settings.singleStoreShowMapDisableMapTypeControl == "1") {
		    	options.mapTypeControl = false;
		    }

		    // Construct Map
		   	this.map = new google.maps.Map(mapContainer[0], options);

		    callback();
		},
		createMarker: function() {
		   	var marker;
		   	var store = {};

			store.map = this.map;
			store.position = new google.maps.LatLng(this.settings.lat, this.settings.lng);
			store.icon = this.settings.singleStorenMapIcon;

			this.bounds.extend(store.position);

		    marker = new google.maps.Marker(store);
		    marker.setMap(this.map);
		},
		createLivePosition : function() {

			var that = this;

			if( that.isEmpty(that.settings.live_lat) || that.settings.live_lat == "0" || that.isEmpty(that.settings.live_lng) || that.settings.live_lng == "0") {
				return;
			}

			that.liveStore = {};

			that.liveStore.map = that.map;
			that.liveStore.position = new google.maps.LatLng(that.settings.live_lat, that.settings.live_lng);
			that.liveStore.icon = { "url": that.settings.singleStoreLivePositionMapIcon } ;

		    that.liveStoreMarker = new google.maps.Marker(that.liveStore);
		    that.liveStoreMarker.setMap(that.map);
		    that.liveStoreMarker.position = false;

			setInterval( function(){ 
				
				jQuery.ajax({
					url: that.settings.ajax_url,
					type: 'post',
					dataType: 'JSON',
					data: {
						action: 'get_single_store_live_position',
						post_id: that.settings.post_id,
					},
					success : function( response ) {

						var newLatLngKey = response.lat + response.lng;
						var newPosition = new google.maps.LatLng(response.lat, response.lng);
						if(that.liveStoreMarker.latLngKey == newLatLngKey) {
							return;
						}

						that.liveStoreMarker.latLngKey = newLatLngKey;

						that.liveStoreMarker.setPosition(newPosition);

						that.bounds.extend(newPosition);
						that.map.fitBounds(that.bounds);
					},
					error: function(jqXHR, textStatus, errorThrown) {

					    alert('An Error Occured: ' + jqXHR.status + ' ' + errorThrown + '! Please contact System Administrator!');
					}
				});

			}, that.settings.singleStoreLivePositionInterval);


// // 1. Create a marker and keep a reference to it:

// var latLng = new google.maps.LatLng(-12.042, -77.028333),
//     marker = new google.maps.Marker({ position: latLng , map: map });

// marker.setMap(map);

// // 2. Move it around by setting a new position:

// var newPosition = new google.maps.LatLng(-12.042, -78.028333);
// marker.setPosition(newPosition);

		},
		//////////////////////
		///Helper Functions///
		//////////////////////
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

	$(document).ready(function() {

		$( ".store_locator_single_map_render" ).storeLocatorSingle( 
			store_locator_options
		);

	} );

})( jQuery );