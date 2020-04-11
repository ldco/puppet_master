#!/bin/bash 
read -p "enter number of localhost: " localhostN
gnome-terminal --tab -e "/bin/bash -c 'php -S localhost:800$localhostN'"
chromium-browser http://localhost:800$localhostN;
