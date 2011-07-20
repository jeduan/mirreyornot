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
  <div id="fb-root" data-appid="<?php echo $app_id ?>"></div> 
  <script src="http://connect.facebook.net/es_LA/all.js"></script> 
  <div class="container container_10">
    <h1 class="grid_10">¡Vota por tu Mirrey, papawh!</h1>
    <div class="grid_10">
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