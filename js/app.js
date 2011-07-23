(function($){
  $(function() {
    
    var reload = function(participants) {

      var paint = function(participants) {
        var $buffer = $('#mirrey-contestants').empty();
        $.each(participants, function(i, participant) {
          var mirrey = tmpl('mirrey_tmpl', {
            id: participant,
            my_id: $('#fb-root').data('meid')
          });
          $buffer.append(mirrey);
        });              
      }
      
      
      if ( ! participants || ! $.isArray(participants) ) {
        $.getJSON('/welcome/participants', function(data){
          paint(data);
        });
      } else {
        paint(participants);
      }

    };
    
    $('#mirrey-contestants').delegate('.vota-mirrey', 'click', function(e) {
      e.preventDefault();
      var $i = $(this).find('img'),
        data = {
          votante: $i.data('votante'),
          votado: $i.data('votado')
        };
      
      _gaq.push(['_trackEvent', 'Votacion', 'Voto', $i.data('votado'), null]);
      
      $.post('/welcome/vote', data, function() {
        reload();
      });
    });  
    
    $('#skip-mirrey').click(function(){
      reload();
      
      _gaq.push(['_trackEvent', 'Skip', 'Voting', null, null]);
    });
    
    $('#top-mirrey').click(function(){
      $.getJSON('/welcome/topten', function(data){

        if (!data) return;
        
        _gaq.push(['_trackEvent', 'Topten', 'Open', null, null]);
        
        $('<div />').html(tmpl('topten_tmpl', data)).dialog({
          minWidth:620,
          minHeight:400,
          resizable: true,
          position: ['center', 50],
          title: 'Goeeey ¿hacer fila en el antro?'
        });
      });
    });
    
    FB.init({appId: $('#fb-root').data('appid'), cookie: true});

    FB.getLoginStatus(function(response) {
        if (response.session) {
          busca_amigos();
        } else {
          // no user session available, someone you dont know
        }
    });
    var busca_amigos = function() {
      FB.api('/me', function(response) {
        $("#jfmfs-container").jfmfs({ 
          max_selected: 1, 
          max_selected_message: "{0} de {1}",
          friend_fields: "id,name,last_name,gender",
          labels: {
            selected: "Seleccionados",
            filter_default: "Empieza a escribir un nombre",
            filter_title: "Encuentra a tu amigo mas mirrey:",
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
      
    $('#add-mirrey').click(function() {
      
      _gaq.push(['_trackEvent', 'Agregar', 'Open', null, null]);
      
      $('#friend-container').dialog({
        minWidth:620,
        minHeight:400,
        resizable: true,
        position: ['center', 50],
        title: 'Elige a tu mirreey'
      });
    });
  });
}(jQuery));