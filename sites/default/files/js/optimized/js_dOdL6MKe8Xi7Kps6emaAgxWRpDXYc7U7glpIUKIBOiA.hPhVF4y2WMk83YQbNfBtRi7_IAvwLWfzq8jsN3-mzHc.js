/* Source and licensing information for the line(s) below can be found at http://www.snorkellifts.com/core/misc/dialog/dialog.jquery-ui.js. */
(function(t,i){var e=i.tabbable,a=i.isTabbable;t.widget('ui.dialog',t.ui.dialog,{options:{buttonClass:'button',buttonPrimaryClass:'button--primary'},_createButtons:function(){var i=this.options,e,t,n=i.buttons.length;for(t=0;t<n;t++){if(i.buttons[t].primary&&i.buttons[t].primary===!0){e=t;delete i.buttons[t].primary;break}};this._super();var a=this.uiButtonSet.children().addClass(i.buttonClass);if(typeof e!=='undefined'){a.eq(t).addClass(i.buttonPrimaryClass)}},_focusTabbable:function(){var i=this._focusedElement?this._focusedElement.get(0):null;if(!i){i=this.element.find('[autofocus]').get(0)};if(!i){var l=[this.element,this.uiDialogButtonPane];for(var s=0;s<l.length;s++){var u=l[s].get(0);if(u){var o=e(u);i=o.length?o[0]:null};if(i){break}}};if(!i){var n=this.uiDialogTitlebarClose.get(0);i=n&&a(n)?n:null};if(!i){i=this.uiDialog.get(0)};t(i).eq(0).trigger('focus')}})})(jQuery,window.tabbable);
/* Source and licensing information for the above line(s) can be found at http://www.snorkellifts.com/core/misc/dialog/dialog.jquery-ui.js. */