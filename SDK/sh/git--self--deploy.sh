#!/bin/bash

date=`date '+%Y_%m_%d__%H_%M_%S'`;
git add .
git commit -m "DEPLOY TO PRODUCTION $date"
git push -u origin master