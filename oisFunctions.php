<?php
if(!defined('OIS_FUNCTIONS')) {

    define('OIS_FUNCTIONS', TRUE);

/**
 * Convert CamelCaseString, camelBackString, underscore_string, or slug-string to "Human String"
 *
 * @param  string $string
 * @return string "Human String"
 */
function oisToHuman($string) {

    oisCleanString($string);

    return ucwords(str_replace('_', ' ', oisToUnderscore($string)));
}

/**
 * Convert underscore_string or slug-string to CamelCaseString
 *
 * @param  string $string
 * @return string CamelCaseString
 */
function oisToCamelCase($string) {

    oisCleanString($string);

    return preg_replace('/(?:^|[_-])(.?)/e',"strtoupper('$1')",$string);
}

/**
 * Convert underscore_string or slug-string to camelBackString
 *
 * @param  string $string
 * @return string camelBackString
 */
function oisToCamelBack($string) {

    oisCleanString($string);

    return preg_replace('/[_-](.?)/e',"strtoupper('$1')",$string);
}

/**
 * Convert CamelCaseString, camelBackString, or slug-string to underscore-string
 *
 * @param  string $string
 * @return string underscore_string
 */
function oisToUnderscore($string) {

    oisCleanString($string);

    // Convert slug-string to underscore_string
    $string = str_replace('-', '_', $string);

    // Convert CamelCaseString or camelBackString to underscore-string
    return strtolower(preg_replace("/([^A-Z])([A-Z])/", "$1_$2", $string));
}

/**
 * Convert CamelCaseString, camelBackString, or underscore_string to slug-string
 *
 * @param  string $string
 * @return string slug-string
 */
function oisToSlug($string) {

    oisCleanString($string);

    // Convert underscore_string to slug-string
    $string = str_replace('_', '-', $string);

    // Convert CamelBackString or camelBackString to slug-string
    return strtolower(preg_replace("/([^A-Z])([A-Z])/", "$1-$2", $string));
}

/**
 * Strip non alphanumeric, "_" or "-" characters from string
 *
 * @param string $string
 */
function oisCleanString(&$string) {

    $string = preg_replace('/[^A-Za-z0-9_\-]/s', '', $string);
}

function oisAlphaNumeric($string) {

    return preg_match('/^[\p{Ll}\p{Lm}\p{Lo}\p{Lt}\p{Lu}\p{Nd}]+$/Du', $string);
}

function oisNotEmpty($string) {

    return preg_match('/[^\s]+/m', $string);
}

function oisPr($stuff) {

    echo '<pre>';
    print_r($stuff);
    echo '</pre>';
}
}