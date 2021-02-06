#!/bin/bash
rm -rf dist/*
rsync -arvh --delete .htaccess dist &&
rsync -arvh --delete index.php dist &&
rsync -arvh --delete www/master.min.js www/master-l-prod.min.css www/master-d-prod.min.css www/master-l-prod.css.map www/master-d-prod.css.map dist/www &&
rsync -arvh --delete --exclude 'assets/videos/videos_dev' --exclude 'assets/icons/vector_dev' --exclude 'assets/images/images_dev' --exclude 'JS' --exclude 'sql'  --exclude 'styles' sys/ dist/sys &&



