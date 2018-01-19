// main script
setTimeout(addMenu, 1);

// $( document ).ready(function() {
//   $('.collapsible').collapsible();
// });

// function section

function addMenu() {
  get_data('./php/getmenu.php', genmenu);
};

//Handles and parses data to js object
function get_data(url, callback) {
  // Older browser call xhttp something else
  var xhttp = new XMLHttpRequest();

  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      // console.log(this.responseText);
      var responseJSON = JSON.parse(this.responseText);
      callback(responseJSON);
    }
  };
  xhttp.open("GET", url, true);
  xhttp.send();
}

function genmenu(menuObj){
  // console.log(menuObj);
  $("body").append("<nav id='topmenu'></nav>");
  $("nav").append("<ul></ul>").addClass('tm_topmenu tm_centre');
  $("ul").addClass('tm_topmenu');
  for (var iii = 0; iii < menuObj.itemname.length; iii++) {
    var litext = '<a href="#id' + menuObj.itemnum[iii] + '">' + menuObj.itemname[iii] +'</a>';
    $("ul:first").append("<li>"+litext+"</li>");
    // console.log(menuObj.itemname[i]);
    var divtext = '<div id="id' + menuObj.itemnum[iii] + '" class="tm_title_mid"></div>';
    $("body").append(divtext);
    if (iii == 4 ) {
      $("div:last").append('<div class="container"></div>');
      $("div:last").append('<ul class="collapsible" data-collapsible="accordion"></ul>');
      $("ul:last").append('<li><div class="collapsible-header"><i class="material-icons">filter_drama</i>First</div><div class="collapsible-body"><span>Lorem ipsum dolor sit amet.</span></div></li>');
      $("ul:last").append('<li><div class="collapsible-header"><i class="material-icons">place</i>Second</div><div class="collapsible-body"><span>Lorem ipsum dolor sit amet.</span></div></li>');
      $("ul:last").append('<li><div class="collapsible-header"><i class="material-icons">whatshot</i>Third</div><div class="collapsible-body"><span>Lorem ipsum dolor sit amet.</span></div></li>');
      // $("div:last").append(menuObj.itemname[i]);
    } else {
      $("div:last").text(menuObj.itemname[iii]);
    }
    // $("#id" + menuObj.itemnum[i].toString()).load("./php/mitem" + menuObj.itemnum[i].toString() + ".php");
  }
  /* All panels are accordionized immediately after loading the content */
  $(".accordion").accordion({
      collapsible: true,
      icons: false,
      autoHeight: false,
      active: true
   });

  // $('.collapsible').collapsible();

}

// Break out of an iframe, if someone shoves your site
// into one of those silly top-bar URL shortener things.
//
// Passing `this` and re-aliasing as `window` ensures
// that the window object hasn't been overwritten.
// function(window) {
//     if (window.location !== window.top.location) {
//       window.top.location = window.location;
//     }
// }

// this snippet scrolls slowly to id (hash)
// future addon animate switch
// $(function() {
//      // Smooth Scrolling
//      $('a[href*="#"]:not([href="#"])').click(function() {
//        if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
//          var target = $(this.hash);
//          target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
//          if (target.length) {
//            $('html, body').animate({
//              scrollTop: target.offset().top-50
//            }, 1000);
//            return false;
//          }
//        }
//      });
//    });
