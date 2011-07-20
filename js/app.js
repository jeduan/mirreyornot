(function($){
  $(function() {
    $('form').submit(function(e) {
      e.preventDefault();
      var $t = $(this);        
      
      $.post('/welcome/vota', $t.serialize(), function() {
        console.log('exito');
      });
    });
    
    FB.init({appId: $('fb-root').data('appid'), cookie: true});

    FB.getLoginStatus(function(response) {
        if (response.session) {
          init();
        } else {
          // no user session available, someone you dont know
        }
    });
    function init() {
        FB.api('/me', function(response) {
            $("#username").html("<img src='https://graph.facebook.com/" + response.id + "/picture'/><div>" + response.name + "</div>");

            $("#jfmfs-container").jfmfs({ 
              max_selected: 15, 
              max_selected_message: "{0} of {1} selected",
              friend_fields: "id,name,last_name",
              pre_selected_friends: [1014025367],
              exclude_friends: [1211122344, 610526078],
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

            $("#logged-out-status").hide();
            $("#show-friends").show();

        });
      }

      $("#show-friends").live("click", function() {
          var friendSelector = $("#jfmfs-container").data('jfmfs');             
          $("#selected-friends").html(friendSelector.getSelectedIds().join(', ')); 
      });
  });
}(jQuery));