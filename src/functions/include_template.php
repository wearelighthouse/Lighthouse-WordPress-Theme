<?php

/**
 * Shorthand for include(locate_template('...'))
 * - Used to load in PHP files in the current scope (sharing variables)
 */
function includeTemplate($filename)
{
  return include(locate_template($filename));
}
