<?php

/**
 * Add src query var so that we can tell if a user is coming from e.g. homepage 'see more' link
 */
function src_query_vars($qvars) {
  $qvars[] = 'src';
  return $qvars;
}
add_filter('query_vars', 'src_query_vars');
