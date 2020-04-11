<?php

exec('
git add .
git commit -m "push before storing password"
git push -u origin master
git config --global credential.helper store
git pull', $output, $status);
