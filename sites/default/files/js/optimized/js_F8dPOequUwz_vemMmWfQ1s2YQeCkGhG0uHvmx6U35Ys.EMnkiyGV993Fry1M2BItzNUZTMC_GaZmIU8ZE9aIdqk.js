/* Source and licensing information for the line(s) below can be found at http://www.snorkellifts.com/modules/contrib/token/js/token.js. */
(function(t,e,n){'use strict';e.behaviors.tokenTree={attach:function(e,n){t(once('token-tree','table.token-tree',e)).treetable({expandable:!0})}};e.behaviors.tokenInsert={attach:function(i,o){t('textarea, input[type="text"]',i).focus(function(){n.tokenFocusedField=this});once('token-click-insert','.token-click-insert .token-key',i).forEach(function(i){var o=t('<a href="javascript:void(0);" title="'+e.t('Insert this token into your form')+'">'+t(i).html()+'</a>').click(function(){var i=this.text;if(n.tokenFocusedField&&(n.tokenFocusedField.tokenDialogFocus||n.tokenFocusedField.tokenHasFocus)){s(n.tokenFocusedField,i)}
else if(typeof(tinyMCE)!='undefined'&&tinyMCE.activeEditor){tinyMCE.activeEditor.execCommand('mceInsertContent',!1,i)}
else if(typeof(CKEDITOR)!='undefined'&&CKEDITOR.currentInstance){CKEDITOR.currentInstance.insertHtml(i)}
else if(typeof(CodeMirror)!='undefined'&&n.tokenFocusedField&&t(n.tokenFocusedField).parents('.CodeMirror').length){var o=t(n.tokenFocusedField).parents('.CodeMirror')[0].CodeMirror;o.replaceSelection(i);o.focus()}
else if(e.wysiwyg&&e.wysiwyg.activeId){e.wysiwyg.instances[e.wysiwyg.activeId].insert(i)}
else if(typeof(CKEDITOR)!='undefined'&&typeof(e.ckeditorActiveId)!='undefined'){CKEDITOR.instances[e.ckeditorActiveId].insertHtml(i)}
else if(n.tokenFocusedField){s(n.tokenFocusedField,i)}
else{alert(e.t('First click a text field to insert your tokens into.'))};return!1});t(i).html(o)});function s(e,t){var s=e.scrollTop;if(document.selection){e.focus();var o=document.selection.createRange();o.text=t}
else if(e.selectionStart||e.selectionStart=='0'){var n=e.selectionStart,i=e.selectionEnd;e.value=e.value.substring(0,n)+t+e.value.substring(i,e.value.length)}
else{e.value+=t};e.scrollTop=s}}}})(jQuery,Drupal,drupalSettings);
/* Source and licensing information for the above line(s) can be found at http://www.snorkellifts.com/modules/contrib/token/js/token.js. */