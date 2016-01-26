<html>
<body BGCOLOR="#00E0E0" link="#001fC0" vlink="#000080" text="#00000f">

<title> RSA Interactive Simulator : Key Generation </title>

<h1> RSA Interactive Simulator / Work Bench : Key Generation </h1>

<h3>
This RSA key generator, will lead you though making a key set.
You may at anytime enter your own values into the forms, or
use the ones calculated for you.
</h3>

<h3>
 Use the BACK button on your browser
at your peril !
</h3>

<p>
The first stage of RSA key generation is to choose two large
 prime numbers, 
p and q. 

A php utility to find prime numbers up to 
2 Billion (i.e. 2 000 000 000 ) is provided below. 

This is adequate for 56 bit RSA encryption simulations.
This script has a 30 second processing time 
limitation which will interrupt the program if a 
very large range is given. Best to play with this a little...
</p>

<p>
Pick some two of the prime numbers offered and cut and
paste them into the form for further use.
</p>

<p>
For full RSA simulations a <a href="bc.html"> bc </a>
 based prime number finder is provided as 
<a href="bc_primes.zip"> source code </a> 
and on-line <a href="bc_primes.php"> here </a>.
</p>

<?php

// for php5 must do this to catch all the variables...

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

 	

?>


<br> <br> <A name="PRIME">
<hr> 
<h2> FIND SUITABLE PRIMES </h2>
<hr> <br> <br>

 <form enctype="multipart/form-data" method="post"
    action="primes.php">


 <strong>Prime Number Finder</strong> 
<small>Taken (and modified slightly) from 
<a href="http://www.planet-source-code.com/vb/scripts/ShowCode.asp?txtCodeId=1273&lngWId=8"> Prime Number finder 2 </a></small>

   <table border=2>
  <tr>
  <td>
    <strong>Min</strong>
  </td>
  <td>
   <input type=text name="x" size=120 value="100" colspan=2>
  </td>
 </tr>

  <tr>
  <td>
    <strong>max</strong>
  </td>
  <td>
   <input type=text name="i" size=120 value="1000" colspan=2>
  </td>
 </tr>

 <input type="hidden" name=p value=<?php echo $p ?>>
 <input type="hidden" name=q value=<?php echo $q ?>>
 <input type="hidden" name=phi value=<?php echo $phi ?>>
 <input type="hidden" name=e value=<?php echo $e ?>>
 <input type="hidden" name=n value=<?php echo $n ?>>

 <tr><td><input type="submit" name="submit" value="Next"> </td></tr>
 </table>


</form> 
<br> <br><a name="MUL">
<hr>
<h2> FIND THE MODULUS OF THE PRIMES </h2>
<hr> 

These when multiplied together, 
should be as large as the encryption
key being used (for instance a 128 bit key has 
approx ln(2^128)/ln(10) == 39 decimal digits), note
that this has already exceeded the 52 bits of 
precision of <b> double precision </b> 
maths as defined by the 
<a href="http://www.freesoft.org/CIE/RFC/1832/10.htm"> IEEE </a>
<p>
Test your values of P and Q here 

 <form enctype="multipart/form-data" method="post"
    action="multiply.php">

 <strong>Multiply P and Q </strong> 

   <table border=2>
  <tr>
  <td>
    <strong>Min</strong>
  </td>
  <td>
   <input type=text name="p" size=120 value="<?php echo $p ?>" >
  </td>
 </tr>

  <tr>
  <td>
    <strong>max</strong>
  </td>
  <td>
   <input type=text name="q" size=120 value="<?php echo $q ?>" >
  </td>
 </tr>

<input type="hidden" name=phi value=<?php echo $phi ?>>
<input type="hidden" name=e value=<?php echo $e ?>>
<input type="hidden" name=n value=<?php echo $n ?>>
<input type="hidden" name=mprivate value=<?php echo $mprivate ?>>
 <tr><td><input type="submit" name="submit" value="Next"> </td></tr>
 </table>
</form>

</p>


<br> <br> <A NAME="PHI">
<hr>
<h2> FIND PHI</h2>
<hr> 


<p>
When you have chosen your two prime numbers.....we need to find <strong> phi == (p-1)(q-1) </strong>
</p>

  <form enctype="multipart/form-data" method="post"
    action="find_phi.php">

 <strong>RSA p and q</strong>

   <table border=2>
  <tr>
  <td>
    <strong>p</strong>
  </td>
  <td>
   <input type=text name="p" size=120 value="<?php echo $p ?>" >
  </td>
 </tr>

  <tr>
  <td>
    <strong>q</strong>
  </td>
  <td>
   <input type=text name="q" size=120 value="<?php echo $q ?>" >
  </td>
 </tr>
<input type="hidden" name=phi value=<?php echo $phi ?>>
<input type="hidden" name=e value=<?php echo $e ?>>
<input type="hidden" name=n value=<?php echo $n ?>>


 <tr><td><input type="submit" name="submit" value="Next"> </td></tr>
 </table>


 </table>
