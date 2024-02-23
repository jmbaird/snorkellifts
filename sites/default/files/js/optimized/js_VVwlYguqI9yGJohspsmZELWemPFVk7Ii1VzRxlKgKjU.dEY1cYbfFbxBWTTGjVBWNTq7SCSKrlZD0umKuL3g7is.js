/* Source and licensing information for the line(s) below can be found at http://www.snorkellifts.com/modules/contrib/multiselect/js/multiselect.js. */
(function(e,l,t){'use strict';l.behaviors.multiSelect={attach:function(l){var c=e(l).find('input.form-submit').once('multiselect'),s=e(l).find('select.multiselect-available').once('multiselect'),n=e(l).find('select.multiselect-available').once('multiselectAvailable'),o=e(l).find('select.multiselect-selected').once('multiselectSelected'),a=e(l).find('li.multiselect-add').once('multiselectAdd'),u=e(l).find('li.multiselect-remove').once('multiselectRemove');c.on('click mousedown',function(){e('select.multiselect-selected').selectAll()});s.each(function(){var t=e(this).parents('.multiselect-wrapper'),l=e('div.multiselect-available select',t),i=e('div.multiselect-selected select',t);l.removeContentsFrom(i)});n.on('dblclick',function(){var t=e(this).parents('.multiselect-wrapper'),l=e('div.multiselect-available select',t),i=e('div.multiselect-selected select',t);l.moveSelectionTo(i)});o.on('dblclick',function(){var t=e(this).parents('.multiselect-wrapper'),l=e('div.multiselect-available select',t),i=e('div.multiselect-selected select',t);i.moveSelectionTo(l)});a.on('click',function(t){t.preventDefault();var l=e(this).parents('.multiselect-wrapper'),i=e('div.multiselect-available select',l),c=e('div.multiselect-selected select',l);i.moveSelectionTo(c)});u.on('click',function(t){t.preventDefault();var l=e(this).parents('.multiselect-wrapper'),i=e('div.multiselect-available select',l),c=e('div.multiselect-selected select',l);c.moveSelectionTo(i)});if(t.multiselect.widths){var i=t.multiselect.widths;e(l).find('div.multiselect-available, div.multiselect-selected, select.form-multiselect').width(i)}}}})(jQuery,Drupal,drupalSettings);jQuery.fn.selectAll=function(){this.each(function(){for(var e=0;e<this.options.length;e++){var t=this.options[e];t.selected=!0}})};jQuery.fn.removeContentsFrom=function(){var e=arguments[0];this.each(function(){for(var t=this.options.length-1;t>=0;t--){e.removeOption(this.options[t].value)}})};jQuery.fn.moveSelectionTo=function(){var e=arguments[0];this.each(function(){for(var t=0;t<this.options.length;t++){var l=this.options[t];if(l.selected){e.addOption(l);this.remove(t);t--}}})};jQuery.fn.addOption=function(){var e=arguments[0];this.each(function(){var t=document.createElement('option');t.text=e.text;t.value=e.value;this.options[this.options.length]=t;return!1})};jQuery.fn.removeOption=function(){var e=arguments[0];this.each(function(){for(var t=this.options.length-1;t>=0;t--){var l=this.options[t];if(l.value==e){this.remove(t)}}})};
/* Source and licensing information for the above line(s) can be found at http://www.snorkellifts.com/modules/contrib/multiselect/js/multiselect.js. */