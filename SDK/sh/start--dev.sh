#!/bin/bash
read -p "enter number of localhost: " localhostN
gnome-terminal --tab -e "/bin/bash -c 'php -S localhost:800$localhostN'"
chromium http://localhost:800$localhostN;
chromium http://localhost:800$localhostN/SDK/index.php;


#fix for new system
#echo fs.inotify.max_user_watches=524288 | sudo tee -a /etc/sysctl.conf && sudo sysctl -p
