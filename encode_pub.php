<html>
<body BGCOLOR="#00E0E0" link="#001fC0" vlink="#000080" text="#00000f">

<title> RSA Interactive Simulator : Encoding data with the public Key </title>

<h1> RSA Interactive Simulator / Work Bench : Encoding data with the public Key </h1>

<?

If ( $n < 1 || $e < 1 || $d < 1 ) {

  printf("<h2> Error, you have got to this page without defining all of the RSA keys</h2>");
  printf("<h2> You must go back and generate a full RSA key </h2>");
  printf("<a href=\"generate_key.php\"><img src=\"create_rsa_key_set.png\" border=0></a>");

}
else {
?>

<h3> Here a user is encoding data to send to third party which
has published a public key. The user
takes the public key, and encodes the message. Only
the third party can decode the message, using its private key 
</h3>
 
<p>
The encoding is simply performed by taking the number to be encrypted
to the power of e, and then applying the modulus for n (i.e. p times q).
</p>

<A name="KEYS">

  <form enctype="multipart/form-data" method="post"
    action="encode.php">

 <strong>Encode Data using the following key set</strong>


 <table border=2>

  <tr>
  <td>
     <strong>Modulus (used by both public and private key) </strong>
  </td>
  <td>
   <input type=text name="n" size=120 value="<? echo $n ?>">
  </td>
 </tr>


 <tr>
  <td>
    <strong> e - the public key </strong>
  </td>
  <td width>
   <input type=text name="e" size=120 value="<? echo $e ?>">
  </td>
 </tr>

   <tr>
  <td>
    <strong> m - the number to encrypt </strong>
  </td>
  <td width>
   <input type=text name="m" size=120 value="<? echo $m ?>">
  </td>
 </tr>
<input type="hidden" name=d value=<? echo $d ?>>
<input type="hidden" name=p value=<? echo $p ?>>
<input type="hidden" name=q value=<? echo $q ?>>
<input type="hidden" name=phi value=<? echo $phi ?>>
 <tr><td><input type="submit" name="submit" value="Encode"> </td></tr>
 </table>


 </table>
</form>

<? if ( $m ) {  ?> 
					 
		     <br> <br>
		     <hr> 
		     <h2> DECODE : Decode with your secret key (n,d) </h2>
		     <A name="DECODE">
		     <hr> 
					 
		     <? $digits = `./pow_digits $c $d ` ?>
					 
		     <p>
		     The decoding process calculates the value of c ^ d % n.
		     </p>
		     <p> 
		     The value c ^ d <i> ( <? printf(" %s ^ %s ",$c,$d); ?> ) </i> 
		     in this case
		     would produce a number with approx 
		     <b> <? echo $digits ?> </b> decimal digits !
		     </p>
					 
		     <? $gt100k = `./gt100k $digits`; 
		     if ( $gt100k == 1  ) { ?>
		         <p>
			  Obviously this is unacceptable and would cause memory and processing time problems.
			  Mathematical techniques for algebraically breaking this problem into
								      smaller pieces, are described <a href="maths.html"> here </a>  
			 </p>
			 <p> Note that for this very large value, 
			     the bc script may take up to 
			     <? $mins_est = (($digits/1000000) * ($digits/1000000)) * 1.5;
                                printf("%2.2f",$mins_est); ?> 
						 minutes to finish this calculation.
                         </P>
		     <? } ?>
		     <br>
		     <form enctype="multipart/form-data" method="post"
		     action="decode.php">

		     <strong>De-code Data using the key set</strong>


		<p> Note that to encode with the private key, you may type a value in for 'c' and press decode. Cut and paste the 'in clear' value into the m of encode to verify correct reverse operation (de-coding with the private key ).
		</p>
		<p> The purpose of encoding with the private key is one of verifying identity (i.e. anyone can decode it using your published public key, but it is stamped with your RSA identity)</p>
		     <table border=2>

		     <tr>
		     <td>
		     <strong>Modulus (used by both public and private key) </strong>
		     </td>
		     <td>
		     <input type=text name="n" size=120 value="<? echo $n ?>">
		     </td>
		     </tr>


		     <tr>
		     <td>
		     <strong>d - the private key</strong>
		     </td>
		     <td>
		     <input type=text name="d" size=120 value="<? echo $d ?>" >
		     </td>
		     </tr>


		     <tr>
		     <td>
		     <strong> c - the number to de-crypt </strong>
		     </td>
		     <td width>
		     <input type=text name="c" size=120 value="<? echo $c ?>">
		     </td>
		     </tr>

				       

		     <input type="hidden" name=digits value=<? echo $digits ?>
		     <input type="hidden" name=m value=<? echo $m ?>>
		     <input type="hidden" name=e value=<? echo $e ?>>
		     <input type="hidden" name=phi value=<? echo $phi ?>>
		     <tr><td><input type="submit" name="submit" value="Decode"> </td></tr>
		     </table>

		     </form>

		     <? } // if to hide decode menu until a value has been coded
?>			

<form enctype="multipart/form-data" method="post"
action="generate_key.php">
<input type="hidden" name=digits value=<? echo $digits ?>
<input type="hidden" name=m value=<? echo $m ?>>
<input type="hidden" name=e value=<? echo $e ?>>
<input type="hidden" name=n value=<? echo $n ?>>
<input type="hidden" name=d value=<? echo $d ?>>
<input type="hidden" name=phi value=<? echo $phi ?>>
<input type="submit" name="submit" value="Back to Generate Key">
</form>

   <? } // all RSA key components defined
?>
<center> <a href="index.php" border=0> <img src="home.png" border=0> </a> </center>
</body>
</html>
