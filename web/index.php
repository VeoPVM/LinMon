<?php
$start = microtime(true);

ini_set('display_errors',1); 
 error_reporting(E_ERROR | E_WARNING | E_PARSE);

// Configuration
include('_includes/config/config.php');

// Database Functions
include('_includes/functions/database.php');

//Getting Data
include('_includes/functions/getNode.php');

// Database Settings
define("DBUSER", $config['dbuser']);
define("DBPASS", $config['dbpass']);
define("DBHOST", $config['dbhost']);
define("DBNAME", $config['dbname']);

$connect = db_connect(DBHOST, DBUSER, DBPASS, DBNAME);

//Display correct page
if (!isset($_GET["p"])){ //See if page is set in URL
	$page = "dashboard";	//If not then set page to default page
} else {
	$page = $_GET["p"]; 	//If set then set page to requested
}

//Check file exists
if (!file_exists("pages/".$page.".php")){
	$page = "404";
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>LinMon</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">

<!-- Le styles -->
<link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/css/bootstrap-combined.min.css" rel="stylesheet">
<link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/css/bootstrap-combined.no-icons.min.css" rel="stylesheet">
<link href="_includes/css/custom.css" rel="stylesheet">

<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
    <![endif]-->

<!-- Fav and touch icons -->
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
<link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
<link rel="shortcut icon" href="../assets/ico/favicon.png">
</head>

<body>
<?php 
  if ($_GET['p'] != "login") { 
	  include('_includes/template/navbar.php');
  }
?>
<div class="container">
  <div class="row">
    <?php 
  
  
  //Now include the actual page from the pages folder
  
  include("pages/".$page.".php");
  ?>
  </div>
  
  <div class="row">
  <?php 
$end = microtime(true);
$end = round($end - $start, 2);
echo "<p align=\"center\">Page generated in ".$end." Seconds</p>";
?>
  </div>
</div>
<!-- /container --> 

<!-- Le javascript
    ================================================== --> 
<!-- Placed at the end of the document so the pages load faster --> 
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script>
<script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/js/bootstrap.min.js"></script>

<!-- Custom JS --> 
<script src="_includes/js/custom.js"></script>


</body>
</html>

