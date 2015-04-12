#!/bin/sh -x

rm -f -- app*.css *-min.css;

for X in *.css; do
    BASE=$(basename $X '.css');
    java -Xms64m -jar ~/bin/yuicompressor-2.4.8.jar $X -o ${BASE}-min.css;
done

pleeease compile $(ls *.css | grep -v -E '(ie|m|min).css')
