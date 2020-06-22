#!/bin/bash
cd sys/assets/images/images/ && find . -name *.png -exec bash -c 'convert "$0" -resize 1280\> "$0"' {} \; 


