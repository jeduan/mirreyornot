<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<title>Mirrey or not</title>

	<!--[if lte IE 9]><link rel="stylesheet" href="css/ie.css" type="text/css" media="screen" /><![endif]-->

	<link rel="stylesheet" href="css/960gs.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="css/jquery.facebook.multifriend.select.css" type="text/css" media="screen" title="no title" charset="utf-8">
  <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.10/themes/base/jquery-ui.css" rel="stylesheet" />
	
	<!-- Your styles -->
	<link rel="stylesheet" href="css/styles.css" type="text/css" media="screen" />

</head>


<body>

  <script type="text/html" id="mirrey_tmpl">
    <div class="grid_5">
      <a href="#" class="vota-mirrey">
        <img src="http://graph.facebook.com/<%=id%>/picture?type=large" class="profile" 
          data-votado="<%=id%>" data-votante="<%=my_id%>"/>
      </a>
    </div>
  </script>
  <script type="text/html" id="topten_tmpl">
    <% var j = data.length; for (var i = 0; i < j; i++) { %>
    <div class="mirrey-top grid_1">
      <a href="http://facebook.com/profile.php?id=<%=data[i].id%>" target="_blank"><img src="http://graph.facebook.com/<%=data[i].id%>/picture?type=normal" /></a>
    </div>
    <% if (i === 4) {%><div class="clear" /><%}%>
    <% } %>
  </script>
  <div id="fb-root" data-appid="<?php echo $app_id ?>" data-meid="<?php echo $me['id'] ?>"></div> 
  <div class="container container_10 group">
    <h1 class="logo"><img src="images/logo_mirrey.png" /></h1>
    <div id="alert" class="grid_10">&nbsp;</div>
    <div id="mirrey-contestants">
      <div class="grid_5">
        <a href="#" class="vota-mirrey">
           <img src="http://graph.facebook.com/<?php echo $participants[0] ?>/picture?type=large" class="profile" 
             data-votado="<?php echo $participants[0] ?>" data-votante="<?php echo $me['id'] ?>"/>
         </a>
       </div>
       <div class="grid_5">
         <a href="#" class="vota-mirrey">
           <img src="http://graph.facebook.com/<?php echo $participants[1] ?>/picture?type=large" class="profile"
             data-votado="<?php echo $participants[1] ?>" data-votante="<?php echo $me['id'] ?>" />
         </a>
     </div>
    </div>
    <div class="prefix_5 grid_5 action-buttons">
      <img id="skip-mirrey" src="images/mas_mirreyes.png" />
      <img src="images/agregar_mirrey.png" id="add-mirrey" />
      <img src="images/top_mirrey.png" id="top-mirrey" />
    </div>
  </div>
<div style="display:none" id="friend-container">
    <div id="jfmfs-container"></div> 
</div>
<script src="http://connect.facebook.net/es_LA/all.js"></script> 
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.14/jquery-ui.min.js"></script>
<script src="js/resig.microtemplates.js" type="text/javascript"></script>
<script src="js/jquery.facebook.multifriend.select.js" type="text/javascript"></script>
<script src="js/app.js" type="text/javascript"></script>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-16452126-3']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</body>

</html>