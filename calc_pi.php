<html>
<body BGCOLOR="#00E0E0" link="#001fC0" vlink="#000080" text="#00000f">
<h1> PI - calculated to required precision </h1>
<?php
$e = $_POST['e'];
$d = $_POST['d'];
$p = $_POST['p'];
$n = $_POST['n'];
$q = $_POST['q'];
$precision = $_POST['precision'];
$phi = $_POST['phi'];
$mprivate = $_POST['mprivate'];

if ( $precision < 1 ) { $precision = 100; }

$date = `date`;
printf("<p> Start Time == %s </p>\n",$date);
	$big_num = `echo 'scale=$precision; a(1)*4' | bc -l  | sed -f ./nlhtml.sed `;
	printf("<p> <h2> Pi is approximately </h2> %s ",$big_num);
printf(" <h2> which is the result of %d decimal places </h2> \n", $precision);

$date = `date`;
printf(" <p>End Time == %s </p>\n",$date);
?>


<p>

<center> 
<a href="index.php" border=0> <img src="home.png" border=0> </a> 
</center>


<center>
<a href="javascript:history.back();"> 
<img src=back.png align=center border=0> </a>
</center>
