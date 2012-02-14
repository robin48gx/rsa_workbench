#!/bin/bash

# Calculate large exponent
# $1 = c  $2 = d $3 = n
#
# calculate c^d%n
date=`date | sed 's\:\_\g' | sed 's\ \_\g'`
# create a bc script to calculate this.
# php5 is sopposed to have bc embedded...
#
cat calc_big_expon.bc > calc_big_expon.$$.$date.bc

echo "t($1,$2,$3)" >> calc_big_expon.$$.$date.bc
echo "r;"          >> calc_big_expon.$$.$date.bc
bc < calc_big_expon.$$.$date.bc | tail -1
rm -rf calc_big_expon.$$.$date.bc
