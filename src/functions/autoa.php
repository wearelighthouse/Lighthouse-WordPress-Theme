<?php

/**
 * Similar to a simplified wpautop(), but converts content split by newlines
 * into elements in an array, rather than <p>s in a string.
 */

function autoa($str)
{
  // Change multiple <br>s into two line breaks, which will turn into array items.
  $str = preg_replace( '|<br\s*/?>\s*<br\s*/?>|', "\n\n", $str );

  // Standardize newline characters to "\n".
  $str = str_replace( array( "\r\n", "\r" ), "\n", $str );

  // Remove more than two contiguous line breaks.
  $str = preg_replace( "/\n\n+/", "\n\n", $str );

  // Split up the contents into an array of strings, separated by double line breaks.
  return preg_split( '/\n\s*\n/', $str, -1, PREG_SPLIT_NO_EMPTY );
}