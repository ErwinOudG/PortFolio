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
