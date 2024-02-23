/* Source and licensing information for the line(s) below can be found at http://www.snorkellifts.com/core/modules/contextual/js/toolbar/views/AuralView.js. */
(function(t,n,i,e){n.contextualToolbar.AuralView=i.View.extend({announcedOnce:!1,initialize:function(n){this.options=n;this.listenTo(this.model,'change',this.render);this.listenTo(this.model,'change:isViewing',this.manageTabbing);t(document).on('keyup',e.bind(this.onKeypress,this));this.manageTabbing()},render:function(){this.$el.find('button').attr('aria-pressed',!this.model.get('isViewing'));return this},manageTabbing:function(){var i=this.model.get('tabbingContext');if(i){if(i.active){n.announce(this.options.strings.tabbingReleased)};i.release()};if(!this.model.get('isViewing')){i=n.tabbingManager.constrain(t('.contextual-toolbar-tab, .contextual'));this.model.set('tabbingContext',i);this.announceTabbingConstraint();this.announcedOnce=!0}},announceTabbingConstraint:function(){var t=this.options.strings;n.announce(n.formatString(t.tabbingConstrained,{'@contextualsCount':n.formatPlural(n.contextual.collection.length,'@count contextual link','@count contextual links')}));n.announce(t.pressEsc)},onKeypress:function(n){if(!this.announcedOnce&&n.keyCode===9&&!this.model.get('isViewing')){this.announceTabbingConstraint();this.announcedOnce=!0};if(n.keyCode===27){this.model.set('isViewing',!0)}}})})(jQuery,Drupal,Backbone,_);
/* Source and licensing information for the above line(s) can be found at http://www.snorkellifts.com/core/modules/contextual/js/toolbar/views/AuralView.js. */