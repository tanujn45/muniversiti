var prevScrollpos = window.pageYOffset;
window.onscroll = function () {
    var currentScrollPos = window.pageYOffset;
    if (prevScrollpos > currentScrollPos) {
        document.getElementById("navbar").style.top = "0";
    } else {
        document.getElementById("navbar").style.top = "-100px";
    }
    if (currentScrollPos > 400) {
        document.getElementById("navbar").style.background = "rgba(0, 0, 0, 1)";
    } else {
        document.getElementById("navbar").style.background = "rgba(0, 0, 0, 0)";
    }
    prevScrollpos = currentScrollPos;

}