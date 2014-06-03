<?php

	// + 	: one or more
	// * 	: zero or more
	// ? 	: zero or one
	// $	: end of a line
	// ^	: start of a line 
	// i 	: case-insensitive
	// {n} 	: find exactly n
	// {m,n}: find min m or max n
	// m	: multiple lines
	// \z 	: end of the string when m is enable
	// \A	: start of string when m is enable
	// i	: match any single character: c.t matchs cat but not cart
	// \s	: match any whitespace
	// \S	: match any non-whitespace
	// \b	: word boundary: /oo\b/ matchs boo,foo but not boob or fool
	// \B	: except word boundary: /oo\B/ matchs boob, fool, but not boo or foo

	// returns true if the string starts with "This" 
	if(preg_match("/\AThis/m","This test\nThas is a example"))
	print "One match\n";

	// returns true if the string starts with "This in every line!" 
	if(preg_match("/^This/","This test\nThis is a example"))
	print "One match 2\n";
 
 
	if(preg_match("/php/i","PHP"))
		print "Got match!\n";

	if(preg_match("/(Linux|Mac)/i",exec("uname")))
		print "Another Match\n";
	
	$a = "Foo moo boo tool foo!]\nmoo moo MOOoO Akoo Foo !";
	preg_match_all("/[A-Za-z]oo\b/i",$a,$matches);
	var_dump($matches);

?>

