 /**=====================
     Quantity 2 js
==========================**/
 $(".addcart-button").click(function () {
     $(this).next().addClass("open");
     $(".add-to-cart-box .qty-input").val('1');
 });

 $('.add-to-cart-box').on('click', function () {
     var $qty = $(this).siblings(".qty-input");
     var currentVal = parseInt($qty.val());
     if (!isNaN(currentVal)) {
         $qty.val(currentVal + 1);
     }
 });

 $('.qty-left-minus').on('click', function () {
     var $qty = $(this).siblings(".qty-input");
     var _val = $($qty).val();
     if (_val == '1') {
         var _removeCls = $(this).parents('.cart_qty');
         $(_removeCls).removeClass("open");
     }
     var currentVal = parseInt($qty.val());
     if (!isNaN(currentVal) && currentVal > 0) {
         $qty.val(currentVal - 1);
     }
 });

 $('.qty-right-plus').click(function () {
     if ($(this).prev().val() < 9) {
         $(this).prev().val(+$(this).prev().val() + 1);
     }
 });