
function navigateTo(url) {
    window.location.href = url;
}

// Palauttaa sivun alkuun
let mybutton = document.getElementById("topbtn");
window.onscroll = function() {scrollFunction()};

function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}