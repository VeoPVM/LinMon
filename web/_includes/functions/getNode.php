<?php
function getNode() {

	include('_includes/config/config.php');
	
	$connect = db_connect(DBHOST, DBUSER, DBPASS, DBNAME);
	
	$getDistinctNodes = $connect->query("SELECT DISTINCT(id) FROM `data`");
	
	$nodes = array();
	while($node = $getDistinctNodes->fetch_array()){
	   $nodes[] = $node;
	}
		
	
	for ($i = 0; $i <= ($getDistinctNodes->num_rows - 1); $i++) {	
		
	  $getNode = $connect->prepare("SELECT `id`, `time`, `loadavg`, `memory` FROM `data` WHERE `id` = '".$nodes[$i][0]."' ORDER BY `time` DESC LIMIT 0,1");
	  
	  $getNode->execute();
	  
	  $getNode->bind_result($id, $time, $loadavg, $memory);
	  
	  if ($getNode->error) {
		  try {    
			  throw new Exception("MySQL error $mysqli->error <br> Query:<br> $query", $msqli->errno);    
		  } catch(Exception $e ) {
			  echo "Error No: ".$e->getCode(). " - ". $e->getMessage() . "<br >";
			  echo nl2br($e->getTraceAsString());
		  }
	  }
  
	  
	  while($getNode->fetch()){
		  $memory = explode(",", $memory);
		  $memory_use = round(100 * (($memory[0] - $memory[1]) / $memory[0]));
		  
		  $time = intval($time);
		  
		  if (time() - $time > $config['timeout']) {
			  $status = "<span class=\"label label-important\">Offline</span>";
		  } else {
			  $status = "<span class=\"label label-success\">Online</span>";
		  }
		  
		  $output = "<tr id=\"".$id."\">";
		  $output .= "<td>".$id."</td>";
		  $output .= "<td class=\"memory\"><div class=\"progress\">";
		  $output .= "<div class=\"bar bar-danger bar-tooltip\" style=\"width: \"0%\" data-toggle=\"tooltip\" title=\"Memory Use\" data-percentage=\"".$memory_use."\">".$memory_use."%</div>";
		  $output .= "</div></td>";
		  $output .= "<td>".$loadavg."</td>";
		  if ($config['wacpu']) { $output .= "<td></td>";} 
			
		  $output .= "<td class=\"status\">".$status."</td>";
		  $output .= "<td class=\"actions\"><div class=\"btn-group\"><a href=\"#\" class=\"btn btn-small  toggle-row\"><i class=\"icon-plus\"></i></a> <a href=\"#\" class=\"btn btn-small \"><i class=\"icon-remove\"></i></a></div></td>";
		  $output .= "</tr>";
		  
		  echo $output;
	  }
	  
	}
}

?>