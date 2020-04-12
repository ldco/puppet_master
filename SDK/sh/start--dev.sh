#!/bin/bash 
cd /mnt/sdb2/CURRENT_WORKING_DEV/f21app2020/root
#read -p "enter number of localhost: " localhostN
#gnome-terminal --tab -e "/bin/bash -c 'php -S localhost:800$localhostN'"
#chromium-browser http://localhost:800$localhostN;
#chromium-browser http://localhost:800$localhostN/SDK/index.php;

gnome-terminal --tab -e "/bin/bash -c 'php -S localhost:8000'"
chromium-browser http://localhost:8000;
chromium-browser http://localhost:8000/SDK/index.php;
