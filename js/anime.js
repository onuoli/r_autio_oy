
document.getElementById('kuva2').addEventListener('click', function() {
    anime({
      targets: '#rautio',
      borderRadius: ['50%', '0%'],
      easing: 'easeInOutQuad',
      scale: ['0', '1'],
      opacity: 1,
      duration: 1000
    });
    })

document.getElementById('kuva3').addEventListener('click', function() {
    anime({
      targets: '#services',
      borderRadius: ['50%', '0%'],
      easing: 'easeInOutQuad',
      scale: ['0', '1'],
      opacity: 1,
      duration: 1000
    });
    })

document.getElementById('kuva4').addEventListener('click', function() {
    anime({
      targets: '#contact',
      borderRadius: ['50%', '0%'],
      easing: 'easeInOutQuad',
      scale: ['0', '1'],
      opacity: 1,
      duration: 1000
    });
    })        

document.getElementById('kuva5').addEventListener('click', function() {
    anime({
      targets: '#refer',
      borderRadius: ['50%', '0%'],
      easing: 'easeInOutQuad',
      scale: ['0', '1'],
      opacity: 1,
      duration: 1000
    });
    })    


    document.getElementById('link1').addEventListener('click', function() {
      anime({
        targets: '#rautio',
        borderRadius: ['50%', '0%'],
        easing: 'easeInOutQuad',
        scale: ['0', '1'],
        opacity: 1,
        duration: 1000
      });
      })
  
  document.getElementById('link2').addEventListener('click', function() {
      anime({
        targets: '#services',
        borderRadius: ['50%', '0%'],
        easing: 'easeInOutQuad',
        scale: ['0', '1'],
        opacity: 1,
        duration: 1000
      });
      })
  
  document.getElementById('link3').addEventListener('click', function() {
      anime({
        targets: '#contact',
        borderRadius: ['50%', '0%'],
        easing: 'easeInOutQuad',
        scale: ['0', '1'],
        opacity: 1,
        duration: 1000
      });
      })        
  
  document.getElementById('link4').addEventListener('click', function() {
      anime({
        targets: '#refer',
        borderRadius: ['50%', '0%'],
        easing: 'easeInOutQuad',
        scale: ['0', '1'],
        opacity: 1,
        duration: 1000
      });
      })    

document.getElementById('back').addEventListener('click', function() {
    anime({
      targets: '#divit',
      borderRadius: ['50%', '0%'],
      easing: 'easeInOutQuad',
      scale: ['0', '1'],
      opacity: ['0', '1'],
      rotateY: '360deg',
      duration: 1000,
      complete: function()
      {
        anime.set('#divit', {
        rotateY: '0deg'
      });
      }
    });
    })

anime({
      targets: '#divit',
      borderRadius: ['50%', '0%'],
      easing: 'easeInOutQuad',
      scale: ['0', '1'],
      opacity: ['0', '1'],
      rotateY: '360deg',
      duration: 1000,
      complete: function()
      {
        anime.set('#divit', {
        rotateY: '0deg'
      });
      }
    });

    

