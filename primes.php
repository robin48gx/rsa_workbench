<html>
<body BGCOLOR="#00E0E0" link="#001fC0" vlink="#000080" text="#00000f">

 <?php
// Find Primes From $i to $x
$x = $_POST['i'];
$i = $_POST['x'];
$e = $_POST['e'];
$d = $_POST['d'];
$p = $_POST['p'];
$n = $_POST['n'];
$q = $_POST['q'];
$phi = $_POST['phi'];
$mprivate = $_POST['mprivate'];

//$_POST['i']
//$_POST['x']

//
//printf(" i is %d x is %d <br>",$i,$x);
//printf(" i is %d x is %d <br>",$i,$x);
//printf(" i is %d x is %d <br>",$i,$x);
//rintf(" i is %d x is %d <br>",$i,$x);

// if they put they parameters the wrong way round...

if ( $i > $x ) {
  $t = $i;
  $i = $x;
  $x = $t;
}


$max_search = 2000000001;

$counter = 0;
if ( $i < $max_search && $x < $max_search && $x > 0 && $i > 0 ) {
  for($i;$i<=$x;$i++) { 
    $f=sqrt($i);
    for($z=1;$z<=$f;$z++) { 
      $y=$i%$z;
      if($y==0)
	$l++;
      if($l>=2)
	break;
    }
    if ($l<=1){ 
      echo "$i ";
      $b++; 
    }
    $l=0;
  }
}
else {
  printf(" Parameter(s) with incorrect value. Use Values between 1 and %d",$max_search);
}


?> 

<h3> Choose the prime numbers to use and then Cut and paste into the form </h3>

<form enctype="multipart/form-data" method="post"
    action="generate_key.php#MUL">

 <input type="hidden" name=m value=<?php echo $m ?>>
 <input type="hidden" name=e value=<?php echo $e ?>>
 <input type="hidden" name=npublic value=<?php echo $npublic ?>>
 <input type="hidden" name=nprivate value=<?php echo $nprivate ?>>
<table>
<tr>
  <td>
    <strong>p</strong>
  </td>
  <td>
   <input type=text name="p" cols=80 value='<?php echo $p ?>' colspan=2>
  </td>
 </tr>

<tr>
  <td>
    <strong>q</strong>
  </td>
  <td>
   <input type=text name="q" cols=80 value='<?php echo $q ?>' colspan=2>
  </td>
 </tr>
 <tr><td><input type="submit" name="submit" value="Next"> </td></tr>
 </table>

</form>
</body>
</html>
