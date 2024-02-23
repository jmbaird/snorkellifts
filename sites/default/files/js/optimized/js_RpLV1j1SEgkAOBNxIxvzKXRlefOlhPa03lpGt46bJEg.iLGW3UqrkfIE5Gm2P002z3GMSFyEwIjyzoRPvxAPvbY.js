/* Source and licensing information for the line(s) below can be found at http://www.snorkellifts.com/core/misc/ajax.js. */
;function _toConsumableArray(e){return _arrayWithoutHoles(e)||_iterableToArray(e)||_unsupportedIterableToArray(e)||_nonIterableSpread()};function _nonIterableSpread(){throw new TypeError('Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.')};function _unsupportedIterableToArray(e,t){if(!e)return;if(typeof e==='string')return _arrayLikeToArray(e,t);var r=Object.prototype.toString.call(e).slice(8,-1);if(r==='Object'&&e.constructor)r=e.constructor.name;if(r==='Map'||r==='Set')return Array.from(e);if(r==='Arguments'||/^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(r))return _arrayLikeToArray(e,t)};function _iterableToArray(e){if(typeof Symbol!=='undefined'&&e[Symbol.iterator]!=null||e['@@iterator']!=null)return Array.from(e)};function _arrayWithoutHoles(e){if(Array.isArray(e))return _arrayLikeToArray(e)};function _arrayLikeToArray(e,t){if(t==null||t>e.length)t=e.length;for(var r=0,a=new Array(t);r<t;r++){a[r]=e[r]};return a}(function(e,r,t,a,n,o){var i=o.isFocusable,c=o.tabbable;t.behaviors.AJAX={attach:function(r,a){function n(r){var n=a.ajax[r];if(typeof n.selector==='undefined'){n.selector='#'.concat(r)};once('drupal-ajax',e(n.selector)).forEach(function(e){n.element=e;n.base=r;t.ajax(n)})};Object.keys(a.ajax||{}).forEach(function(e){return n(e)});t.ajax.bindAjaxLinks(document.body);once('ajax','.use-ajax-submit').forEach(function(r){var a={};a.url=e(r.form).attr('action');a.setClick=!0;a.event='click';a.progress={type:'throbber'};a.base=r.id;a.element=r;t.ajax(a)})},detach:function(e,r,a){if(a==='unload'){t.ajax.expired().forEach(function(e){t.ajax.instances[e.instanceIndex]=null})}}};t.AjaxError=function(e,r,a){var o,s,n;if(e.status){o='\n'.concat(t.t('An AJAX HTTP error occurred.'),'\n').concat(t.t('HTTP Result Code: !status',{'!status':e.status}))}
else{o='\n'.concat(t.t('An AJAX HTTP request terminated abnormally.'))};o+='\n'.concat(t.t('Debugging information follows.'));var l='\n'.concat(t.t('Path: !uri',{'!uri':r}));s='';try{s='\n'.concat(t.t('StatusText: !statusText',{'!statusText':e.statusText.trim()}))}catch(i){};n='';try{n='\n'.concat(t.t('ResponseText: !responseText',{'!responseText':e.responseText.trim()}))}catch(i){};n=n.replace(/<("[^"]*"|'[^']*'|[^'">])*>/gi,'');n=n.replace(/[\n]+\s+/g,'\n');var c=e.status===0?'\n'.concat(t.t('ReadyState: !readyState',{'!readyState':e.readyState})):'';a=a?'\n'.concat(t.t('CustomMessage: !customMessage',{'!customMessage':a})):'';this.message=o+l+s+a+n+c;this.name='AjaxError'};t.AjaxError.prototype=new Error();t.AjaxError.prototype.constructor=t.AjaxError;t.ajax=function(e){if(arguments.length!==1){throw new Error('Drupal.ajax() function must be called with one configuration object only')};var n=e.base||!1,a=e.element||!1;delete e.base;delete e.element;if(!e.progress&&!a){e.progress=!1};var r=new t.Ajax(n,a,e);r.instanceIndex=t.ajax.instances.length;t.ajax.instances.push(r);return r};t.ajax.instances=[];t.ajax.expired=function(){return t.ajax.instances.filter(function(e){return e&&e.element!==!1&&!document.body.contains(e.element)})};t.ajax.bindAjaxLinks=function(r){once('ajax','.use-ajax',r).forEach(function(r){var a=e(r),n={progress:{type:'throbber'},dialogType:a.data('dialog-type'),dialog:a.data('dialog-options'),dialogRenderer:a.data('dialog-renderer'),base:a.attr('id'),element:r};var o=a.attr('href');if(o){n.url=o;n.event='click'};t.ajax(n)})};t.Ajax=function(r,n,o){var u={event:n?'mousedown':null,keypress:!0,selector:r?'#'.concat(r):null,effect:'none',speed:'none',method:'replaceWith',progress:{type:'throbber',message:t.t('Please wait...')},submit:{js:!0}};e.extend(this,u,o);this.commands=new t.AjaxCommands();this.instanceIndex=!1;if(this.wrapper){this.wrapper='#'.concat(this.wrapper)};this.element=n;this.element_settings=o;this.elementSettings=o;if(this.element&&this.element.form){this.$form=e(this.element.form)};if(!this.url){var c=e(this.element);if(c.is('a')){this.url=c.attr('href')}
else if(this.element&&n.form){this.url=this.$form.attr('action')}};var l=this.url;this.url=this.url.replace(/\/nojs(\/|$|\?|#)/,'/ajax$1');if(a.ajaxTrustedUrl[l]){a.ajaxTrustedUrl[this.url]=!0};var s=this;s.options={url:s.url,data:s.submit,isInProgress:function(){return s.ajaxing},beforeSerialize:function(e,t){return s.beforeSerialize(e,t)},beforeSubmit:function(e,t,r){s.ajaxing=!0;return s.beforeSubmit(e,t,r)},beforeSend:function(e,t){s.ajaxing=!0;return s.beforeSend(e,t)},success:function(r,n,o){var i=this;if(typeof r==='string'){r=e.parseJSON(r)};if(r!==null&&!a.ajaxTrustedUrl[s.url]){if(o.getResponseHeader('X-Drupal-Ajax-Token')!=='1'){var c=t.t('The response failed verification so will not be processed.');return s.error(o,s.url,c)}};return Promise.resolve(s.success(r,n)).then(function(){s.ajaxing=!1;e(document).trigger('ajaxSuccess',[o,i]);e(document).trigger('ajaxComplete',[o,i]);if(--e.active===0){e(document).trigger('ajaxStop')}})},error:function(e,t,r){s.ajaxing=!1},complete:function(e,t){if(t==='error'||t==='parsererror'){return s.error(e,s.url)}},dataType:'json',jsonp:!1,type:'POST'};if(o.dialog){s.options.data.dialogOptions=o.dialog};if(s.options.url.indexOf('?')===-1){s.options.url+='?'}
else{s.options.url+='&'};var i='drupal_'.concat(o.dialogType||'ajax');if(o.dialogRenderer){i+='.'.concat(o.dialogRenderer)};s.options.url+=''.concat(t.ajax.WRAPPER_FORMAT,'=').concat(i);e(s.element).on(o.event,function(e){if(!a.ajaxTrustedUrl[s.url]&&!t.url.isLocal(s.url)){throw new Error(t.t('The callback URL is not local and not trusted: !url',{'!url':s.url}))};return s.eventResponse(this,e)});if(o.keypress){e(s.element).on('keypress',function(e){return s.keypressResponse(this,e)})};if(o.prevent){e(s.element).on(o.prevent,!1)}};t.ajax.WRAPPER_FORMAT='_wrapper_format';t.Ajax.AJAX_REQUEST_PARAMETER='_drupal_ajax';t.Ajax.prototype.execute=function(){if(this.ajaxing){return};try{this.beforeSerialize(this.element,this.options);return e.ajax(this.options)}catch(t){this.ajaxing=!1;r.alert('An error occurred while attempting to process '.concat(this.options.url,': ').concat(t.message));return e.Deferred().reject()}};t.Ajax.prototype.keypressResponse=function(t,r){var a=this;if(r.which===13||r.which===32&&t.type!=='text'&&t.type!=='textarea'&&t.type!=='tel'&&t.type!=='number'){r.preventDefault();r.stopPropagation();e(t).trigger(a.elementSettings.event)}};t.Ajax.prototype.eventResponse=function(t,a){a.preventDefault();a.stopPropagation();var n=this;if(n.ajaxing){return};try{if(n.$form){if(n.setClick){t.form.clk=t};n.$form.ajaxSubmit(n.options)}
else{n.beforeSerialize(n.element,n.options);e.ajax(n.options)}}catch(o){n.ajaxing=!1;r.alert('An error occurred while attempting to process '.concat(n.options.url,': ').concat(o.message))}};t.Ajax.prototype.beforeSerialize=function(e,r){if(this.$form&&document.body.contains(this.$form.get(0))){var o=this.settings||a;t.detachBehaviors(this.$form.get(0),o,'serialize')};r.data[t.Ajax.AJAX_REQUEST_PARAMETER]=1;var n=a.ajaxPageState;r.data['ajax_page_state[theme]']=n.theme;r.data['ajax_page_state[theme_token]']=n.theme_token;r.data['ajax_page_state[libraries]']=n.libraries};t.Ajax.prototype.beforeSubmit=function(e,t,r){};t.Ajax.prototype.beforeSend=function(t,r){if(this.$form){r.extraData=r.extraData||{};r.extraData.ajax_iframe_upload='1';var n=e.fieldValue(this.element);if(n!==null){r.extraData[this.element.name]=n}};e(this.element).prop('disabled',!0);if(!this.progress||!this.progress.type){return};var a='setProgressIndicator'.concat(this.progress.type.slice(0,1).toUpperCase()).concat(this.progress.type.slice(1).toLowerCase());if(a in this&&typeof this[a]==='function'){this[a].call(this)}};t.theme.ajaxProgressThrobber=function(e){var r=typeof e==='string'?t.theme('ajaxProgressMessage',e):'',a='<div class="throbber">&nbsp;</div>';return'<div class="ajax-progress ajax-progress-throbber">'.concat(a).concat(r,'</div>')};t.theme.ajaxProgressIndicatorFullscreen=function(){return'<div class="ajax-progress ajax-progress-fullscreen">&nbsp;</div>'};t.theme.ajaxProgressMessage=function(e){return'<div class="message">'.concat(e,'</div>')};t.theme.ajaxProgressBar=function(t){return e('<div class="ajax-progress ajax-progress-bar"></div>').append(t)};t.Ajax.prototype.setProgressIndicatorBar=function(){var r=new t.ProgressBar('ajax-progress-'.concat(this.element.id),e.noop,this.progress.method,e.noop);if(this.progress.message){r.setProgress(-1,this.progress.message)};if(this.progress.url){r.startMonitoring(this.progress.url,this.progress.interval||1500)};this.progress.element=e(t.theme('ajaxProgressBar',r.element));this.progress.object=r;e(this.element).after(this.progress.element)};t.Ajax.prototype.setProgressIndicatorThrobber=function(){this.progress.element=e(t.theme('ajaxProgressThrobber',this.progress.message));e(this.element).after(this.progress.element)};t.Ajax.prototype.setProgressIndicatorFullscreen=function(){this.progress.element=e(t.theme('ajaxProgressIndicatorFullscreen'));e('body').append(this.progress.element)};t.Ajax.prototype.commandExecutionQueue=function(e,t){var a=this,r=this.commands;return Object.keys(e||{}).reduce(function(n,o){return n.then(function(){var n=e[o].command;if(n&&r[n]){return r[n](a,e[o],t)}})},Promise.resolve())};t.Ajax.prototype.success=function(r,n){var o=this;if(this.progress.element){e(this.progress.element).remove()};if(this.progress.object){this.progress.object.stopMonitoring()};e(this.element).prop('disabled',!1);var s=e(this.element).parents('[data-drupal-selector]').addBack().toArray(),i=Object.keys(r||{}).some(function(e){var t=r[e],a=t.command,n=t.method;return a==='focusFirst'||a==='invoke'&&n==='focus'});return this.commandExecutionQueue(r,n).then(function(){if(!i&&o.element&&!e(o.element).data('disable-refocus')){var r=!1;for(var n=s.length-1;!r&&n>=0;n--){r=document.querySelector('[data-drupal-selector="'.concat(s[n].getAttribute('data-drupal-selector'),'"]'))};if(r){e(r).trigger('focus')}};if(o.$form&&document.body.contains(o.$form.get(0))){var c=o.settings||a;t.attachBehaviors(o.$form.get(0),c)};o.settings=null}).catch(function(e){return console.error(t.t('An error occurred during the execution of the Ajax response: !error',{'!error':e}))})};t.Ajax.prototype.getEffect=function(e){var r=e.effect||this.effect,a=e.speed||this.speed,t={};if(r==='none'){t.showEffect='show';t.hideEffect='hide';t.showSpeed=''}
else if(r==='fade'){t.showEffect='fadeIn';t.hideEffect='fadeOut';t.showSpeed=a}
else{t.showEffect=''.concat(r,'Toggle');t.hideEffect=''.concat(r,'Toggle');t.showSpeed=a};return t};t.Ajax.prototype.error=function(r,n,o){if(this.progress.element){e(this.progress.element).remove()};if(this.progress.object){this.progress.object.stopMonitoring()};e(this.wrapper).show();e(this.element).prop('disabled',!1);if(this.$form&&document.body.contains(this.$form.get(0))){var s=this.settings||a;t.attachBehaviors(this.$form.get(0),s)};throw new t.AjaxError(r,n,o)};t.theme.ajaxWrapperNewContent=function(e,r,a){return(a.effect||r.effect)!=='none'&&e.filter(function(t){return!(e[t].nodeName==='#comment'||e[t].nodeName==='#text'&&/^(\s|\n|\r)*$/.test(e[t].textContent))}).length>1?t.theme('ajaxWrapperMultipleRootElements',e):e};t.theme.ajaxWrapperMultipleRootElements=function(t){return e('<div></div>').append(t)};t.AjaxCommands=function(){};t.AjaxCommands.prototype={insert:function(r,n){var c=n.selector?e(n.selector):e(r.wrapper),l=n.method||r.method,s=r.getEffect(n),u=n.settings||r.settings||a,o=e(e.parseHTML(n.data,document,!0));o=t.theme('ajaxWrapperNewContent',o,r,n);switch(l){case'html':case'replaceWith':case'replaceAll':case'empty':case'remove':t.detachBehaviors(c.get(0),u);break;default:break};c[l](o);if(s.showEffect!=='show'){o.hide()};var i=o.find('.ajax-new-content');if(i.length){i.hide();o.show();i[s.showEffect](s.showSpeed)}
else if(s.showEffect!=='show'){o[s.showEffect](s.showSpeed)};if(o.parents('html').length){o.each(function(e,r){if(r.nodeType===Node.ELEMENT_NODE){t.attachBehaviors(r,u)}})}},remove:function(r,n,o){var s=n.settings||r.settings||a;e(n.selector).each(function(){t.detachBehaviors(this,s)}).remove()},changed:function(r,a,n){var o=e(a.selector);if(!o.hasClass('ajax-changed')){o.addClass('ajax-changed');if(a.asterisk){o.find(a.asterisk).append(' <abbr class="ajax-changed" title="'.concat(t.t('Changed'),'">*</abbr> '))}}},alert:function(e,t,a){r.alert(t.text)},announce:function(e,r){if(r.priority){t.announce(r.text,r.priority)}
else{t.announce(r.text)}},redirect:function(e,t,a){r.location=t.url},css:function(t,r,a){e(r.selector).css(r.argument)},settings:function(r,n,o){var s=a.ajax;if(s){t.ajax.expired().forEach(function(e){if(e.selector){var t=e.selector.replace('#','');if(t in s){delete s[t]}}})};if(n.merge){e.extend(!0,a,n.settings)}
else{r.settings=n.settings}},data:function(t,r,a){e(r.selector).data(r.name,r.value)},focusFirst:function(e,t,r){var n=!1,a=document.querySelector(t.selector);if(a){var o=c(a);if(o.length){o[0].focus();n=!0}
else if(i(a)){a.focus();n=!0}};if(e.hasOwnProperty('element')&&!n){e.element.focus()}},invoke:function(t,r,a){var n=e(r.selector);n[r.method].apply(n,_toConsumableArray(r.args))},restripe:function(t,r,a){e(r.selector).find('> tbody > tr:visible, > tr:visible').removeClass('odd even').filter(':even').addClass('odd').end().filter(':odd').addClass('even')},update_build_id:function(e,t,r){document.querySelectorAll('input[name="form_build_id"][value="'.concat(t.old,'"]')).forEach(function(e){e.value=t.new})},add_css:function(t,r,a){e('head').prepend(r.data)},message:function(e,r){var a=new t.Message(document.querySelector(r.messageWrapperQuerySelector));if(r.clearPrevious){a.clear()};a.add(r.message,r.messageOptions)},add_js:function(e,r,o){var s=document.querySelector(r.selector||'body'),i=e.settings||a,c=r.data.map(function(t){var r=t.src+e.instanceIndex;n(t.src,r,{async:!1,before:function(e,r){Object.keys(t).forEach(function(e){r.setAttribute(e,t[e])});s.appendChild(r);return!1}});return r});return new Promise(function(e,r){n.ready(c,{success:function(){t.attachBehaviors(s,i);e()},error:function(e){var a=t.t('The following files could not be loaded: @dependencies',{'@dependencies':e.join(', ')});r(a)}})})}};var s=function(e,t){return e.getResponseHeader('X-Drupal-Ajax-Token')==='1'&&t.isInProgress&&t.isInProgress()};e.extend(!0,e.event.special,{ajaxSuccess:{trigger:function(e,t,r){if(s(t,r)){return!1}}},ajaxComplete:{trigger:function(t,r,a){if(s(r,a)){e.active++;return!1}}}})})(jQuery,window,Drupal,drupalSettings,loadjs,window.tabbable);
/* Source and licensing information for the above line(s) can be found at http://www.snorkellifts.com/core/misc/ajax.js. */