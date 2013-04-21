<?php
function getNode() {
	
	$connect = db_connect(DBHOST, DBUSER, DBPASS, DBNAME);
	
	$getNode = $connect->prepare("SELECT `id`, `loadavg`, `memory` FROM `data` ORDER BY `time` DESC LIMIT 0,1");
	
	$getNode->execute();
	
	$getNode->bind_result($id, $loadavg, $memory);
	
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
		
		$memory_percent = round($memory[1] * 100 / $memory[0]);
		
		if ($memory_percent < 70) {
			$mem_progress = "progress-success";
		} else if ($memory_percent >= 71 && $memory_percent <= 85) {
			$mem_progress = "progress-warning"; 
		} else if ($memory_percent >= 86 && $memory_percent <=100) {
			$mem_progress = "progress-danger";	
		}
			
		
    	$output = "<tr id=\"".$id."\">";
        $output .= "<td>".$id."</td>";
        $output .= "<td class=\"memory\"><div class=\"progress progress-striped ".$mem_progress."\">";
        $output .= "<div class=\"bar\" style=\"width: ".$memory_percent."%;\">".$memory_percent."%</div>";
        $output .= "</div></td>";
        $output .= "<td>".$loadavg."</td>";
        $output .= "<td class=\"status\"><span class=\"label label-success\">Online</span></td>";
        $output .= "<td class=\"actions\"><a href=\"#\" class=\"btn btn-small btn-info toggle-row\"><i class=\"icon-plus\"></i></a> <a href=\"#\" class=\"btn btn-small btn-success\"><i class=\"icon-remove\"></i></a></td>";
        $output .= "</tr>";
		
		echo $output;
	}
}

?>