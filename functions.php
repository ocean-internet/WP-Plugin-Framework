<?php
namespace OIS;

/**
 * Convert CamelCaseString, camelBackString, underscore_string, or slug-string to "Human String"
 * 
 * @param  string $string
 * @return string "Human String"
 */
function toHuman($string) {
    
    clean($string);
    
    return ucwords(str_replace('_', ' ', toUnderscore($string)));
}

/**
 * Convert underscore_string or slug-string to CamelCaseString
 * 
 * @param  string $string
 * @return string CamelCaseString
 */
function toCamelCase($string) {
    
    clean($string);
    
    return preg_replace('/(?:^|[_-])(.?)/e',"strtoupper('$1')",$string);
}

/**
 * Convert underscore_string or slug-string to camelBackString
 * 
 * @param  string $string
 * @return string camelBackString
 */
function toCamelBack($string) {
    
    clean($string);
    
    return preg_replace('/[_-](.?)/e',"strtoupper('$1')",$string);
}

/**
 * Convert CamelCaseString, camelBackString, or slug-string to underscore-string
 * 
 * @param  string $string
 * @return string underscore_string
 */
function toUnderscore($string) {
    
    clean($string);
    
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
function toSlug($string) {
    
    clean($string);
    
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
function clean(&$string) {
    
    $string = preg_replace('/[A-Za-z0-9_\-]/s', '', $string);
}