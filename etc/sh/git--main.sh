#!/bin/bash  
read -p "git commit: " com

git add .
git commit -m "$com"

git push -u origin master 
