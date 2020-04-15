<?php

$exec = shell_exec('
git commit -am "push before storing password"
git push -u origin master
git config --global credential.helper store
git pull');


if ($exec) {
    echo $exec;
} else {
    echo ("matrix error...");
}
