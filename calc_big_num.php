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

echo " p  $p  q  $q";
$big_num = `echo $p^$q | bc | sed -f /var/www/html/rsa/nlhtml.sed `;
//$big_num = `echo $p^$q | bc | sed -f /home/robin/scripts/nlhtml.sed `;
//$big_num = `echo $p^$q | bc`;

printf("<p> <h2> the big number </h2> %s ",$big_num);
printf(" <h2> which is the result of %s^%s </h2> \n", $p,$q);
?>
<p>
<a href="javascript:history.back();"> <img src=back.gif align=center border=0> </a>
</p>
</body>
</html>
