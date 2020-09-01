(function ($) {
  "use strict";
  var browserWindow = $(window);

  browserWindow.on("load", function () {
    $(".preloader").fadeOut("slow", function () {
      $(this).remove();
    });
  });
})(jQuery);

var prevScrollpos = window.pageYOffset;
window.onscroll = function () {
  var currentScrollPos = window.pageYOffset;
  if (this.screen.width > 500) {
    if (prevScrollpos > currentScrollPos) {
      document.getElementById("navbar").style.top = "0";
    } else {
      document.getElementById("navbar").style.top = "-100px";
    }
  }
  if (currentScrollPos > 400) {
    document.getElementById("navbar").style.background = "rgba(0, 0, 0, 1)";
  } else {
    document.getElementById("navbar").style.background = "rgba(0, 0, 0, 0)";
  }
  prevScrollpos = currentScrollPos;
};

AOS.init({
  delay: 250,
  duration: 800,
  once: true,
});
