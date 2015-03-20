jQuery(document).ready(function($){
  
  
  var prevLink = $('link[rel=prev]').eq(0).attr('href');
  var nextLink = $('link[rel=next]').eq(0).attr('href');
  
  if (!$('body').hasClass('fee-on')) {
    
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
    
  })

});