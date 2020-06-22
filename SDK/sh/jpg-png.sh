
#!/bin/bash
cd sys/assets/images/images_dev/ && find . -name "*.jpg" -print0|xargs -I{} -0 mogrify -format png {} &&
find . -name "*.jpeg" -print0|xargs -I{} -0 mogrify -format png {} && find . -type f -name "*.jpg" -delete && find . -type f -name "*.jpeg" -delete