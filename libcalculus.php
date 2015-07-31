<?php

 /***************************************************
 * Calculus I Functions
 * 
 * @author      John Cuppi
 * @code        http://github.com/jcink/accounts
 * @license     http://unlicense.org/UNLICENSE
 * @version     0.5
 * @updated     12:38 PM Friday, July 31, 2015
 ***************************************************/

class calculus
{		 
	/**
	 * Parse Equation
	 * 
	 * Breaks an equation up using delimeters +, -, *
	 **/
	 	
	public function parse_equation($str) {
		
		$terms = array();
		$terms_and_delimiters = preg_split( "/(\+|\-|\*)/", $str, null, PREG_SPLIT_DELIM_CAPTURE);
		
		// Return an array of individual
		// terms with positive an negatives
		foreach($terms_and_delimiters as $key=>$val) {
			if($val != "+" && $val !="-" && $val != "*"){
				if(!empty($terms_and_delimiters[$key-1])) {
					$operator = $terms_and_delimiters[$key-1];
				} else {
					$operator = "+";
				}
				$terms[] = $operator . $val;
			}
		}
		
		return $terms;
	}

	/**
	 * Take derivative of a term
	 * 
	 * Breaks an equation up using delimeters +, -, *
	 **/
	 
	public function get_derivative($term) {

	// Rule: x^n = nx^(n-1)
	// Does this term have an exponent?
	if(preg_match("/\^/", $term)){
		
		// Then get the exponent and apply the rule
		$term_parsed = preg_split( "/(x|y)/", $term, null, PREG_SPLIT_DELIM_CAPTURE);
		$variables = $term_parsed[1];
		$exponent = str_replace("^", "", $term_parsed[2]);
				
		// Multiply by the exponent
		$multiplied = ((int)$term_parsed[0] * $exponent);
		$n_minus_one = $exponent - 1;
		
		if($multiplied > 0) $multiplied= "+".$multiplied;
		
		return $multiplied . "{$variables}" . "^{$n_minus_one}";
	}
	
	// Rule: dx[nx] = n
	if(preg_match("/(x)/", $term)){
		return intval($term);
	}

	// No rules matched? Then it's just an integer set it to 0
	return '';	
	}


}

	
?>