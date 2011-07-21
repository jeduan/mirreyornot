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
  <div id="fb-root" data-appid="<?php echo $app_id ?>"></div> 
  <div class="container container_10">
    <h1 class="grid_10">¡Vota por tu Mirrey, papawhhh!</h1>
    <div class="grid_5">
      <a href="#" class="vota-mirrey">
        <img src="http://graph.facebook.com/<?php echo $participants[0] ?>/picture?type=large" alt="" class="profile" 
          data-votado="<?php echo $participants[0] ?>" data-votante="<?php echo $me['id'] ?>"/>
      </a>
    </div>
    <div class="grid_5">
      <a href="#" class="vota-mirrey">
        <img src="http://graph.facebook.com/<?php echo $participants[1] ?>/picture?type=large" alt="" class="profile"
          data-votado="<?php echo $participants[1] ?>" data-votante="<?php echo $me['id'] ?>" />
      </a>
    </div>
    <div class="grid_10">
    <button id="open-jfmfs">Pta conozco un wee…</button>
    </div>
    <div style="display:none" id="friend-container">
        <div id="jfmfs-container"></div> 
    </div>
  </div>
<script src="http://connect.facebook.net/es_LA/all.js"></script> 
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.14/jquery-ui.min.js"></script>
<script src="js/jquery.facebook.multifriend.select.js" type="text/javascript"></script>
<script src="js/app.js" type="text/javascript"></script>
</body>

</html>