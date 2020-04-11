
#!/bin/bash

#remove only assets folder

#

rsync -arvh --delete .htaccess DIST &&

rsync -arvh --delete index.php DIST &&

rsync -arvh --delete www/master.min.js www/master-l-prod.min.css www/master-d-prod.min.css www/master-l-prod.css.map www/master-d-prod.css.map dist/www &&

rsync -arvh --delete --exclude 'assets' sys/ dist/sys &&

rsync -arvh --delete admin/ dist/admin


