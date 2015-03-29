jQuery(document).ready(function($){
  
  
  var prevLink = $('link[rel=prev]').eq(0).attr('href');
  var nextLink = $('link[rel=next]').eq(0).attr('href');
  
  $("body.single").delay(500).fadeIn(1000);
    $(window).on('beforeunload', function(){
        $("body").fadeOut(800);
  });
  
  
  if (!$('body').hasClass('home')) {
    
    $("body").keydown(function(e) {
      if(e.keyCode == 37) { // left
        
        console.log('You went left');
        
        if(prevLink){ 
          document.location.href=prevLink;
        }
        
      }
      else if(e.keyCode == 39) { // right
        
        console.log('You went right');
        
        if(nextLink){
          document.location.href=nextLink;
        }
        
      }
    });
  
  }
  
  $('.menu-toggle').on('click', function(e){
    
    $('.offcanvas').toggleClass('off');
    
    e.preventDefault();
    
  });
  
  // Owl Slider
  $("#owl-slider").owlCarousel({
      navigation : false,
      slideSpeed : 300,
      paginationSpeed : 400,
      singleItem:true
  });
  
  // If is homepage
  if ($(".home")[0]){
    
    jQuery(document.documentElement).keyup(function (event) {  
      
      var owl = $("#owl-slider");
  
      // handle cursor keys
      if (event.keyCode == 37) {
         // go left
         owl.trigger('owl.prev');
      } else if (event.keyCode == 39) {
         // go right
         owl.trigger('owl.next');
      }
  
    });
    
  }
  
  

});