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
		
	  $getNode = $connect->prepare("SELECT `id`, `time`, `loadavg`, `memory`, `network`,`cpu` FROM `data` WHERE `id` = '".$nodes[$i][0]."' ORDER BY `time` DESC LIMIT 0,1");
	  
	  $getNode->execute();
	  
	  $getNode->bind_result($id, $time, $loadavg, $memory ,$network ,$cpu);
	  
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
		  $memory_use = round(($memory[0] - $memory[1] - $memory[2] - $memory[3]) / $memory[0] * 100);
		  
		  $time = intval($time);
		  
		  if (time() - $time > $config['timeout']) {
			  $status = "<span class=\"label label-important\">Offline</span>";
		  } else {
			  $status = "<span class=\"label label-success\">Online</span>";
		  }
		  
		  $cpu = explode(",", $cpu);
		  $network = explode(",", $network);
		  $network = $network[0]."KBytes/s DL, ".$network[1]." KBytes/s UL";
		  
		  $output = "<tr id=\"".$id."\">";
		  $output .= "<td>".$id."</td>";
		  $output .= "<td class=\"memory\"><div class=\"progress active\">";
		  $output .= "<div class=\"bar bar-danger bar-tooltip\" style=\"width: 0%\" data-percentage=\"".$memory_use."%\" data-toggle=\"tooltip\" title=\"Memory Use\" \">".$memory_use."%</div>";
		  $output .= "</div></td>";
		  $output .= "<td>".$loadavg."</td>";
		  $output .= "<td>".$cpu[0]."</td>";
		  if ($config['wacpu']) { $output .= "<td>".$cpu[1]."</td>";} 
		  $output .= "<td>".$network."</td>";
		  $output .= "<td>".$version."</td>";
		  $output .= "<td class=\"status\">".$status."</td>";
		  if ($config['delete']) { $output .= "<td class=\"actions\"><a href=\"#\" class=\"btn btn-small \"><i class=\"icon-remove\"></i></a></div></td>"; }
		  
		  
		  $output .= "</tr>";
		  
		  echo $output;
	  }
	  
	}
}

?>