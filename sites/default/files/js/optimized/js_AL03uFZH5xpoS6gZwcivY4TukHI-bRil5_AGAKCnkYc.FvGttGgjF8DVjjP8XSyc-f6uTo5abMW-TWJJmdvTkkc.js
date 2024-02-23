/* Source and licensing information for the line(s) below can be found at http://www.snorkellifts.com/modules/contrib/geofield_map/js/geofield_map_gmap_formatter.js. */
(function(e,t){'use strict';t.behaviors.geofieldGoogleMap={attach:function(o,a){function n(e){if(a['geofield_google_map'][e]&&!t.geoFieldMapFormatter.map_data[e]){let map_settings=a['geofield_google_map'][e]['map_settings'];let data=a['geofield_google_map'][e]['data'];t.geoFieldMapFormatter.map_data[e]=map_settings;t.geoFieldMapFormatter.loadGoogle(e,map_settings.gmap_api_key,map_settings.map_additional_libraries,function(){if(!document.getElementById(e)){return};t.geoFieldMapFormatter.map_initialize(e,map_settings,data,o)})}};if(a['geofield_google_map']){let mapObserver=null;if('IntersectionObserver' in window){mapObserver=new IntersectionObserver(function(e,t){for(var o=0;o<e.length;o++){if(e[o].isIntersecting){const mapId=e[o].target.id;n(mapId)}}})};once('geofield-processed','html .geofield-google-map').forEach(function(t){const mapId=e(t).attr('id');if(a['geofield_google_map'][mapId]){const map_settings=a['geofield_google_map'][mapId]['map_settings'];if(mapObserver&&map_settings['map_lazy_load']['lazy_load']){mapObserver.observe(t)}
else{n(mapId)}}})}}};t.geoFieldMapFormatter={map_start:{center:{lat:41.85,lng:-87.65},zoom:18},map_data:{},maps_api_loading:!1,googleMapsLanguage:function(e){switch(e){case'zh-hans':e='zh-CN';break;case'zh-hant':e='zh-TW';break};return e},googleCallback:function(){let self=this;e(document).ready(function(e){self.googleCallbacks.forEach(function(e){e.callback()});self.googleCallbacks=[]})},addCallback:function(e){let self=this;self.googleCallbacks=self.googleCallbacks||[];self.googleCallbacks.push({callback:e})},loadGoogle:function(t,o,a,n){let self=this;let html_language=e('html').attr('lang')||'en';self.addCallback(n);if(typeof google==='undefined'||typeof google.maps==='undefined'){if(self.maps_api_loading===!0){return};self.maps_api_loading=!0;let scriptPath=self.map_data[t]['gmap_api_localization']+'?v=3.exp&sensor=false&language='+self.googleMapsLanguage(html_language);if(o){scriptPath+='&key='+o};if(a){let libraries=[];for(let library in a){if(a.hasOwnProperty(library)){libraries.push(library)}};scriptPath+='&libraries='+libraries.join()};e.getScript(scriptPath).done(function(){self.maps_api_loading=!1;self.googleCallback()})}
else{self.googleCallback()}},checkImage:function(e,t,o){let img=new Image();img.src=e;img.onload=t;img.onerror=o},place_feature:function(e,t){let self=this;let icon_image=null;if(e.geojsonProperties.icon&&e.geojsonProperties.icon.length>0){icon_image=e.geojsonProperties.icon};let oms=self.map_data[t].oms?self.map_data[t].oms:null;if(e.setIcon&&icon_image&&icon_image.length>0){self.checkImage(icon_image,function(){e.setIcon(icon_image)})};let map=self.map_data[t].map;if(e.setTitle&&e.geojsonProperties.tooltip){e.setTitle(e.geojsonProperties.tooltip)};if(e.getPosition){if(oms){self.map_data[t].oms.addMarker(e)}
else{e.setMap(map)};let entity_id=e['geojsonProperties']['entity_id'];if(self.map_data[t].geofield_cardinality&&self.map_data[t].geofield_cardinality!==1){let i=0;while(self.map_data[t].markers[entity_id+'-'+i]){i++};self.map_data[t].markers[entity_id+'-'+i]=e}
else{self.map_data[t].markers[entity_id]=e};self.map_data[t].map_bounds.extend(e.getPosition());let clickListener=oms?'spider_click':'click';google.maps.event.addListener(e,clickListener,function(){self.infowindow_open(t,e)})};if(e.getPath){let feature_options=e.geojsonProperties.path_options?JSON.parse(e.geojsonProperties.path_options):{};e.setOptions(feature_options);e.setMap(map);let path=e.getPath();path.forEach(function(e){self.map_data[t].map_bounds.extend(e)});google.maps.event.addListener(e,'click',function(o){self.infowindow_open(t,e,o.latLng)})}},infowindow_open:function(e,t,o){let self=this;let map=self.map_data[e].map;let properties=t.get('geojsonProperties');if(t.setTitle&&properties&&properties.title){t.setTitle(properties.title)};map.infowindow.close();if(properties.description){map.infowindow.setContent(properties.description);map.infowindow.setPosition(o);setTimeout(function(){map.infowindow.open(map,t)},200)}},map_refresh:function(e){let self=this;setTimeout(function(){google.maps.event.trigger(self.map_data[e].map,'resize')},10)},map_initialize:function(o,a,n,l){let self=this;e.noConflict();if(google&&google.maps){let styledMapType;let mapOptions={center:a.map_center?new google.maps.LatLng(a.map_center.lat,a.map_center.lon):new google.maps.LatLng(42,12.5),zoom:a.map_zoom_and_pan.zoom.initial?parseInt(a.map_zoom_and_pan.zoom.initial):8,minZoom:a.map_zoom_and_pan.zoom.min?parseInt(a.map_zoom_and_pan.zoom.min):1,maxZoom:a.map_zoom_and_pan.zoom.max?parseInt(a.map_zoom_and_pan.zoom.max):20,gestureHandling:a.map_zoom_and_pan.gestureHandling||'auto',mapTypeId:a.map_controls.map_type_id||'roadmap'};if(!a.map_zoom_and_pan.scrollwheel&&!a.map_zoom_and_pan.gestureHandling){mapOptions.scrollwheel=!1};if(!a.map_zoom_and_pan.draggable&&!a.map_zoom_and_pan.gestureHandling){mapOptions.draggable=!1};if(a.map_controls.disable_default_ui){mapOptions.disableDefaultUI=a.map_controls.disable_default_ui}
else{if(a.custom_style_map&&a.custom_style_map.custom_style_control&&a.custom_style_map.custom_style_name.length>0&&a.custom_style_map.custom_style_options.length>0){let customMapStyleName=a.custom_style_map.custom_style_name;let customMapStyle=JSON.parse(a.custom_style_map.custom_style_options);styledMapType=new google.maps.StyledMapType(customMapStyle,{name:customMapStyleName});a.map_controls.map_type_control_options_type_ids.push('custom_styled_map')};mapOptions.zoomControl=!!a.map_controls.zoom_control;mapOptions.mapTypeControl=!!a.map_controls.map_type_control;mapOptions.mapTypeControlOptions={mapTypeIds:a.map_controls.map_type_control_options_type_ids?a.map_controls.map_type_control_options_type_ids:['roadmap','satellite','hybrid'],position:google.maps.ControlPosition.TOP_LEFT};mapOptions.scaleControl=!!a.map_controls.scale_control;mapOptions.streetViewControl=!!a.map_controls.street_view_control;mapOptions.fullscreenControl=!!a.map_controls.fullscreen_control};if(a.map_additional_options.length>0){let additionalOptions=JSON.parse(a.map_additional_options);for(let prop in additionalOptions){if(additionalOptions.hasOwnProperty(prop)){if(additionalOptions[prop]==='true'){additionalOptions[prop]=!0};if(additionalOptions[prop]==='false'){additionalOptions[prop]=!1}}};e.extend(mapOptions,additionalOptions)};let map=new google.maps.Map(document.getElementById(o),mapOptions);if(a.map_zoom_and_pan.map_reset){let mapResetControlPosition=a.map_zoom_and_pan.map_reset_position||'TOP_RIGHT';let mapResetControlDiv=document.createElement('div');mapResetControlDiv.style.zIndex='10';mapResetControlDiv.index=1;new self.map_reset_control(mapResetControlDiv,o);map.controls[google.maps.ControlPosition[mapResetControlPosition]].push(mapResetControlDiv)};if(t.geoFieldMapGeocoder&&a.map_geocoder.control){let mapGeocoderControlPosition=a.map_geocoder.settings.position||'TOP_RIGHT';let mapGeocoderControlDiv=document.createElement('div');t.geoFieldMapFormatter.map_data[o].geocoder_control=new t.geoFieldMapGeocoder.map_control(mapGeocoderControlDiv,o);mapGeocoderControlDiv.index=1;map.controls[google.maps.ControlPosition[mapGeocoderControlPosition]].push(t.geoFieldMapFormatter.map_data[o].geocoder_control);t.geoFieldMapGeocoder.map_control_autocomplete(o,a.map_geocoder.settings,e(t.geoFieldMapFormatter.map_data[o].geocoder_control),'formatter','gmap')};if(styledMapType){map.mapTypes.set('custom_styled_map',styledMapType);if(a.custom_style_map&&a.custom_style_map.custom_style_default){map.setMapTypeId('custom_styled_map')}};self.map_data[o].map=map;self.map_data[o].map_options=mapOptions;self.map_data[o].features=n.features;self.map_data[o].markers={};self.map_data[o].map_bounds=new google.maps.LatLngBounds();self.map_data[o].zoom_force=!!a.map_zoom_and_pan.zoom.force;self.map_data[o].center_force=!!a.map_center.center_force;let features=[];for(let i in n.features){features[i]=t.googleGeoJson(n.features[i])};if(features.length>0){if(a.map_oms&&a.map_oms.map_oms_control&&OverlappingMarkerSpiderfier){let omsOptions=a.map_oms.map_oms_options.length>0?JSON.parse(a.map_oms.map_oms_options):{markersWontMove:!0,markersWontHide:!0,basicFormatEvents:!0,keepSpiderfied:!0};self.map_data[o].oms=new OverlappingMarkerSpiderfier(map,omsOptions)};map.infowindow=new google.maps.InfoWindow({content:''});google.maps.event.addListener(map.infowindow,'domready',function(){let element=document.createElement('div');element.innerHTML=map.infowindow.getContent().trim();let content=e('[data-geofield-google-map-ajax-popup]',element);if(content.length){let url=content.data('geofield-google-map-ajax-popup');t.ajax({url:url}).execute()};e(element).each(function(){t.attachBehaviors(this,drupalSettings)})});if(features.setMap){self.place_feature(features,o)}
else{for(let i in features){if(features[i].setMap){self.place_feature(features[i],o)}
else{for(let j in features[i]){if(features[i][j].setMap){self.place_feature(features[i][j],o)}}}}};if(typeof MarkerClusterer!=='undefined'&&a.map_markercluster.markercluster_control){let markeclusterOption={imagePath:'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m'};if(a.map_markercluster.markercluster_additional_options.length>0){let markeclusterAdditionalOptions=JSON.parse(a.map_markercluster.markercluster_additional_options);e.extend(markeclusterOption,markeclusterAdditionalOptions)};let markerCluster=[];let keys=Object.keys(self.map_data[o].markers);for(let k=0;k<keys.length;k++){markerCluster.push(self.map_data[o].markers[keys[k]])};self.map_data[o].markerCluster=new MarkerClusterer(map,markerCluster,markeclusterOption)};if(!self.mapBoundsAreNull(self.map_data[o].map_bounds)&&!self.map_data[o].center_force){map.fitBounds(self.map_data[o].map_bounds)}
else if(self.map_data[o].markers.constructor===Object&&self.mapBoundsAreNull(self.map_data[o].map_bounds)&&!self.map_data[o].center_force){map.setCenter(self.map_data[o].markers[Object.keys(self.map_data[o].markers)[0]].getPosition())}};google.maps.event.addListenerOnce(map,'bounds_changed',function(){if(self.map_data[o].zoom_force){self.map_data[o].map.setZoom(self.map_data[o].map_options.zoom)}});google.maps.event.addListenerOnce(map,'idle',function(){if(self.map_data[o].map_marker_and_infowindow.force_open&&parseInt(self.map_data[o].map_marker_and_infowindow.force_open)===1){self.infowindow_open(o,features[0])};if(!self.map_data[o].zoom_force&&self.map_data[o].map_zoom_and_pan.zoom.finer&&self.map_data[o].map_zoom_and_pan.zoom.finer!==0){map.setOptions({zoom:map.getZoom()+parseInt(self.map_data[o].map_zoom_and_pan.zoom.finer)})};self.map_set_start_state(o,map.getCenter(),map.getZoom());e(l).trigger('geofieldMapInit',o)})}},mapBoundsAreNull:function(e){let north_east=e.getNorthEast();let south_west=e.getSouthWest();return north_east.toString()===south_west.toString()},map_set_start_state:function(e,t,o){let self=this;self.map_data[e].map_start_center=t;self.map_data[e].map_start_zoom=o},map_reset_control:function(e,o){let controlUI=document.createElement('div');controlUI.style.backgroundColor='#fff';controlUI.style.boxShadow='rgba(0,0,0,.3) 0px 1px 4px -1px';controlUI.style.cursor='pointer';controlUI.title=t.t('Click to reset the map to its initial state');controlUI.style.margin='10px';controlUI.style.position='relative';controlUI.id='geofield-map--'+o+'--reset-control';e.appendChild(controlUI);let controlText=document.createElement('div');controlText.style.position='relative';controlText.innerHTML=t.t('Reset Map');controlText.style.padding='0 17px';controlText.style.display='table-cell';controlText.style.height='40px';controlText.style.fontSize='18px';controlText.style.color='rgb(86,86,86)';controlText.style.textAlign='center';controlText.style.verticalAlign='middle';controlUI.appendChild(controlText);controlUI.addEventListener('click',function(){t.geoFieldMapFormatter.map_data[o].map.setCenter(t.geoFieldMapFormatter.map_data[o].map_start_center);t.geoFieldMapFormatter.map_data[o].map.setZoom(t.geoFieldMapFormatter.map_data[o].map_start_zoom)});return controlUI}}})(jQuery,Drupal);
/* Source and licensing information for the above line(s) can be found at http://www.snorkellifts.com/modules/contrib/geofield_map/js/geofield_map_gmap_formatter.js. */