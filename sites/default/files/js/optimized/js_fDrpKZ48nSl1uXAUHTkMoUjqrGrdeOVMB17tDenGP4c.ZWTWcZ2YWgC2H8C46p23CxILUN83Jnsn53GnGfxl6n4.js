/* Source and licensing information for the line(s) below can be found at http://www.snorkellifts.com/core/modules/history/js/history.js. */
(function(e,a,r,n){var s=parseInt(r.user.uid,10),o=2592000,c=Math.round(new Date().getTime()/1000)-o,t=!1;if(r.history&&r.history.lastReadTimestamps){t=r.history.lastReadTimestamps};a.history={fetchTimestamps:function(r,o){if(t){o();return};e.ajax({url:a.url('history/get_node_read_timestamps'),type:'POST',data:{'node_ids[]':r},dataType:'json',success:function(t){Object.keys(t||{}).forEach(function(e){n.setItem('Drupal.history.'.concat(s,'.').concat(e),t[e])});o()}})},getLastRead:function(e){if(t&&t[e]){return parseInt(t[e],10)};return parseInt(n.getItem('Drupal.history.'.concat(s,'.').concat(e))||0,10)},markAsRead:function(r){e.ajax({url:a.url('history/'.concat(r,'/read')),type:'POST',dataType:'json',success:function(e){if(t&&t[r]){return};n.setItem('Drupal.history.'.concat(s,'.').concat(r),e)}})},needsServerCheck:function(e,a){if(a<c){return!1};if(t&&t[e]){return a>parseInt(t[e],10)};var r=parseInt(n.getItem('Drupal.history.'.concat(s,'.').concat(e))||0,10);return a>r}}})(jQuery,Drupal,drupalSettings,window.localStorage);
/* Source and licensing information for the above line(s) can be found at http://www.snorkellifts.com/core/modules/history/js/history.js. */