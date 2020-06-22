#!/bin/bash
cd sys/assets/videos/videos/ &&

#rename to temp
find -L . -type f -name *.mp4 -exec bash -c 'mv "$0" "${0%/*}/pmTMP_${0##*/}"' {} \; &&

#compress
find . -name *.mp4 -exec bash -c 'ffmpeg -i "$0" -c:v libx264 -b:v 1.5M -c:a aac -b:a 128k "${0%/*}/_${0##*/}"' {} \; &&

#delete tmp
find . -type f -name pmTMP_\* -exec rm {} \; &&

#rename back
find . -name *.mp4 -exec bash -c 'mv $0 ${0/\_pmTMP_/}' {} \; &&

#make webm

find . -name *.mp4 -exec bash -c 'ffmpeg -i $0 -c:v libvpx-vp9 -b:v 1M -c:a libopus -b:a 128k "${0%.mp4}".webm' {} \; &&


#rename to temp webm
find -L . -type f -name *.webm -exec bash -c 'mv "$0" "${0%/*}/pmTMP_${0##*/}"' {} \; &&

#scale down webm
find . -name *.webm -exec bash -c 'ffmpeg -i "$0" -c:v libvpx-vp9 -b:v 0.33M -c:a libopus -b:a 96k \
-filter:v scale=1280x720 "${0%/*}/_${0##*/}"'  {} \; &&

#delete tmp webm
find . -type f -name pmTMP_\* -exec rm {} \; &&

#rename back webm
find . -name *.webm -exec bash -c ' mv $0 ${0/\_pmTMP_/}' {} \; 

#scale down webm MOB

#ffmpeg -i $i -c:v libvpx-vp9 -b:v 0.33M -c:a libopus -b:a 96k \
#-filter:v scale=960x540 pmMobVideo_${name}.webm;







