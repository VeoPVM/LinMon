LinMon
======

LinMon is a server monitoring tool designed to be used on Linux (primarily debian based distros) coded in PHP.  The goal is to eventually have a tool that can be used to monitor the vital resources (CPU, RAM, HDD, Network, etc) of a cluster of Linux Servers.



The Plan
======

The plan is that LinMon will have three components.

The main component is the master daemon - The master daemon will collect all of the stats from the slave daemons.  Currently the plan is that the master daemon will not also function as a slave, so both will need to be running if the master server is also going to be monitored.

The second component is the slave daemon.  The slave daemon will get the resource usage of the server it is installed on and then report back to the master daemon.

The final component is the web interface.  I am not sure how I will implement this yet, but the basic idea is that it will show all of the data acquired from the daemons in a way that is easy to read.