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
include 'functions/network.php';
include 'functions/cpu.php';

// Database Functions
include 'functions/database.php';

// Profiling Functions
include 'functions/profiling.php';

// LinMon Settings
define("SLAVEID", $config['id']);
define("DEBUG", $config['debug']);
define("LOG", $config['log']);
define("INTERVAL", $config['updateinterval']);

// Database Settings
define("DBUSER", $config['dbuser']);
define("DBPASS", $config['dbpass']);
define("DBHOST", $config['dbhost']);
define("DBNAME", $config['dbname']);

$connect = db_connect(DBHOST, DBUSER, DBPASS, DBNAME);

echo "LinMon slave version " . getVersion("version") . " started \n\n";
echo checkVersion();
debug_collectionInterval(DEBUG, INTERVAL, LOG);

while (true) {
    debug_collectionInfoStart(DEBUG, LOG);

    $profile = profile_Start();

    $loadavg = collect_loadAvg(DEBUG, LOG);
    $memory = collect_memory(DEBUG, LOG);
    $kernel = collect_kernel(DEBUG, LOG);
    $hostname = collect_hostname(DEBUG, LOG);
    $uptime = collect_uptime(DEBUG, LOG);
    $users = collect_users(DEBUG, LOG);
    $network = collect_networkUsage(DEBUG, LOG);
	$cpu = collect_cpuUsage(DEBUG, LOG);

    db_insert($connect, SLAVEID, $loadavg, $memory, $kernel, $hostname, $uptime, $users, $network);

    profile_End($profile, LOG);

    debug_collectionInfoEnd(DEBUG, LOG);
    sleep(INTERVAL);
}
?>