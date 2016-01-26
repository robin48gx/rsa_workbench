#!/bin/bash

# Calculate large exponent

#echo "cbe.sh called BASH SCRIPT"

# php in 'safe mode' (god dag yx skaft)
# passes the parameters sent in one string
# turning off safe mode in the php.ini file
# does not seem to change this behaviour.

# to overcome this sed will extract the variables
#echo "argument 1:" $1
#
c=`echo $1 | sed 's/.*A \([0-9]*\) B.*/\1/'`
d=`echo $1 | sed 's/.*B \([0-9]*\) C.*/\1/'`
n=`echo $1 | sed 's/.*C \([0-9]*\) D.*/\1/'`

args=`echo "<p> c " $c " d " $d " n " $n "</p>"`

#
# calculate c^d%n

date=`date | sed 's\:\_\g' | sed 's\ \_\g'`

echo "date on this server"  $date

echo "<br><hr>"



#echo " calc_big_expon.bc > calc_big_expon.$$.$date.bc ";

echo "<br><hr>"
echo "created a custom bash script to run to decode using the secret key using residues"
echo "<br><hr>"
echo " custom bc script produced "
echo "<pre>"
cat calc_big_expon.bc 
echo "r=1;"        
echo "t($c,$d,$n);"
echo "r;"
echo "</pre>"


echo "<br><hr>"
Use the above bc script to decode the message.
echo "<br><hr>"
