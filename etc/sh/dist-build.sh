
#!/bin/bash

rsync -arvh --delete .htaccess DIST &&

rsync -arvh --delete index.php DIST &&

rsync -arvh --delete www/master.min.js www/master-l-prod.min.css www/master-d-prod.min.css www/master-l-prod.css.map www/master-d-prod.css.map DIST/www &&

rsync -arvh --delete sys/Model/ DIST/Model &&
rsync -arvh --delete sys/View/ DIST/View &&
rsync -arvh --delete sys/Controller/ DIST/Controller &&
rsync -arvh --delete sys/helpers/ DIST/helpers &&
rsync -arvh --delete sys/modules/ DIST/modules &&
rsync -arvh --delete sys/Pages/ DIST/Pages &&
rsync -arvh --delete sys/SysInfo/ DIST/SysInfo &&
rsync -arvh --delete vendor/ DIST/vendor &&


rsync -arvh --delete --exclude 'videos/videos_dev' --exclude 'icons/vector_dev' --exclude 'images/images_dev' sys/assets/ DIST/assets &&

rsync -arvh --delete admin/ DIST/admin


