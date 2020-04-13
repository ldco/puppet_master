#!/bin/bash

date=`date '+%Y_%m_%d %H:%M:%S'`;
git add .
git commit -m "DEPLOY TO PRODUCTION $date"
git push -u origin master