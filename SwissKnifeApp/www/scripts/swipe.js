$(document).ready(function(){
    
  window.slideshow = new Swipe(document.getElementById('slider'), {
  startSlide: 2,
  speed: 400,
  auto: 0,
  continuous: true,
  disableScroll: false,
  stopPropagation: false,
  callback: function(index, elem) {},
  transitionEnd: function(index, elem) {}
});
    
});
