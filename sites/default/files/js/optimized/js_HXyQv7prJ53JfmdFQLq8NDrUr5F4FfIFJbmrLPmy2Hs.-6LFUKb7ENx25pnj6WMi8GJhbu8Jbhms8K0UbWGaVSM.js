/* Source and licensing information for the line(s) below can be found at http://www.snorkellifts.com/modules/contrib/pathauto/pathauto.js. */
(function(a){'use strict';Drupal.behaviors.pathFieldsetSummaries={attach:function(t){a(t).find('.path-form').drupalSetSummary(function(t){var i=a('.js-form-item-path-0-alias input',t).val(),r=a('.js-form-item-path-0-pathauto input',t).prop('checked');if(r){return Drupal.t('Automatic alias')}
else if(i){return Drupal.t('Alias: @alias',{'@alias':i})}
else{return Drupal.t('No alias')}})}}})(jQuery);
/* Source and licensing information for the above line(s) can be found at http://www.snorkellifts.com/modules/contrib/pathauto/pathauto.js. */