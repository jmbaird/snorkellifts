/* Source and licensing information for the line(s) below can be found at http://www.snorkellifts.com/core/modules/toolbar/js/models/ToolbarModel.js. */
(function(o,e){e.toolbar.ToolbarModel=o.Model.extend({defaults:{activeTab:null,activeTray:null,isOriented:!1,isFixed:!1,areSubtreesLoaded:!1,isViewportOverflowConstrained:!1,orientation:'horizontal',locked:!1,isTrayToggleVisible:!0,height:null,offsets:{top:0,right:0,bottom:0,left:0}},validate:function(o,t){if(o.orientation==='horizontal'&&this.get('locked')&&!t.override){return e.t('The toolbar cannot be set to a horizontal orientation when it is locked.')}}})})(Backbone,Drupal);
/* Source and licensing information for the above line(s) can be found at http://www.snorkellifts.com/core/modules/toolbar/js/models/ToolbarModel.js. */