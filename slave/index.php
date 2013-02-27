<?php
set_time_limit(0);

// Configuration
include 'config/config.php';

// Version Functions
include 'functions/getVersion.php';
include 'functions/checkVersion.php';

// Debugging Functions
include 'functions/debug.php';

echo "LinMon slave version ".getVersion("version")." started \n\n";
echo checkVersion();
debug_collctionInterval($config['debug'], $config['updateinterval']);

while (true){
	debug_collectionInfoStart($config['debug']);
	sleep($config['updateinterval']);
}
?>