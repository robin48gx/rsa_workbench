#!/bin/bash

# Calculate large exponent

# php in 'safe mode' (god dag yx skaft)
# passes the parameters sent in one string
# turning off safe mode in the php.ini file
# does not seem to change this behaviour.

# to overcome this sed will extract the variables
#echo $1
#
c=`echo $1 | sed 's/.*A \([0-9]*\) B.*/\1/'`
d=`echo $1 | sed 's/.*B \([0-9]*\) C.*/\1/'`
n=`echo $1 | sed 's/.*C \([0-9]*\) D.*/\1/'`

args=`echo "<p> c " $c " d " $d " n " $n "</p>"`

#
# calculate c^d%n

date=`date | sed 's\:\_\g' | sed 's\ \_\g'`

#echo $date

# create a bc script to calculate this.
# php5 is sopposed to have bc embedded...
#
cat calc_big_expon.bc > calc_big_expon.$$.$date.bc

#echo " calc_big_expon.bc > calc_big_expon.$$.$date.bc ";

echo "r=1;"          >> calc_big_expon.$$.$date.bc
echo "t($c,$d,$n);" >> calc_big_expon.$$.$date.bc
echo "r;"          >> calc_big_expon.$$.$date.bc

#echo "invoking bc "
#more calc_big_expon.$$.$date.bc
#bc < calc_big_expon.$$.$date.bc 
#echo "bc invoked "

#ls -l  calc_big_expon.$$.$date.bc
result=`bc < calc_big_expon.$$.$date.bc | tail -1`
#echo $args $result
echo $result
rm -rf calc_big_expon.$$.$date.bc
