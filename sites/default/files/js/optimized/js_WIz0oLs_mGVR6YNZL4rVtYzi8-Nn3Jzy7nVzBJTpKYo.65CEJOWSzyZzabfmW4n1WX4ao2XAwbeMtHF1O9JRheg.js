/* Source and licensing information for the line(s) below can be found at http://www.snorkellifts.com/core/modules/text/text.js. */
(function(e,t){t.behaviors.textSummary={attach:function(a,n){once('text-summary','.js-text-summary',a).forEach(function(a){var u=e(a).closest('.js-text-format-wrapper'),s=u.find('.js-text-summary-wrapper'),o=s.find('label').eq(0),d=u.children('.js-form-type-textarea'),n=d.find('label').eq(0);if(n.length===0){n=e('<label></label>').prependTo(d)};if(n.hasClass('visually-hidden')){n.html(function(e,t){return'<span class="visually-hidden">'.concat(t,'</span>')});n.removeClass('visually-hidden')};var l=e('<span class="field-edit-link"> (<button type="button" class="link link-edit-summary">'.concat(t.t('Hide summary'),'</button>)</span>')),r=l.find('button'),i=!0;l.on('click',function(e){if(i){s.hide();r.html(t.t('Edit summary'));l.appendTo(n)}
else{s.show();r.html(t.t('Hide summary'));l.appendTo(o)};e.preventDefault();i=!i}).appendTo(o);if(a.value===''){l.trigger('click')}})}}})(jQuery,Drupal);
/* Source and licensing information for the above line(s) can be found at http://www.snorkellifts.com/core/modules/text/text.js. */