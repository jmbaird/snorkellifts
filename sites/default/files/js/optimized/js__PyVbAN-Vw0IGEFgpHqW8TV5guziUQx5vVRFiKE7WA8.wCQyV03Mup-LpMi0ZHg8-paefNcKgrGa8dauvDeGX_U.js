/* Source and licensing information for the line(s) below can be found at http://www.snorkellifts.com/core/modules/node/node.js. */
(function(t,e,n){e.behaviors.nodeDetailsSummaries={attach:function(n){var r=t(n);r.find('.node-form-author').drupalSetSummary(function(t){var a=t.querySelector('.field--name-uid input'),n=a&&a.value,i=t.querySelector('.field--name-created input'),r=i&&i.value;if(n&&r){return e.t('By @name on @date',{'@name':n,'@date':r})};if(n){return e.t('By @name',{'@name':n})};if(r){return e.t('Authored on @date',{'@date':r})}});r.find('.node-form-options').drupalSetSummary(function(n){var r=t(n),a=[];if(r.find('input').is(':checked')){r.find('input:checked').next('label').each(function(){a.push(e.checkPlain(this.textContent.trim()))});return a.join(', ')};return e.t('Not promoted')})}}})(jQuery,Drupal,drupalSettings);
/* Source and licensing information for the above line(s) can be found at http://www.snorkellifts.com/core/modules/node/node.js. */