LinMon
======

LinMon is a server monitoring tool designed to be used on Linux (primarily debian based distros) coded in PHP.  The goal is to eventually have a tool that can be used to monitor the vital resources (CPU, RAM, HDD, Network, etc) of a cluster of Linux Servers.



The Plan
======

The plan is that LinMon will have three components.

The main component is the master daemon - The master daemon will collect all of the stats from the slave daemons.  Currently the plan is that the master daemon will not also function as a slave, so both will need to be running if the master server is also going to be monitored.

The second component is the slave daemon.  The slave daemon will get the resource usage of the server it is installed on and then report back to the master daemon.

The final component is the web interface.  I am not sure how I will implement this yet, but the basic idea is that it will show all of the data acquired from the daemons in a way that is easy to read.



Requirements
======

Linux based machine.  Although LinMon may work on Windows (due to PHPSysInfo being cross-platform), only Linux compatability is guaranteed

Apache (For web interface)

PHP (For daemons)

PHP Safe Mode Disabled

PHPSysInfo - A version will be included in this Git Repo to make installation easy, but you are also able to install your own version (not recommended).



Notes
======

This is an ongoing project, you are more than welcome to make suggestions or submit pull requests.

Please note that almost all testing of LinMon is being done on Ubuntu 10.04 and Ubuntu 12.04 machines.  In theory, everything should work fine on any Linux-based distro.

The project is currently in Super-Mega-Pre-Alpha.  I wouldn't use it in any production environment just yet.