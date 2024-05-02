//

$(document).ready(function() 
{
    $('#refer, #rautio, #back, #headref, #services, #contact').hide();

    $('#kuva2, #link1').click(function() 
    {
        $('#kuva2, #divit, #services, #contact, #refer').hide();
        $('#rautio, #back').show();
            $('#back').click(function()
            {
                $('#rautio, #back').hide();
                $('#kuva2, #divit').show();
            })
    })

    $('#kuva3, #link2').click(function() 
    {
        $('#kuva3, #divit, #rautio, #contact, #refer').hide();
        $('#services, #back').show();
            $('#back').click(function()
            {
                $('#services, #back').hide();
                $('#kuva3, #divit').show();
            })
    })

    $('#kuva4, #link3').click(function() 
    {
        $('#kuva4, #divit, #refer, #rautio, #services').hide();
        $('#contact, #back').show();
            $('#back').click(function()
            {
                $('#contact, #back').hide();
                $('#kuva4, #divit').show();
            })
    })

    $('#kuva5, #link4').click(function() 
    {
        $('#kuva5, #divit, #mainheader, #rautio, #services, #contact').hide();
        $('#refer, #back, #headref').show();
            $('#back').click(function()
            {
                $('#refer, #back, #headref').hide();
                $('#kuva5, #divit, #mainheader').show();
            })
    })

    $('#link1, #link2, #link3').click(function(){
        $('#headref').hide();
        $('#mainheader').show();
    })

});

// Palauttaa sivun alkuun
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}