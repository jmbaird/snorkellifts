/* Source and licensing information for the line(s) below can be found at http://www.snorkellifts.com/modules/contrib/blazy/js/polyfill/blazy.raf.min.js. */
!function(n){for(var a=0,i=['ms','moz','webkit','o'],e=0;e<i.length&&!n.requestAnimationFrame;++e)n.requestAnimationFrame=window[i[e]+'RequestAnimationFrame'],n.cancelAnimationFrame=window[i[e]+'CancelAnimationFrame']||window[i[e]+'CancelRequestAnimationFrame'];n.requestAnimationFrame||(n.requestAnimationFrame=function(e,o){var i=(new Date).getTime(),t=Math.max(0,16-(i-a)),m=n.setTimeout(function(){e(i+t)},t);return a=i+t,m}),n.cancelAnimationFrame||(n.cancelAnimationFrame=function(n){clearTimeout(n)})}(this);
/* Source and licensing information for the above line(s) can be found at http://www.snorkellifts.com/modules/contrib/blazy/js/polyfill/blazy.raf.min.js. */