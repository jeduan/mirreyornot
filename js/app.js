(function($){
  $(function() {
    var render = function(participante) {
      var p = {
        id: participante,
        my_id: $('#fb-root').data('meid')
      };
      return tmpl('mirrey_tmpl', p);
    };
    
    $('.vota-mirrey').click(function(e) {
      e.preventDefault();
      var $i = $(this).find('img'),
        data = {
          votante: $i.data('votante'),
          votado: $i.data('votado')
        };
      
      $.post('/welcome/vote', data, function(data) {
        $.getJSON('/welcome/participants', function(participants){
          var $buffer = $('#mirrey-contestants').empty();
          $.each(participants, function(i, participant) {
            $buffer.append(render(participant));
          });
        });
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
          friend_fields: "id,name,last_name,gender",
          pre_selected_friends: 702152773,
          labels: {
            selected: "Seleccionados",
            filter_default: "Empieza a escribir un nombre",
            filter_title: "Encuentra hasta 3 amigos:",
            all: "Todos",
            max_selected_message: ""
          },
          filter: function(friends){
            var ret = [];
            $.each(friends, function(i, friend) {
              if (friend.gender === 'male') ret.push(friend);
            });
            return ret;
          },  sorter: function(a, b) {
            var x = a.last_name.toLowerCase(),
              y = b.last_name.toLowerCase();
            return ((x < y) ? -1 : ((x > y) ? 1 : 0));
          }
        });
        $("#jfmfs-container").bind("jfmfs.selection.changed", function(e, data) { 
            if (window.console) console.log("changed", data);
        });                     
      });
    };
      
    $('#open-jfmfs').click(function() {
      $('#friend-container').dialog({
        minWidth:620,
        minHeight:400,
        resizable: true,
        position: ['center', 50],
        title: 'Pta ¿como se llamaba?'
      });
    });

      $("#show-friends").live("click", function() {
          var friendSelector = $("#jfmfs-container").data('jfmfs');             
          $("#selected-friends").html(friendSelector.getSelectedIds().join(', ')); 
      });
  });
}(jQuery));