#!/bin/sh -x

for X in *-min.js; do
  FULL=$(echo "$X" | sed -e 's/-min//')
  if [ -e "$FULL" ]; then
    rm -f -- "$X"
  fi
done

for X in *.js; do
  if [ "$(echo $X | grep -c 'min')" -le 0 ]; then
    BASE=$(basename $X '.js');
    java -Xms64m -jar ~/bin/yuicompressor-2.4.8.jar $X -o ${BASE}-min.js;
  fi
done
