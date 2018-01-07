// Break out of an iframe, if someone shoves your site
// into one of those silly top-bar URL shortener things.
//
// Passing `this` and re-aliasing as `window` ensures
// that the window object hasn't been overwritten.
  (function(window) {
    if (window.location !== window.top.location) {
      window.top.location = window.location;
    }
  })

// this snippet scrolls slowly to id (hash)
// future addon animate switch
$(function() {
     // Smooth Scrolling
     $('a[href*="#"]:not([href="#"])').click(function() {
       if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
         var target = $(this.hash);
         target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
         if (target.length) {
           $('html, body').animate({
             scrollTop: target.offset().top-50
           }, 1000);
           return false;
         }
       }
     });
   });
