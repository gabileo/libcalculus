<?php

 /***************************************************
 * Calculus I Example
 * 
 * @author      John Cuppi
 * @code        http://github.com/jcink/accounts
 * @license     http://unlicense.org/UNLICENSE
 * @version     0.5
 * @updated     12:38 PM Friday, July 31, 2015
 ***************************************************/

require('libcalculus.php');

$calculus = new calculus();
 
$equation = "2x^2-5x^3-5x+19+74x^10";
	
foreach( $calculus->parse_equation($equation) as $term) {	
		echo $calculus->get_derivative($term);
}
   
?>
