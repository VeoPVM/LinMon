Summary
======

LinMon is a server monitoring tool designed to be used on Linux coded in PHP.  The goal is to eventually have a tool that can be used to monitor the vital resources (CPU, RAM, HDD, Network, etc) of a cluster of Linux Servers.



Components
======

There are two components to LinMon - the web interface, and the slave.  The web interface displays all of the collected statistics, while the slave collects the statistics.  The slave can either run as a daemon, or in cron mode.



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

Install the required packages.  On a debian based system (including ubuntu), it would look like this:
```apt-get -y install php5 php5-cli php5-mysql ifstat git-core```

Make a directory for LinMon.  The location of this doesn't really matter.
```cd /home ; mkdir LinMon ; cd LinMon```

Clone the repo into the LinMon folder
```git clone git://github.com/VeoPVM/LinMon.git .```

Alternatively you can use this command to get a specific branch (replace dev with the branch you want to clone)
```git clone -b dev git://github.com/VeoPVM/LinMon.git .```

Give the start script execute permissions
```cd slave/ ; chmod +x start.sh```

Start LinMon
```./start.sh start```


You will need to edit the config file before starting LinMon.  To keep LinMon up to date you can run this command when in the main LinMon folder:
```git pull```

Or this command if you want to pull the dev branch:
```git pull origin dev```



0.2 Changelog
======

- Improvement: Slave (is currently being) refactored to use object oriented code rather than procedural code.

- Bug Fix: The Slave will no longer crash if there is a database issue

- Bug Fix: Navbar now links to correct page

- New Feature (in progress): Monitor disk usage

- Improvement: Massively improved performance on the web interface for large databases



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