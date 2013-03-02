<?php
set_time_limit(0);

// Configuration
include 'config/config.php';

// Version Functions
include 'functions/getVersion.php';
include 'functions/checkVersion.php';

// Debugging Functions
include 'functions/debug.php';

// Stats Functions
include 'functions/loadAvg.php';
include 'functions/memory.php';
include 'functions/misc.php';

define("DEBUG", $config['debug']);
define("LOG", $config['log']);
define("INTERVAL", $config['updateinterval']);

echo "LinMon slave version ".getVersion("version")." started \n\n";
echo checkVersion();
debug_collectionInterval(DEBUG, INTERVAL, LOG);

while (true){
	debug_collectionInfoStart(DEBUG, LOG);
	
	collect_loadAvg(DEBUG, LOG);
    collect_memory(DEBUG, LOG);
    collect_kernel(DEBUG, LOG);
    collect_hostname(DEBUG, LOG);
    collect_uptime(DEBUG, LOG);
    
	
    debug_collectionInfoEnd(DEBUG, LOG);
	sleep(INTERVAL);
}
?>