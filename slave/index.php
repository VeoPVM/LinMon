<?php
set_time_limit(0);

// Configuration
include 'config/default.php';
include 'config/config.php';

// Version Functions
include 'functions/checkVersion.class.php';
$version = new version();

// Debugging Functions
include 'functions/debug.class.php';
$debugging = new debugging();

// Stats Functions
include 'functions/loadAvg.php';
include 'functions/memory.php';
include 'functions/misc.php';
include 'functions/network.class.php';
$network = new network();
include 'functions/cpu.php';

// Database Functions
include 'functions/database.php';

// Profiling Functions
include 'functions/profiling.class.php';
$profile = new profile();

// LinMon Settings
define("SLAVEID", $config['id']);
define("DEBUG", $config['debug']);
define("LOG", $config['log']);
define("INTERVAL", $config['updateinterval']);
define("VERSION", $version->getVersion("version"));
define("CRON", $config['cron']);

// Database Settings
define("DBUSER", $config['dbuser']);
define("DBPASS", $config['dbpass']);
define("DBHOST", $config['dbhost']);
define("DBNAME", $config['dbname']);

echo "LinMon slave version " . VERSION . " started \n\n";

$version->checkVersion();

$debugging->collectionInterval(DEBUG, INTERVAL, LOG);

while (true) {
    $debugging->collectionInfoStart(DEBUG, LOG);

    $profile->startProfile();
	
	$connect = db_connect(DBHOST, DBUSER, DBPASS, DBNAME);

    $loadavg = collect_loadAvg(DEBUG, LOG);
    $memory = collect_memory(DEBUG, LOG);
    $kernel = collect_kernel(DEBUG, LOG);
    $hostname = collect_hostname(DEBUG, LOG);
    $uptime = collect_uptime(DEBUG, LOG);
    $users = collect_users(DEBUG, LOG);
    $network->collect_networkUsage(DEBUG, LOG);
	$cpu = collect_cpuUsage(DEBUG, LOG);

    db_insert($connect, SLAVEID, $loadavg, $memory, $kernel, $hostname, $uptime, $users, $network, $cpu, VERSION);
	
	$disconnect = db_close($connect);

    $profile->endProfile($profile, LOG);

    $debugging->collectionInfoEnd(DEBUG, LOG);
	
	if (CRON === TRUE) {
		die();
	}
	
    sleep(INTERVAL);
}
?>