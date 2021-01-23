<?php

$exec = shell_exec('
git add .
git commit -m "push before storing password"
git push -u origin master
git config --global credential.helper store
git pull');


if ($exec) {
    echo $exec;
} else {
    echo ("Matrix ERROR... :(");
}