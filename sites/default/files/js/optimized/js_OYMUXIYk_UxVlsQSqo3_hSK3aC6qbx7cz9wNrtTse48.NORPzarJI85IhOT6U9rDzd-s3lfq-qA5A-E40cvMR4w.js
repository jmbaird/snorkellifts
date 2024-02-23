/* Source and licensing information for the line(s) below can be found at http://www.snorkellifts.com/core/assets/vendor/jquery.ui/ui/unique-id-min.js. */
/*!
 * jQuery UI Unique ID 1.13.2
 * http://jqueryui.com
 *
 * Copyright jQuery Foundation and other contributors
 * Released under the MIT license.
 * http://jquery.org/license
 */
!function(i){"use strict";"function"==typeof define&&define.amd?define(["jquery","./version"],i):i(jQuery)}((function(i){"use strict";return i.fn.extend({uniqueId:(e=0,function(){return this.each((function(){this.id||(this.id="ui-id-"+ ++e)}))}),removeUniqueId:function(){return this.each((function(){/^ui-id-\d+$/.test(this.id)&&i(this).removeAttr("id")}))}});var e}));
//# sourceMappingURL=unique-id-min.js.map
/* Source and licensing information for the above line(s) can be found at http://www.snorkellifts.com/core/assets/vendor/jquery.ui/ui/unique-id-min.js. */