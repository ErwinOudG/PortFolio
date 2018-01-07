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
$(document).ready(function(){
  $("a").on('click', function(event) {
    if (this.hash !== "") {
      event.preventDefault();
      var idHash = this.hash;
      $('html, body').animate({
          scrollTop: $(idHash).offset().top
            }, 1000, function(){
        window.location.hash = idHash;
      });
    }
  });
});

// document.getElementById("id_tag1").innerHTML = ;
