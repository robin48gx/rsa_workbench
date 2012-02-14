<html>
<body BGCOLOR="#00E0E0" link="#001fC0" vlink="#000080" text="#00000f">
<title> Pi to an arbitary precision </title>

<h1> Pi to an arbitary precision </h1>

Pi can be calculated by taking the arctangent of one
radian and multiplying it by four. 
<p>
This php page 
will pass the required precision to a bc script, and calculate
pi to as many places as you like.More than 10,000 places
may require a bit of a wait though....
<p>

  <form enctype="multipart/form-data" method="post"
    action="calc_pi.php">

 <strong>Calculate pi on the fly</strong>

   <table border=2>
  <tr>
  <td>
    <strong>required precision</strong>
  </td>
  <td>
   <input type=text name="precision" cols=80 value="" colspan=2>
  </td>
 </tr>

 <tr><td><input type="submit" name="submit" value="Next"> </td></tr>
 </table>


 </table>


<input type="hidden" name=luid value=<? echo $luid ?>>
</form>

<center>
<a href="javascript:history.back();"> 
<img src=back.png align=center border=0> </a>
</center>

</body>
</html>


