/* Source and licensing information for the line(s) below can be found at http://www.snorkellifts.com/core/misc/states.js. */
(function(e,i){var t={postponed:[]};i.states=t;function a(e,t){return t&&typeof e!=='undefined'?!e:e};function r(e,t){if(e===t){return typeof e==='undefined'?e:!0};return typeof e==='undefined'||typeof t==='undefined'};function s(e,t){if(typeof e==='undefined'){return t};if(typeof t==='undefined'){return e};return e&&t};i.behaviors.states={attach:function(i,n){var a=e(i).find('[data-drupal-states]'),s=a.length,o=function(i){var n=JSON.parse(a[i].getAttribute('data-drupal-states'));Object.keys(n||{}).forEach(function(r){new t.Dependent({element:e(a[i]),state:t.State.sanitize(r),constraints:n[r]})})};for(var r=0;r<s;r++){o(r)}
while(t.postponed.length){t.postponed.shift()()}}};t.Dependent=function(t){var i=this;e.extend(this,{values:{},oldValue:null},t);this.dependees=this.getDependees();Object.keys(this.dependees||{}).forEach(function(e){i.initializeDependee(e,i.dependees[e])})};t.Dependent.comparisons={RegExp:function(e,t){return e.test(t)},Function:function(e,t){return e(t)},Number:function(e,t){return typeof t==='string'?r(e.toString(),t):r(e,t)}};t.Dependent.prototype={initializeDependee:function(i,n){var r=this;this.values[i]={};Object.keys(n).forEach(function(a){var s=n[a];if(e.inArray(s,n)===-1){return};s=t.State.sanitize(s);r.values[i][s.name]=null;e(i).on('state:'.concat(s),{selector:i,state:s},function(e){r.update(e.data.selector,e.data.state,e.value)});new t.Trigger({selector:i,state:s})})},compare:function(e,i,n){var a=this.values[i][n.name];if(e.constructor.name in t.Dependent.comparisons){return t.Dependent.comparisons[e.constructor.name](e,a)};return r(e,a)},update:function(e,t,i){if(i!==this.values[e][t.name]){this.values[e][t.name]=i;this.reevaluate()}},reevaluate:function(){var e=this.verifyConstraints(this.constraints);if(e!==this.oldValue){this.oldValue=e;e=a(e,this.state.invert);this.element.trigger({type:'state:'.concat(this.state),value:e,trigger:!0})}},verifyConstraints:function(t,i){var n;if(e.isArray(t)){var u=e.inArray('xor',t)===-1,l=t.length;for(var r=0;r<l;r++){if(t[r]!=='xor'){var o=this.checkConstraints(t[r],i,r);if(o&&(u||n)){return u};n=n||o}}}
else if(e.isPlainObject(t)){for(var a in t){if(t.hasOwnProperty(a)){n=s(n,this.checkConstraints(t[a],i,a));if(n===!1){return!1}}}};return n},checkConstraints:function(e,i,n){if(typeof n!=='string'||/[0-9]/.test(n[0])){n=null}
else if(typeof i==='undefined'){i=n;n=null};if(n!==null){n=t.State.sanitize(n);return a(this.compare(e,i,n),n.invert)};return this.verifyConstraints(e,i)},getDependees:function(){var e={};var t=this.compare;this.compare=function(t,i,n){(e[i]||(e[i]=[])).push(n.name)};this.verifyConstraints(this.constraints);this.compare=t;return e}};t.Trigger=function(i){e.extend(this,i);if(this.state in t.Trigger.states){this.element=e(this.selector);if(!this.element.data('trigger:'.concat(this.state))){this.initialize()}}};t.Trigger.prototype={initialize:function(){var i=this,e=t.Trigger.states[this.state];if(typeof e==='function'){e.call(window,this.element)}
else{Object.keys(e||{}).forEach(function(t){i.defaultTrigger(t,e[t])})};this.element.data('trigger:'.concat(this.state),!0)},defaultTrigger:function(i,n){var r=n.call(this.element);this.element.on(i,e.proxy(function(e){var t=n.call(this.element,e);if(r!==t){this.element.trigger({type:'state:'.concat(this.state),value:t,oldValue:r});r=t}},this));t.postponed.push(e.proxy(function(){this.element.trigger({type:'state:'.concat(this.state),value:r,oldValue:null})},this))}};t.Trigger.states={empty:{keyup:function(){return this.val()===''},change:function(){return this.val()===''}},checked:{change:function(){var t=!1;this.each(function(){t=e(this).prop('checked');return!t});return t}},value:{keyup:function(){if(this.length>1){return this.filter(':checked').val()||!1};return this.val()},change:function(){if(this.length>1){return this.filter(':checked').val()||!1};return this.val()}},collapsed:{collapsed:function(e){return typeof e!=='undefined'&&'value' in e?e.value:!this.is('[open]')}}};t.State=function(e){this.pristine=e;this.name=e;var i=!0;do{while(this.name.charAt(0)==='!'){this.name=this.name.substring(1);this.invert=!this.invert};if(this.name in t.State.aliases){this.name=t.State.aliases[this.name]}
else{i=!1}}
while(i);};t.State.sanitize=function(e){if(e instanceof t.State){return e};return new t.State(e)};t.State.aliases={enabled:'!disabled',invisible:'!visible',invalid:'!valid',untouched:'!touched',optional:'!required',filled:'!empty',unchecked:'!checked',irrelevant:'!relevant',expanded:'!collapsed',open:'!collapsed',closed:'collapsed',readwrite:'!readonly'};t.State.prototype={invert:!1,toString:function(){return this.name}};var n=e(document);n.on('state:disabled',function(t){if(t.trigger){e(t.target).closest('.js-form-item, .js-form-submit, .js-form-wrapper').toggleClass('form-disabled',t.value).find('select, input, textarea').prop('disabled',t.value)}});n.on('state:required',function(t){if(t.trigger){if(t.value){var n='label'.concat(t.target.id?'[for='.concat(t.target.id,']'):''),i=e(t.target).attr({required:'required','aria-required':'true'}).closest('.js-form-item, .js-form-wrapper').find(n);if(!i.hasClass('js-form-required').length){i.addClass('js-form-required form-required')}}
else{e(t.target).removeAttr('required aria-required').closest('.js-form-item, .js-form-wrapper').find('label.js-form-required').removeClass('js-form-required form-required')}}});n.on('state:visible',function(t){if(t.trigger){e(t.target).closest('.js-form-item, .js-form-submit, .js-form-wrapper').toggle(t.value)}});n.on('state:checked',function(t){if(t.trigger){e(t.target).closest('.js-form-item, .js-form-wrapper').find('input').prop('checked',t.value).trigger('change')}});n.on('state:collapsed',function(t){if(t.trigger){if(e(t.target).is('[open]')===t.value){e(t.target).find('> summary').trigger('click')}}})})(jQuery,Drupal);
/* Source and licensing information for the above line(s) can be found at http://www.snorkellifts.com/core/misc/states.js. */