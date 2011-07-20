(function($){
  $(function() {
    $('form').submit(function(e) {
      e.preventDefault();
      var $t = $(this);        
      
      $.post('/welcome/vota', $t.serialize(), function() {
        console.log('exito');
      });
    });
  });
}(jQuery));