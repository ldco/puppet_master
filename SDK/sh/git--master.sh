#!/bin/bash  
read -p "git commit: " commit

git add .
git commit -m "$commit"

git push -u origin master 
