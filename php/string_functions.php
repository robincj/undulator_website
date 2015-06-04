<?php
/**
 * Takes a string and uppercases the first characters of each word.
 * Like ucwords except this works on hyphenated names or names with apostrophes in.
 * Also handles Mc and Mac.
 * 
 * @param  string $text
 * @return string
 */
function ucname($text) {
	return preg_replace_callback ( "/(\w+)/", function ($m) {
		$part = strtolower ( $m [0] );
		if (preg_match ( "/^mc(.*)/", $part, $ending )) {
			return "Mc" . ucfirst ( $ending [1] );
		} elseif (preg_match ( "/^mac(.*)/", $part, $ending )) {
			return "Mac" . ucfirst ( $ending [1] );
		}
		return ucfirst ( $part );
	}, $text );
}
/**
 * Takes a string by reference and uppercases the first characters of each word.
 * Like ucwords except this works on hyphenated names or names with apostrophes in.
 * Also handles Mc and Mac.
 *
 * @param string (ref) $text        	
 * @return string
 */
function ucname_(&$text) {
	$text = ucname ( $text );
	return $text;
}