#!/bin/bash

if [ $1 == "start" ] ; then
	echo -e "\033[01;31mLinMon started.  Press enter to continue\033[00;00m"
	nohup php index.php &
	procid=$!
	echo "$procid" > linmon.pid
fi

if [ $1 == "stop" ] ; then
	pid=( $(<linmon.pid) )
	kill $pid
	echo "LinMon stopped."
fi