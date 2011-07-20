<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<title>Mirrey or not</title>

	<!--[if lte IE 9]><link rel="stylesheet" href="css/ie.css" type="text/css" media="screen" /><![endif]-->

	<link rel="stylesheet" href="css/960gs.css" type="text/css" media="screen" />
	
	<!-- Your styles -->
	<link rel="stylesheet" href="css/styles.css" type="text/css" media="screen" />

</head>


<body>
  <div class="container container_10">
    <h1 class="grid_10">¡Vota por tu Mirrey, papawh!</h1>
    <div class="grid_5">
      <img src="http://graph.facebook.com/702152773/picture?type=large" alt="" class="profile"/>
      <form>
      <input type="hidden" name="votado" value="702152773" />
      <pre><?php var_dump($me) ?></pre>
      <input type="hidden" name="votante" value="" />
      <input type="send" value="Pta, este, papawh" />
      </form>
    </div>
    <div class="grid_5">
      <img src="http://graph.facebook.com/1002101672/picture?type=large" alt="" class="profile"/>
      <form>
      <input type="hidden" name="votado" value="1002101672" />
      <input type="hidden" name="votante" value="<?php echo $me['uid'] ?>" />
      <input type="send" value="Wey este es de mejor familia" />
      </form>
    </div>
  </div>
</body>

</html>