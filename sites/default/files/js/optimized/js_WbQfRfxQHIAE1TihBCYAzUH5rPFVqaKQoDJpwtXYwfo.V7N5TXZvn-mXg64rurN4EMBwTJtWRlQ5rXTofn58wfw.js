/* Source and licensing information for the line(s) below can be found at http://www.snorkellifts.com/core/misc/collapse.js. */
(function(t,a,e){function n(e){this.$node=t(e);this.$node.data('details',this);var n=window.location.hash&&window.location.hash!=='#'?', '.concat(window.location.hash):'';if(this.$node.find('.error'.concat(n)).length){this.$node.attr('open',!0)};this.setupSummaryPolyfill()};t.extend(n,{instances:[]});t.extend(n.prototype,{setupSummaryPolyfill:function(){var n=this.$node.find('> summary');n.attr('tabindex','-1');t('<span class="details-summary-prefix visually-hidden"></span>').append(this.$node.attr('open')?e.t('Hide'):e.t('Show')).prependTo(n).after(document.createTextNode(' '));t('<a class="details-title"></a>').attr('href','#'.concat(this.$node.attr('id'))).prepend(n.contents()).appendTo(n);n.append(this.$summary).on('click',t.proxy(this.onSummaryClick,this))},onSummaryClick:function(t){this.toggle();t.preventDefault()},toggle:function(){var a=this,t=!!this.$node.attr('open'),n=this.$node.find('> summary span.details-summary-prefix');if(t){n.html(e.t('Show'))}
else{n.html(e.t('Hide'))};setTimeout(function(){a.$node.attr('open',!t)},0)}});e.behaviors.collapse={attach:function(t){if(a.details){return};once('collapse','details',t).forEach(function(t){t.classList.add('collapse-processed');n.instances.push(new n(t))})}};var i=function(t,e){e.parents('details').not('[open]').find('> summary').trigger('click')};t('body').on('formFragmentLinkClickOrHashChange.details',i);e.CollapsibleDetails=n})(jQuery,Modernizr,Drupal);
/* Source and licensing information for the above line(s) can be found at http://www.snorkellifts.com/core/misc/collapse.js. */