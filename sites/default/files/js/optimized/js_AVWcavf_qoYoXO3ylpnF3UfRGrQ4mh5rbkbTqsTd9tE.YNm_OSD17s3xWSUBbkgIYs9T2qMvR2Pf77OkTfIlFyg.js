/* Source and licensing information for the line(s) below can be found at http://www.snorkellifts.com/core/modules/views/js/ajax_view.js. */
(function(e,t,i){t.behaviors.ViewsAjaxView={};t.behaviors.ViewsAjaxView.attach=function(e,i){if(i&&i.views&&i.views.ajaxViews){var s=i.views.ajaxViews;Object.keys(s||{}).forEach(function(e){t.views.instances[e]=new t.views.ajaxView(s[e])})}};t.behaviors.ViewsAjaxView.detach=function(i,s,a){if(a==='unload'){if(s&&s.views&&s.views.ajaxViews){var r=s.views.ajaxViews;Object.keys(r||{}).forEach(function(a){var o='.js-view-dom-id-'.concat(r[a].view_dom_id);if(e(o,i).length){delete t.views.instances[a];delete s.views.ajaxViews[a]}})}}};t.views={};t.views.instances={};t.views.ajaxView=function(s){var o='.js-view-dom-id-'.concat(s.view_dom_id);this.$view=e(o);var r=i.views.ajax_path;if(r.constructor.toString().indexOf('Array')!==-1){r=r[0]};var a=window.location.search||'';if(a!==''){a=a.slice(1).replace(/q=[^&]+&?|&?render=[^&]+/,'');if(a!==''){a=(/\?/.test(r)?'&':'?')+a}};this.element_settings={url:r+a,submit:s,setClick:!0,event:'click',selector:o,progress:{type:'fullscreen'}};this.settings=s;this.$exposed_form=e('form#views-exposed-form-'.concat(s.view_name.replace(/_/g,'-'),'-').concat(s.view_display_id.replace(/_/g,'-')));once('exposed-form',this.$exposed_form).forEach(e.proxy(this.attachExposedFormAjax,this));once('ajax-pager',this.$view.filter(e.proxy(this.filterNestedViews,this))).forEach(e.proxy(this.attachPagerAjax,this));var n=e.extend({},this.element_settings,{event:'RefreshView',base:this.selector,element:this.$view.get(0)});this.refreshViewAjax=t.ajax(n)};t.views.ajaxView.prototype.attachExposedFormAjax=function(){var i=this;this.exposedFormAjax=[];e('input[type=submit], button[type=submit], input[type=image]',this.$exposed_form).not('[data-drupal-selector=edit-reset]').each(function(s){var a=e.extend({},i.element_settings,{base:e(this).attr('id'),element:this});i.exposedFormAjax[s]=t.ajax(a)})};t.views.ajaxView.prototype.filterNestedViews=function(){return!this.$view.parents('.view').length};t.views.ajaxView.prototype.attachPagerAjax=function(){this.$view.find('ul.js-pager__items > li > a, th.views-field a, .attachment .views-summary a').each(e.proxy(this.attachPagerLinkAjax,this))};t.views.ajaxView.prototype.attachPagerLinkAjax=function(i,s){var n=e(s),r={};var a=n.attr('href');e.extend(r,this.settings,t.Views.parseQueryString(a),t.Views.parseViewArgs(a,this.settings.view_base_path));var o=e.extend({},this.element_settings,{submit:r,base:!1,element:s});this.pagerAjax=t.ajax(o)};t.AjaxCommands.prototype.viewsScrollTop=function(t,i){var a=e(i.selector).offset(),s=i.selector;while(e(s).scrollTop()===0&&e(s).parent()){s=e(s).parent()};if(a.top-10<e(s).scrollTop()){e(s).animate({scrollTop:a.top-10},500)}}})(jQuery,Drupal,drupalSettings);
/* Source and licensing information for the above line(s) can be found at http://www.snorkellifts.com/core/modules/views/js/ajax_view.js. */