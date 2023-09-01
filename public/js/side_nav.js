  // SideNav Initialization
  $(".button-collapse").sideNav();
      var el =  document.getElementById('menuconscroll')
      var ps = new PerfectScrollbar(el);
  
  new WOW().init();

  // preloader
  $(window).on("load", function () {
    $('#mdb-preloader').fadeOut('fast');
});




// $.fn.extend({  // evita seleccionar
//   disableSelection: function() { 
//       this.each(function() { 
//           if (typeof this.onselectstart != 'undefined') {
//               this.onselectstart = function() { return false; };
//           } else if (typeof this.style.MozUserSelect != 'undefined') {
//               this.style.MozUserSelect = 'none';
//           } else {
//               this.onmousedown = function() { return false; };
//           }
//       }); 
//   } 
// });

// $(document).ready(function() {
//     $('body').disableSelection();

// });

$(document).on('dragstart', 'body', function(evt) { // evita arrartrar
  evt.preventDefault();
});