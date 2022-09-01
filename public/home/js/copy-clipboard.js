 /**=====================
     Copy Clipboard js
==========================**/
 (function ($) {
     "use strict";
     var clipboard = new ClipboardJS('.bank-coupon');
     clipboard.on('success', function (e) {
         e.clearSelection();
     });
     clipboard.on('error', function (e) {});
 })(jQuery);