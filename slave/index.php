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
include 'functions/loadAvg.class.php';
$loadavg = new loadAvg();
include 'functions/memory.class.php';
$memory = new memory();
include 'functions/misc.php';
include 'functions/network.class.php';
$network = new network();
include 'functions/cpu.class.php';
$cpu = new cpu();

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

$debugging->collectionInterval(INTERVAL);

while (true) {
    $debugging->collectionInfoStart();

    $profile->startProfile();
	
	$connect = db_connect(DBHOST, DBUSER, DBPASS, DBNAME);

    $loadavgstats = $loadavg->collect_loadAvg();
    $memoryusage = $memory->collect_memory();
    $kernel = collect_kernel();
    $hostname = collect_hostname();
    $uptime = collect_uptime();
    $users = collect_users();
    $networkusage = $network->collect_networkUsage();
	$cpuusage = $cpu->collect_cpuUsage();

    db_insert($connect, SLAVEID, $loadavgstats, $memoryusage, $kernel, $hostname, $uptime, $users, $networkusage, $cpuusage, VERSION);
	
	$disconnect = db_close($connect);

    $profile->endProfile($profile);

    $debugging->collectionInfoEnd();
	
	if (CRON === TRUE) {
		die();
	}
	
    sleep(INTERVAL);
}
?>