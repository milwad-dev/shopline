 /**=====================
     Fly Cart js
==========================**/
 $('.btn-cart').on('click', function () {
     if ($(window).width() > 768) {
         var cart = $('.button-item');
     } else {
         var cart = $('.mobile-cart ul li a .icli.fly-cate');
     }
     var imgtodrag = $(this).parents('.product-box-4, .deal-box').find(".product-image img, .category-image img").eq(0);
     if (imgtodrag) {
         var imgclone = imgtodrag.clone()
             .offset({
                 top: imgtodrag.offset().top,
                 left: imgtodrag.offset().left
             })
             .css({
                 'opacity': '0.5',
                 'position': 'absolute',
                 'height': '130px',
                 'width': '130px',
                 'z-index': '100'
             })
             .appendTo($('body'))
             .animate({
                 'top': cart.offset().top + 10,
                 'left': cart.offset().left + 10,
                 'width': 75,
                 'height': 75
             }, 1000, 'easeInOutExpo');

         imgclone.animate({
             'width': 0,
             'height': 0
         }, function () {
             $(this).detach()
         });
     }
 });