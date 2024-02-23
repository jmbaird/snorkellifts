/* Source and licensing information for the line(s) below can be found at http://snorkellifts.com/modules/contrib/webform/js/webform.element.telephone.js. */
(function(t,e,n){'use strict';e.webform=e.webform||{};e.webform.intlTelInput=e.webform.intlTelInput||{};e.webform.intlTelInput.options=e.webform.intlTelInput.options||{};e.behaviors.webformTelephoneInternational={attach:function(r){if(!t.fn.intlTelInput){return};t(r).find('input.js-webform-telephone-international').once('webform-telephone-international').each(function(){var r=t(this),o=t('<strong class="error form-item--error-message">'+e.t('Invalid phone number')+'</strong>').hide();r.closest('.js-form-item').append(o);var i={utilsScript:n.webform.intlTelInput.utilsScript,nationalMode:!1};if(r.attr('data-webform-telephone-international-initial-country')){i.initialCountry=r.attr('data-webform-telephone-international-initial-country')};if(r.attr('data-webform-telephone-international-preferred-countries')){i.preferredCountries=JSON.parse(r.attr('data-webform-telephone-international-preferred-countries'))};i=t.extend(i,e.webform.intlTelInput.options);r.intlTelInput(i);var a=function(){r.removeClass('error');o.hide()},l=function(){if(t.trim(r.val())){if(!r.intlTelInput('isValidNumber')){r.addClass('error');var i=r.attr('placeholder'),n;if(i){n=e.t('The phone number is not valid. (e.g. @example)',{'@example':i})}
else{n=e.t('The phone number is not valid.')};o.html(n).show();return!1}};return!0};r.on('blur',function(){a();l()});r.on('keyup change',a);var u=t(this.form);u.on('submit',function(t){if(!l()){r.focus();t.preventDefault();if(e.behaviors.webformSubmitOnce){e.behaviors.webformSubmitOnce.clear()}}})})}}})(jQuery,Drupal,drupalSettings);
/* Source and licensing information for the above line(s) can be found at http://snorkellifts.com/modules/contrib/webform/js/webform.element.telephone.js. */