#!/bin/bash
rsync -avh --delete sys/assets/images/images_dev/ sys/assets/images/images && 
rsync -avh --delete sys/assets/icons/vector_dev/ sys/assets/icons/vector && 
rsync -avh --delete sys/assets/videos/videos_dev/ sys/assets/videos/videos && 

rsync -avh --delete core/assets/images/images_dev/ core/assets/images/images && 
rsync -avh --delete core/assets/icons/vector_dev/ core/assets/icons/vector && 
rsync -avh --delete core/assets/videos/videos_dev/ core/assets/videos/videos