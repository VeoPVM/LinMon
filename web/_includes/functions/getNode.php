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
		
		$memory_use = round(100 * ((($memory[0] - $memory[1] + $memory[2] + $memory[3]) - $memory[0]) / $memory[0]));
		
		$memory_cache = round(100 * (($memory[2] + $memory[3]) / $memory[0]));
		
		
    	$output = "<tr id=\"".$id."\">";
        $output .= "<td>".$id."</td>";
        $output .= "<td class=\"memory\"><div class=\"progress\">";
        $output .= "<div class=\"bar bar-danger bar-tooltip\" style=\"width: \"0%\" data-toggle=\"tooltip\" title=\"Memory Use\" data-percentage=\"".$memory_use."\">".$memory_use."%</div>";
		$output .= "<div class=\"bar bar-success bar-tooltip\" style=\"width: \"0%\" data-toggle=\"tooltip\" title=\"Cache\" data-percentage=\"".$memory_cache."\">".$memory_cache."%</div>";
        $output .= "</div></td>";
        $output .= "<td>".$loadavg."</td>";
        $output .= "<td class=\"status\"><span class=\"label label-success\">Online</span></td>";
        $output .= "<td class=\"actions\"><a href=\"#\" class=\"btn btn-small btn-info toggle-row\"><i class=\"icon-plus\"></i></a> <a href=\"#\" class=\"btn btn-small btn-success\"><i class=\"icon-remove\"></i></a></td>";
        $output .= "</tr>";
		
		echo $output;
	}
}

?>