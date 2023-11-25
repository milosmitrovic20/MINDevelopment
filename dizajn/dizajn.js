$(function(){
    $('#font').fontselect().change(function(){
    
      var font = $(this).val().replace(/\+/g, ' ');
      
      font = font.split(':');
      
      $('p').css('font-family', font[0]);
    });
});