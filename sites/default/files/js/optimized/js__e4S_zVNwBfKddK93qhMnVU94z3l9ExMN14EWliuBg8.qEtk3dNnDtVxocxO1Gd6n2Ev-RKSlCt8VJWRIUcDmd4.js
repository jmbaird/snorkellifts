/* Source and licensing information for the line(s) below can be found at http://www.snorkellifts.com/modules/contrib/webform/js/webform.element.date.js. */
(function(e,t,a){'use strict';a.webform=a.webform||{};a.webform.datePicker=a.webform.datePicker||{};a.webform.datePicker.options=a.webform.datePicker.options||{};a.behaviors.date={attach:function(r,i){var n=e(r);n.find('input[data-drupal-date-format]').once('datePicker').each(function(){var r=e(this);if(window.Modernizr&&t.inputtypes&&t.inputtypes.date===!0&&r.attr('type')!=='text'){return};var n=e.extend({changeMonth:!0,changeYear:!0},a.webform.datePicker.options);if(r.hasData&&r.hasData('datepicker-button')){n=e.extend({showOn:'both',buttonImage:i.webform.datePicker.buttonImage,buttonImageOnly:!0,buttonText:a.t('Select date')},a.webform.datePicker.options)};var d=r.data('drupalDateFormat');n.dateFormat=d.replace('Y','yy').replace('y','y').replace('F','MM').replace('m','mm').replace('M','M').replace('n','m').replace('d','dd').replace('D','D').replace('j','d').replace('l','DD');if(r.attr('min')){n.minDate=r.attr('min')};if(r.attr('max')){n.maxDate=r.attr('max')};if(!n.yearRange&&r.data('min-year')&&r.data('max-year')){n.yearRange=r.data('min-year')+':'+r.attr('data-max-year')};n.firstDay=i.webform.dateFirstDay;if(r.attr('data-days')){var o=r.attr('data-days').split(',');n.beforeShowDay=function(a){var e=a.getDay().toString();return[(o.indexOf(e)!==-1)?!0:!1]}};r.attr('autocomplete','off');r.datepicker(n)})}}})(jQuery,Modernizr,Drupal);
/* Source and licensing information for the above line(s) can be found at http://www.snorkellifts.com/modules/contrib/webform/js/webform.element.date.js. */