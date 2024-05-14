
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

// Poistamisbuttonin hide and show funktiot
$(document).ready(function() {

  $('#deletebtn, #deletechk').hide();
  $('#showdeletebtn').click(function() {

      $(this).hide();
      $('#deletebtn, #deletechk').show();
      $('#deletebtn').click(function(event) {
          event.preventDefault();

          var valitut = $('input[type="checkbox"][name="poista[]"]:checked').length;

        // Tarkistetus että on valittu edes yksi
        if (valitut > 0) {
            $('#deletebtn, #deletechk').hide();

            $('#showdeletebtn').show();
            
            $(this).closest('form').submit();
        } else {
            alert('Valitse vähintään yksi kohde poistettavaksi.');
            $('#deletebtn, #deletechk').hide();

            $('#showdeletebtn').show();
        }             
    })         
  })         
})         
