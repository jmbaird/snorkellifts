/* Source and licensing information for the line(s) below can be found at http://www.snorkellifts.com/core/modules/media/js/type_form.js. */
(function(n,t){t.behaviors.mediaTypeFormSummaries={attach:function(e){var i=n(e);i.find('#edit-workflow').drupalSetSummary(function(e){var i=[];n(e).find('input[name^="options"]:checked').parent().each(function(){i.push(t.checkPlain(n(this).find('label')[0].textContent))});if(!n(e).find('#edit-options-status').is(':checked')){i.unshift(t.t('Not published'))};return i.join(', ')});n(e).find('#edit-language').drupalSetSummary(function(e){var i=[];i.push(n(e).find('.js-form-item-language-configuration-langcode select option:selected')[0].textContent);n(e).find('input:checked').next('label').each(function(){i.push(t.checkPlain(this.textContent))});return i.join(', ')})}}})(jQuery,Drupal);
/* Source and licensing information for the above line(s) can be found at http://www.snorkellifts.com/core/modules/media/js/type_form.js. */