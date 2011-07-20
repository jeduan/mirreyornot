(function($){
  $(function() {
    $('form').submit(function(e) {
      e.preventDefault();
      var $t = $(this),
        s = $t.serialize();
        
      console.log(s);
    });
  });
}(jQuery));