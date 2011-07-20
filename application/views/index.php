<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<title>Mirrey or not</title>

	<!--[if lte IE 9]><link rel="stylesheet" href="css/ie.css" type="text/css" media="screen" /><![endif]-->

	<link rel="stylesheet" href="css/960gs.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="css/jquery.facebook.multifriend.select.css" type="text/css" media="screen" title="no title" charset="utf-8">
	
	<!-- Your styles -->
	<link rel="stylesheet" href="css/styles.css" type="text/css" media="screen" />

</head>


<body>
  <div id="fb-root"></div> 
  <script src="http://connect.facebook.net/es_LA/all.js"></script> 
  <script> 
      FB.init({appId: '<?php echo $app_id ?>', cookie: true});

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
      </script>
  <div class="container container_10">
    <h1 class="grid_10">¡Vota por tu Mirrey, papawh!</h1>
    <div class="grid_10">
      <div id="logged-out-status" style=""> 
          <a href="javascript:login()">Login</a> 
      </div> 

      <div> 
          <div id="username"></div> 
          <a href="#" id="show-friends" style="display:none;">Show Selected Friends</a> 
          <div id="selected-friends" style="height:30px"></div> 
          <div id="jfmfs-container"></div> 
      </div>
    </div>
    <div class="grid_5">
      <img src="http://graph.facebook.com/702152773/picture?type=large" alt="" class="profile"/>
      <form>
      <input type="hidden" name="votado" value="702152773" />
      <input type="hidden" name="votante" value="<?php echo $me['id'] ?>" />
      <input type="submit" name="send" value="Pta, este, papawh" />
      </form>
    </div>
    <div class="grid_5">
      <img src="http://graph.facebook.com/1002101672/picture?type=large" alt="" class="profile"/>
      <form>
      <input type="hidden" name="votado" value="1002101672" />
      <input type="hidden" name="votante" value="<?php echo $me['id'] ?>" />
      <input type="submit" name="send" value="Wey este es de mejor familia" />
      </form>
    </div>
  </div>
  
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
<script src="js/jquery.facebook.multifriend.select.js" type="text/javascript"></script>
<script src="js/app.js" type="text/javascript"></script>
</body>

</html>