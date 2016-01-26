<html>
<body BGCOLOR="#00E0E0" link="#001fC0" vlink="#000080" text="#00000f">
<h1> Encode integer 'm'  </h1>
<?php

$c = $_POST['c'];
$m = $_POST['m'];
$e = $_POST['e'];
$e = $_POST['e'];
$d = $_POST['d'];
$p = $_POST['p'];
$n = $_POST['n'];
$q = $_POST['q'];
$phi = $_POST['phi'];
$mprivate = $_POST['mprivate'];


echo "<h1> Decodes the ciphered integer using the secret 'd' key :  m = c^d mod n. </h1>\n";

//echo "d == $d <p>";
//echo "c == $c <p>";
//echo "digits = $digits<p>";
//echo "\n\n\n\n\n";
//$gt100k = `./gt100k $digits`;
//if ($gt100k != 1) 
     //echo "<h3>c^d == </h3>";


// check here that the exponentiation can actually be displayed
// and use the recursive algorithms if it cannot
// along with a warning about the length of time it could take.
$digits = `./pow_digits $c $d `;
$gt100_k = `./gt100k $digits`;
//echo "./gt100k $digits";
//echo " gt100_k == $gt100_k";

$date = `date`;
printf("<p> Start Time == %s </p>\n",$date);
if ($gt100_k != 1) {
  echo " <h3> The predicted number of digits from the exponentiation is less than 100,000. </h3></h3>It can therefore be shown in full </h3><p>";
  $c_to_d = `echo " $c ^ $d " | bc | sed -f ./nlhtml.sed `;
  echo $c_to_d;
  `echo " $c ^ $d " | bc | sed -f ./nlhtml.sed `;
  echo " % $n <p>";
  echo "<h3> this gives the 'in clear' result </h3>";
  $clear = `echo " ( $c ^ $d ) % $n " | bc | sed -f ./nlhtml.sed `;
  echo $clear;
}
else {
  echo "<h3> The number of digits produced by the exponentiation of c^d is greater than 100,000 </h3>";

  echo "<h3> The resursive (see <a href=\"maths.html\"> recursive exponentiation break down </a>) routines will be applied instead to calculate c^d%n </h3>";
  $clear = `./cbe.sh 'A $c B $d C $n D'`; // php is very nasty about sending multiple args to scripts 

  echo $clear;
  echo "<h3> The resursive routines can take some time to run, too long to leave a web page waitng! </h3>";
  echo "<h3> If you don't have `bc' on your system, grow up and get a proper operating system. </h3>";
}
$me = `whoami`;
$date = `date`;
printf("<p> End Time == %s me=%s</p> \n",$date,$me);
printf("<form enctype=\"multipart/form-data\" method=\"post\"
    action=\"encode_pub.php#KEYS\">");
?>

<input type="hidden" name=d value=<?php echo $d ?>>
<input type="hidden" name=q value=<?php  echo $q ?>>
<input type="hidden" name=p value=<?php  echo $p ?>>
<input type="hidden" name=phi value=<?php  echo $phi ?>>
<input type="hidden" name=e value=<?php  echo $e ?>>
<input type="hidden" name=n value=<?php  echo $n ?>>
<input type="hidden" name=c value=<?php  echo $c ?>>
<input type="hidden" name=m value=<?php  echo $m ?>>
<input type="hidden" name=digits value=<?php  echo $digits ?>>
<table>
<tr>
  <td>
    <input type="submit" name="submit" value="Next"> 
  </td>
</tr>
</table>

</body>
</html>
