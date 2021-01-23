<?php

$exec = shell_exec('
cd sys/assets/images/images/ && find . -name "*.png" -exec pngquant --ext .png --force 256 {} \;');

if ($exec) {
    echo $exec;
} else {
    echo ("Matrix ERROR... :(");
}