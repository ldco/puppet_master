#!/bin/bash
cd sys/assets/images/images/ && find . -name '*.png' -type f -exec bash -c 'cwebp -z 9 "$0" -o "${0%.png}.webp"' {} \;
