/* Source and licensing information for the line(s) below can be found at http://www.snorkellifts.com/core/misc/polyfills/object.assign.js. */
;if(typeof Object.assign!=='function'){Object.defineProperty(Object,'assign',{value:function(n,i){'use strict';if(n===null||n===undefined){throw new TypeError('Cannot convert undefined or null to object')};var o=Object(n);for(var t=1;t<arguments.length;t++){var e=arguments[t];if(e!==null&&e!==undefined){for(var r in e){if(Object.prototype.hasOwnProperty.call(e,r)){o[r]=e[r]}}}};return o},writable:!0,configurable:!0})};
/* Source and licensing information for the above line(s) can be found at http://www.snorkellifts.com/core/misc/polyfills/object.assign.js. */