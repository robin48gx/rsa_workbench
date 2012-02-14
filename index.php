<html>
<body BGCOLOR="#00E0E0" link="#001fC0" vlink="#000080" text="#00000f">

<title> RSA Interactive Simulator </title>

<h1> RSA Interactive Simulator / Work Bench </h1>

<p>
This tutorial seeks not to specifically explain the RSA algorithm, 
but provides a web 
based tool to run though the algorithm step by step.

</p>
<p>
By doing this the very large numbers
used in 'real' RSA connections can be run though,
also simulations of bad RSA implementations
can be tried 
</p>
<p>
for instance:
<ul>
 <li> Small Prime Numbers to follow the algorithm through </li>
 <li> No co-prime public key/phi combinations (impossible to find 'd')</li>
 <li> Unsafe values for public key 'e' value (i.e. 1)</li>
 <li> Attemtping to encode numbers larger than the modulus</li>
 <li> Oversize values (>n) for d and e and subsequent effects </li>
 <li> Intermediate results seen (where practical) </li>
</ul>

</p>

<p>
It is easy to find thousands of <i> RSA explanations </i> on the Web,
(for instance google currently lists 195,000 for searching on
 <b> rsa algorithm </b> ) a list of a few useful
reviewed sites with guide notes is included
<a href="rsa_explanations_list.html"> here </a>.
</p>


 <p> 
This series of web pages has been written in PHP, running on a RedHat
Linux server with a moderately fast processor (1.4GHz athlon), principally 
to use the unix <a href="bc.html"> bc </a> utility 
to deal with the very large numbers used 
in the RSA encryption technique. 
Javascript with double precision floating point
provides for instance around 12 places of decimals. 
With <a href="bc.html"> bc </a>
the only practical limitation is server side processing time
and memory.
</p>


<p>
The first stage of RSA encryption is to 
<a href="generate_key.php"><img src="create_rsa_key_set.png" border=0></a>.
</p>

<p>
This key is used in the start up sequences of a secure connection, to pass
and encryption/or scambling key. This key is then used to encode 
the subsequent transmission.
</p>

<p>
When a key has been chosen, the 
 encryption  and decryption  processes can be simulated. 
The final decryption process
involves very large exponentiation. 
This was beyond the abilities of bc for practical
values. 
To allow bc scripts to process these very large 
numbers mathematical breakdowns 
of the equations, resulting in 
recursive routines was required. These are described
<a href="maths.html"> here </a>.

</p>
All the scripts and php source are available in a <a href="rsa_workbench.tar.gz"> gzipped tar file here</a>
A brief description of all files, PHP pages, HTML pages bc, sed and bash scripts used is <a href="files.html"> here </a> 

<br>
<br>
<hr>
<img SRC="red_bullet_half.gif">Last updated 12Apr2004 <img SRC="blu_bullet_half.gif"> R.P.Clark.
<hr>
</body>
</html>


