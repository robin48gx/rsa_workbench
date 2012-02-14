<html>
<body BGCOLOR="#00E0E0" link="#001fC0" vlink="#000080" text="#00000f">
<?
echo "arggggh why wont you call this script $m $e $n<p>";
echo `echo " a(1)*4" | bc -l `;
echo "A<p>";
$ccc = `./cbe.sh $m $e $n`; 
echo "B<p>";
echo $ccc;
$ln2 = `./ln2 5623765365325`;
echo "C<p>";
echo $ln2;
echo "D<p>";
// this is due to php safe mode. the paramters are passed as the first arg. God dag yxe skaft ! 
$ccc = system("./cbe.sh A$mB$eC$nD"); 
echo "E $ccc <p>";
$e = 1233;
$m = 177;
$n = 9999;
$ddd = system("./cbe.sh 'A $m B $e C $n D'"); 
echo "F $ddd <p>";

$dddd = `./cbe.sh 'A $m B $e C $n D'`; 
echo "G $dddd <p>";

?>
</body>
</html>
