<?php

/**
 * Custom wrapper for get_option. Silently doesn't return anything if option not found or is empty.
 */
function getOption($option, $key)
{
    $fields = get_option($option, true);

    if (isset($fields[$key]) && $fields[$key]) {
        return $fields[$key];
    }
}
