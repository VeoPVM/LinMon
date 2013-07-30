Summary
======

LinMon is a server monitoring tool designed to be used on Linux coded in PHP.  The goal is to eventually have a tool that can be used to monitor the vital resources (CPU, RAM, HDD, Network, etc) of a cluster of Linux Servers.



The Plan
======

The plan is that LinMon will have two components:

Web Interface - This is where you will be able to view all of the collected statistics.  You will be able to add new users so that other SysAdmins can view the server statistics.

Slave Servers - Each server will need to run the slave software.  This will be available in two modes: Daemon (running all the time) and Cron (which you can run as often as you like).



Current Release 0.1 Plan
======

The plan for 0.1 is to get a stable release out that is usable and useful.  After 0.1, we will add more features, and do a ton of code re-factoring.  We also intend to make LinMon fully object oriented in future releases.



Web Requirements
======

Apache

PHP



Slave Requirements
======

Linux based machine.

PHP

PHP Safe Mode Disabled

ifstat

Git

vmstat



Web Installation
======

Depending on the web server that you are installing LinMon on, you can install it different ways.  If you are running the slave on the web server as well, you could clone the whole repo and then set up a symbolic link to your web directory.  Here is an example of this:

Make a directory for LinMon.  The location of this doesn't really matter.
```cd /home ; mkdir LinMon ; cd LinMon```

Clone the repo into the LinMon folder
```git clone git://github.com/VeoPVM/LinMon.git .```

Set up the symbolic link to the web server folder
```ln -s /home/LinMon/web/ /var/www/LinMon```


You should then be able to access the LinMon web interface via the webserver.
To keep LinMon up to date, you can run this command:
```git pull```


You can also follow these steps even if you aren't running a slave on the webserver.  Installing the web interface on a shared host is also easy, just upload the folder via FTP.  It is a little bit of extra work to update the files manually via FTP, but you shouldn't encounter any issues.




Slave Installation
======

Setting up the slave is very similar to setting up the web interface.

Make a directory for LinMon.  The location of this doesn't really matter.
```cd /home ; mkdir LinMon ; cd LinMon```

Clone the repo into the LinMon folder
```git clone git://github.com/VeoPVM/LinMon.git .```

Alternatively you can use this command to get a specific branch (replace 0.1 with the branch you want to clone)
```git clone -b 0.1 git://github.com/VeoPVM/LinMon.git .```

Give the start script execute permissions
```cd slave/ ; chmod +x start.sh```

Start LinMon
```./start.sh start```


You will need to edit the config file before starting LinMon.  To keep LinMon up to date you can run this command when in the main LinMon folder:
```git pull```



0.1 Todo
======

Version Reporting

Disk Usage Reporting

Ability to load config file from a server



Known Issues
======

LinMon is known not to work with the Cloudflare Javascript (JS) optimizations.  You should either disable this in your Cloudflare control panel or serve LinMon through a Cloudflare-disabled subdomain.  In addition, LinMon is also known not to work with the Cloudflare "Rocket Loader" feature.  You should disable this feature or serve LinMon through a Cloudflare-disabled subdomain. 



Notes
======

This is an ongoing project, you are more than welcome to make suggestions or submit pull requests.

Please note that almost all testing of LinMon is being done on Debian or Ubuntu.  Installation instructions may vary with different operating systems.  In theory, everything should work fine on any Linux-based distro.

The project is currently in Beta.  You should be safe to use it in production as soon as 0.1 stable goes live.



License
======

This project uses the MIT license.  See the LICENSE file for details.