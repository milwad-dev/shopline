 /**=====================
     Timer3 js
==========================**/
 var second = 1000,
     minute = second * 60,
     hour = minute * 60,
     day = hour * 24;

 var countDown = new Date("Aug 21, 2023 00:00:00").getTime(),
     x = setInterval(function () {
         var now = new Date().getTime(),
             distance = countDown - now;

         (document.getElementById("days4").innerText = Math.floor(distance / day)),
         (document.getElementById("hours4").innerText = Math.floor(
             (distance % day) / hour
         )),
         (document.getElementById("minutes4").innerText = Math.floor(
             (distance % hour) / minute
         )),
         (document.getElementById("seconds4").innerText = Math.floor(
             (distance % minute) / second
         ));
     }, second);