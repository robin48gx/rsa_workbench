<html>
<body BGCOLOR="#00E0E0" link="#001fC0" vlink="#000080" text="#00000f">
<h1> Find d, the private key  </h1>
<?php
$e = $_POST['e'];
$d = $_POST['d'];
$p = $_POST['p'];
$n = $_POST['n'];
$q = $_POST['q'];
$phi = $_POST['phi'];
$mprivate = $_POST['mprivate'];

printf("IN FIND D");

printf("<H1> PHI is %s</h1>",$phi);

//echo "debug n==$n";

$max_search = 10000;

// first find out whether the value typed in by the user
// satisfies the equation
$result = `./checkd $d $e $phi`;
echo " result of checkd $result";
$too_large=0;
printf("initial result %s <p>\n",$result);
if ( $result == "") { $result=0; $d=0; }

if ( $result == 1 ) {
  echo " <h3> value $d matches the <strong> de % phi == 1 </strong> criteria </h3>";   
  printf("<form enctype=\"multipart/form-data\" method=\"post\"
    action=\"generate_key.php#KEYS\">");
}



else {


  echo " Iterating with start seed d $d";
  for ($i=0; $i<$max_search; $i++) {
    $y = $d + $i;
    $result = `./searchd $y $phi $e `;
    $dd = `./findd $y $phi $e`;
    
    printf("Trying %s \n",$dd);
    if ( $result == 0 ) {
      // found one !
      $d = $dd;
      echo " matches criteria <p>";
      break;
    }
    else {
      echo " does not match  <strong> de % phi == 1 </strong> criteria <p>\n";
    }
    
  }

  if ( $i > $max_search || $too_large == 1) {
    echo "<h1>d not found, try another seed, and check e is co-prime to phi </h1>";
    printf("<form enctype=\"multipart/form-data\" method=\"post\"
    action=\"generate_key.php#D\">");

  } 
  else {
    echo "<h1> Acceptable value for 'd' found after $i iterations </h1>\n";
    printf("<form enctype=\"multipart/form-data\" method=\"post\"
    action=\"generate_key.php#KEYS\">");
  }

}
?>

<input type="hidden" name=d value=<?php echo $d ?>>
<input type="hidden" name=q value=<?php echo $q ?>>
<input type="hidden" name=p value=<?php echo $p ?>>
<input type="hidden" name=phi value=<?php echo $phi ?>>
<input type="hidden" name=e value=<?php echo $e ?>>
<input type="hidden" name=n value=<?php echo $n ?>>
<table>
<tr>
  <td>
    <input type="submit" name="submit" value="Next"> 
  </td>
</tr>
</table>

</body>
</html>
