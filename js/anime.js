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

    anime({
      targets: '#rautio, #services, #refer, #contact',
      borderRadius: ['50%', '0%'],
      easing: 'easeInOutQuad',
      scale: ['0', '1'],
      opacity: 1,
      duration: 1000
    });
    

