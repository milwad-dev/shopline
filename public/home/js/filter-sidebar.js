 /**=====================
     Filter Sidebar js
==========================**/
 $(".filter-button").click(function () {
     $(".bg-overlay, .left-box").addClass("show");
 });
 $(".back-button, .bg-overlay").click(function () {
     $(".bg-overlay, .left-box").removeClass("show");
 });

 $(document).ready(function () {
     $(".sort-by-button").click(function () {
         $(".top-filter-menu").toggleClass("show");
     });
 });