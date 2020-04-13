<?php

exec('
git commit -am "push before storing password"
git push -u origin master
git config --global credential.helper store
git pull');
