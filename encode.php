<html>
<body BGCOLOR="#00E0E0" link="#001fC0" vlink="#000080" text="#00000f">
<h1> Encode integer 'm'  </h1>
<?php
$e = $_POST['e'];
$d = $_POST['d'];
$p = $_POST['p'];
$n = $_POST['n'];
$q = $_POST['q'];
$phi = $_POST['phi'];
$mprivate = $_POST['mprivate'];
$m = $_POST['m'];

echo "<h1> in encode.php m is $m</h1>";
echo "<h1> Computes the cipher text c = m^e mod n.</h1>";
echo "<h3> $m^$e%$n </h3>";
$digits = `./pow_digits $m $e`;
$gt100_k = `./gt100k $digits`;
echo "digits",$digits;
echo "<h3>m^e for this equation will produce a number with approx $digits digits</h3>";


if ( $gt100_k != 1 ) {
  $m_to_e = `echo " $m ^ $e " | bc | sed -f ./nlhtml.sed `;
  echo $m_to_e;
  echo " % $n <p>";
  echo "<h3> this gives the'public key encoded' cipher result </h3>";
  echo "</p>";
  $c = `echo " ( $m ^ $e ) % $n " | bc`;
  echo $c;
}
else { 
  echo "<h3> The number of digits produced by the exponentiation of m^e is greater than 100,0000 </h3>";
  echo "<h3> The resursive (see <a href=\"maths.html\"> recursive exponentiation break down </a>) ";
  echo "routines will be applied instead of direct implementation to calculate m^e%n </h3>";
  $c = `./cbe.sh 'A $m B $e C $n D'`; // php is very nasty about sending multiple args to scripts 
  echo "<h3> this gives the 'public key encoded' cipher result </h3>";
  echo $c;

}

  printf("<form enctype=\"multipart/form-data\" method=\"post\"
    action=\"encode_pub.php#DECODE\">");
?>

<input type="hidden" name=d value=<?php echo $d ?>>
<input type="hidden" name=q value=<?php echo $q ?>>
<input type="hidden" name=p value=<?php echo $p ?>>
<input type="hidden" name=phi value=<?php echo $phi ?>>
<input type="hidden" name=e value=<?php echo $e ?>>
<input type="hidden" name=n value=<?php echo $n ?>>
<input type="hidden" name=c value=<?php echo $c ?>>
<input type="hidden" name=m value=<?php echo $m ?>>
<table>
<tr>
  <td>
    <input type="submit" name="submit" value="Next"> 
  </td>
</tr>
</table>

</body>
</html>
