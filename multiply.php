

<html>
<body BGCOLOR="#00E0E0" link="#001fC0" vlink="#000080" text="#00000f">
<h1> Public Key 'Modulus' Generation </h1>
<?
$p = trim($p);
$q = trim($q);


$n = $big_num = `echo $p*$q | bc`;

$k = `./ln2 $n`;

printf("<p> <h2> the result is </h2> %s ",$big_num);
printf(" <h2> which is the result of %s * %s </h2> <h2> which forms part of the public key (n) </h2> \n", $p,$q);

printf("<h2> The large number here, as a rough guide ",strlen($big_num)-1);
printf(" is capable of encrypting a %s bit length key </h2>",$k-1);

?>

 <form enctype="multipart/form-data" method="post"
    action="generate_key.php#PHI">
 <input type="hidden" name=p value=<? echo $p ?>>
 <input type="hidden" name=q value=<? echo $q ?>>
 <input type="hidden" name=n value=<? echo $n ?>>
 <input type="hidden" name=e value=<? echo $e ?>>
 <table>
 <tr><td><input type="submit" name="submit" value="Back"> </td></tr>
 </table>


</body>
</html>
