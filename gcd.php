<html>
<body BGCOLOR="#00E0E0" link="#001fC0" vlink="#000080" text="#00000f">
<h1> The Numbers  </h1>
<?


$e = $_POST['e'];
$d = $_POST['d'];
$p = $_POST['p'];
$n = $_POST['n'];
$q = $_POST['q'];
$phi = $_POST['phi'];
$mprivate = $_POST['mprivate'];



//echo " gcd($e,$phi) == ";

$big_num = `echo "a=$e; b=$phi; while(b) {a=a%b; r=b; b=a; a=r;}; a;" | bc `;

printf(" <h2>  gcd($e,$phi) == %s </h2>",$big_num);

if ($big_num == 1) {
     printf("<h2>So these numbers are co-prime</h2><h2> the value for e is therefore acceptable </h2>\n");
     printf("<form enctype=\"multipart/form-data\" method=\"post\" action=\"generate_key.php#D\">");
}
else {
     printf("<h1>e is not coprime to M</h1><h1> go back and try another value for e</h1>\n");
     printf("<form enctype=\"multipart/form-data\" method=\"post\" action=\"generate_key.php#GCD\">");
}
     

?>

 
 <input type="hidden" name=p value=<? echo $p ?>>
 <input type="hidden" name=q value=<? echo $q ?>>
 <input type="hidden" name=phi value=<? echo $phi ?>>
 <input type="hidden" name=e value=<? echo $e ?>>
 <input type="hidden" name=n value=<? echo $n ?>>
 <input type="hidden" name=d value=<? echo $d ?>>
 <table>
 <tr><td><input type="submit" name="submit" value="Back"> </td></tr>
 </table>



 </body>
</html>
