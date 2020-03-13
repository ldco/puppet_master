#!/bin/bash
for x in $*
do
sed -e "s/#ED1C24/#ccddee/g" $x > temp$x
mv temp$x $x
done