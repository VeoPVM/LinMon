Summary
======

LinMon is a server monitoring tool designed to be used on Linux (primarily debian based distros) coded in PHP.  The goal is to eventually have a tool that can be used to monitor the vital resources (CPU, RAM, HDD, Network, etc) of a cluster of Linux Servers.



The Plan
======

The plan is that LinMon will have two components:

Web Interface - This is where you will be able to view all of the collected statistics.  You will be able to add new users so that other SysAdmins can view the server statistics.

Slave Servers - Each server will need to run the slave software.  This will be available in two modes: Daemon (running all the time) and Cron.



Requirements
======

Linux based machine.  Although LinMon may work on Windows (due to PHPSysInfo being cross-platform), only Linux compatability is guaranteed

Apache (For web interface)

PHP

PHP Safe Mode Disabled

PHPSysInfo - A version will be included in this Git Repo to make installation easy, but you are also able to install your own version (not recommended).



Notes
======

This is an ongoing project, you are more than welcome to make suggestions or submit pull requests.

Please note that almost all testing of LinMon is being done on Ubuntu 10.04 and Ubuntu 12.04 machines.  In theory, everything should work fine on any Linux-based distro.

The project is currently in Super-Mega-Pre-Alpha.  I wouldn't use it in any production environment just yet.