</form>

<br> <br> <A name="GCD">
<hr>
<h2> GREATEST COMMON DENOMINATOR </h2>
<hr>

<p>
We now need to find a small number 'e' which is co-prime to phi.
This number may therefore be any number you choose, (except 1, which would be unsafe cryptographically) as long as it is <b> co-prime to phi </b>.
This number forms the second part of your public key. 
Hints to <a href="hints_to_choosing_e.html"> choosing e </a>.
</p>
<p>
Note that this calls the gcd (greatest common denominator) function
which returns 1 when co-prime values are entered. 
</p>

  <form enctype="multipart/form-data" method="post"
    action="gcd.php">

 <strong>RSA e and phi </strong>

   <table border=2>
  <tr>
  <td>
    <strong>e</strong>
  </td>
  <td>
   <input type=text name="e" size=120 value="<?php echo $e ?>">
  </td>
 </tr>

  <tr>
  <td>
    <strong>phi</strong>
  </td>
  <td>
   <input type=text name="phi" size=120 value="<?php echo $phi ?>">
  </td>
 </tr>

<input type="hidden" name=p value=<?php echo $p ?>>
<input type="hidden" name=q value=<?php echo $q ?>>
<input type="hidden" name=n value=<?php echo $n ?>>

 <tr><td><input type="submit" name="submit" value="Next"> </td></tr>
 </table>
</form>

<br> <br>
<hr> 
<h2> FIND D </h2>
<hr> 
<p>
We now need to find a number 'd' so that <strong> d.e % phi == 1 </strong>
This number will be your private key.</p>
Enter a seed value for D or calculate it yourself.
If the number typed obeys  <strong> d.e % phi == 1 </strong>
it will be used, otherwise it will be used as a start seed value.
Leave blank to iterate to find lowest d value.
Note on the algorithm used are <a href="find_d.html"> here </a>
<A name="D">

  <form enctype="multipart/form-data" method="post"
    action="find_d.php">

 <strong>RSA find 'd'</strong>

   <table border=2>
  <tr>
  <td>
    <strong>d</strong>
  </td>
  <td>
   <input type=text name="d" size=120 value="<?php echo $d ?>" >
  </td>
 </tr>

  <tr>
  <td>
    <strong>phi</strong>
  </td>
  <td width>
   <input type=text name="phi" size=120 value="<?php echo $phi ?>">
  </td>
 </tr>
<input type="hidden" name=e value=<?php echo $e ?>>
<input type="hidden" name=p value=<?php echo $p ?>>
<input type="hidden" name=q value=<?php echo $q ?>>
<input type="hidden" name=n value=<?php echo $n ?>>
 <tr><td><input type="submit" name="submit" value="Next"> </td></tr>
 </table>


 </table>
</form>

<br> <br> <A name="KEYS">
<hr>
<h2> RSA KEYSET </h2>
<hr> 

<table>
<tr>
<td>
<table border=4>
 <tr>
   <td colspan=2>
     <strong> PUBLIC KEY </strong>
   </td>
 </tr>
 <tr>
   <td>
    MODULUS (n)
   </td>
   <td> 
     <?php echo $n ?>
   </td>
 </tr>
 <tr>
   <td>
     Public Key (e)
   </td>

   <td>
    <?php echo $e ?>
   </td>
 </tr>

</table>
</td>
<td>
<table border=4>
 <tr>
   <td colspan=2>
     <strong> PRIVATE KEY </strong>
   </td>
 </tr>
 <tr>
   <td>
    MODULUS (n)
   </td>
   <td> 
     <?php echo $n ?>
   </td>
 </tr>
 <tr>
   <td>
     Private Key (d)
   </td>

   <td>
    <?php echo $d ?>
   </td>
 </tr>

</table>
</td>
</tr>
</table>

<h3> 
Now we have an RSA key set, we can use these
to send encrypted data both ways. A user seeing the 
public key can encrypt using it, and the receiving party
de-crypts with the private key. Note that no other user
can de-crypt the message without knowing (or finding by brute force)
the private key.
</h3>

<table>
<tr>
<td>
<form enctype="multipart/form-data" method="post"
    action="encode_pub.php">


  <input type="hidden" name=phi value=<?php echo $phi ?>>
  <input type="hidden" name=d value=<?php echo $d ?>>
  <input type="hidden" name=e value=<?php echo $e ?>>
  <input type="hidden" name=p value=<?php echo $p ?>>
  <input type="hidden" name=q value=<?php echo $q ?>>
  <input type="hidden" name=n value=<?php echo $n ?>>
  <tr><td><input type="submit" name="submit" value="Encode Using Public Key"> </td></tr>
  </table>
  </form>
 </td>
<td>



<center> <a href="index.php" border=0> <img src="home.png" border=0> </a> </center>
<center>
<a href="javascript:history.back();"> 
<img src=back.png align=center border=0> </a>
</center>
</body>
</html>


