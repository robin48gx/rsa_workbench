<html>
<body BGCOLOR="#00E0E0" link="#001fC0" vlink="#000080" text="#00000f">
<h1> Generating PHI the secret Modulus  </h1>
<?

$big_num = `echo "($p-1)*($q-1)" | bc `;

printf("<p> <h2> Phi == %s </h2>",$big_num);
$phi = $big_num;
printf(" <h2> which is the result of (%s-1)*(%s-1) </h2> \n", $p,$q);
//
// of the number. To convert log x  = ln(x) / ln(a) 
//                              a
//

//$k = `./ln2 $phi`;

//printf("<h2> The large number here, as a rough guide ",strlen($big_num)-1);
//printf(" is capable of encrypting a %s bit length key </h2>",$k-1);
?>

 <h2> Note this is part of the secret key ! <h2>

 <form enctype="multipart/form-data" method="post"
    action="generate_key.php#GCD">

<input type="hidden" name=q value=<? echo $q ?>>
<input type="hidden" name=p value=<? echo $p ?>>
<input type="hidden" name=phi value=<? echo $phi ?>>
<input type="hidden" name=e value=<? echo $e ?>>
<input type="hidden" name=n value=<? echo $n ?>>

<table>
<tr>
  <td>
    <input type="submit" name="submit" value="Next"> 
  </td>
</tr>
</table>

</body>
</html>
