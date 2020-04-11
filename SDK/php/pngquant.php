<?php

exec('
cd sys/assets/images/images/ && find . -name "*.png" -exec pngquant --ext .png --force 256 {} \;', $output, $status);
