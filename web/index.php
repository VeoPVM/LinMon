<?php
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
<link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.0/css/bootstrap-combined.min.css" rel="stylesheet">
<link href="//netdna.bootstrapcdn.com/font-awesome/3.0.2/css/font-awesome.css" rel="stylesheet">
<style>
body {
	background-color:;
}

/*Custom CSS*/
.page-title {
	background-color: #eeeeee;
	border-radius: 4px;
	border: 1px solid #CCCCCC;
	font-size: 22px;
	padding-left: 10px;	
	margin-top:0;
}

#sidebar.nav-tabs.nav-stacked li {
	margin-bottom: 5px;
}

#sidebar.nav-tabs.nav-stacked li a {
	border-radius:5px;
	color:#333;
	background-color:;
}

.module .module-header {
	position: relative;
	height: 40px;
	background: #eeeeee;
	border-top-left-radius: 4px;
	border-top-right-radius: 4px;
	border: 1px solid #CCCCCC;	
}

.module .module-header h3 {
	margin-left:10px;
	line-height:20px;
	font-size:18px;	
}

.module-table .module-content {
	padding: 0;
	
}

.module-table .module-content .table {
	margin:0;
	border-top-left-radius:0;
	border-top-right-radius:0;
}

td.memory .progress {
	margin-bottom:0;	
}

td.actions {
	width:70px;
}

td.status {
	width:45px;
}

/* NavBar Fixes for Responsive */
@media (min-width: 981px) {
    body {
      padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
    }
  }
</style>

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
<?php if ($_GET['p'] != "login") { 
	include('_includes/template/navbar.php');
}
?>


<div class="container">
  <div class="row">
  <?php 
  //Include sidebar
  include("_includes/template/sidebar.php");
  
  //Now include the actual page from the pages folder
  include("pages/".$page.".php");
  ?>
  </div>
</div>
<!-- /container --> 

<!-- Le javascript
    ================================================== --> 
<!-- Placed at the end of the document so the pages load faster --> 
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> 
<script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.0/js/bootstrap.min.js"></script>
</body>
</html>
