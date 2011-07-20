(function($){
  $(function() {
    $('form').submit(function(e) {
      e.preventDefault();
      var $t = $(this);        
      
      $.post('/welcome/vota', $t.serialize(), function() {
        console.log('exito');
      });
    });
    
    FB.init({appId: $('#fb-root').data('appid'), cookie: true});

    FB.getLoginStatus(function(response) {
        if (response.session) {
          init();
        } else {
          // no user session available, someone you dont know
        }
    });
    var init = function() {
        FB.api('/me', function(response) {
            $("#jfmfs-container").jfmfs({ 
              max_selected: 3, 
              max_selected_message: "{0} de {1}",
              friend_fields: "id,name,last_name",
              pre_selected_friends: 702152773,
              labels: {
                selected: "Seleccionados",
                filter_default: "Empieza a escribir un nombre",
                filter_title: "Encuentra amigos:",
                all: "Todos",
                max_selected_message: "{0} de {1} seleccionados"
              },
              sorter: function(a, b) {
                var x = a.last_name.toLowerCase();
                var y = b.last_name.toLowerCase();
                return ((x < y) ? -1 : ((x > y) ? 1 : 0));
              }
            });
            $("#jfmfs-container").bind("jfmfs.friendload.finished", function() { 
                window.console && console.log("finished loading!"); 
            });
            $("#jfmfs-container").bind("jfmfs.selection.changed", function(e, data) { 
                window.console && console.log("changed", data);
            });                     

        });
      }
      
      $('#open-jfmfs').click(function() {
        $('#friend-container').dialog();
      });

      $("#show-friends").live("click", function() {
          var friendSelector = $("#jfmfs-container").data('jfmfs');             
          $("#selected-friends").html(friendSelector.getSelectedIds().join(', ')); 
      });
  });
}(jQuery));