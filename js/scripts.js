
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

// Avaa modalin, lukitsee sen ettei voi sulkea kuin close napista
$(document).ready(function() {
var myModal = new bootstrap.Modal(document.getElementById('exampleModal2'), {
  backdrop: 'static',
  keyboard: false
});
myModal.show();
});

$(document).ready(function() {
  var myModal = new bootstrap.Modal(document.getElementById('exampleModal'), {
    backdrop: 'static',
    keyboard: false
  });
  myModal.show();
});