<?php
/**
 * Theme storage manipulations
 *
 * @package WordPress
 * @subpackage HAPPY_BABY
 * @since HAPPY_BABY 1.0
 */

// Disable direct call
if ( ! defined( 'ABSPATH' ) ) { exit; }

// Get theme variable
if (!function_exists('happy_baby_storage_get')) {
	function happy_baby_storage_get($var_name, $default='') {
		global $HAPPY_BABY_STORAGE;
		return isset($HAPPY_BABY_STORAGE[$var_name]) ? $HAPPY_BABY_STORAGE[$var_name] : $default;
	}
}

// Set theme variable
if (!function_exists('happy_baby_storage_set')) {
	function happy_baby_storage_set($var_name, $value) {
		global $HAPPY_BABY_STORAGE;
		$HAPPY_BABY_STORAGE[$var_name] = $value;
	}
}

// Check if theme variable is empty
if (!function_exists('happy_baby_storage_empty')) {
	function happy_baby_storage_empty($var_name, $key='', $key2='') {
		global $HAPPY_BABY_STORAGE;
		if (!empty($key) && !empty($key2))
			return empty($HAPPY_BABY_STORAGE[$var_name][$key][$key2]);
		else if (!empty($key))
			return empty($HAPPY_BABY_STORAGE[$var_name][$key]);
		else
			return empty($HAPPY_BABY_STORAGE[$var_name]);
	}
}

// Check if theme variable is set
if (!function_exists('happy_baby_storage_isset')) {
	function happy_baby_storage_isset($var_name, $key='', $key2='') {
		global $HAPPY_BABY_STORAGE;
		if (!empty($key) && !empty($key2))
			return isset($HAPPY_BABY_STORAGE[$var_name][$key][$key2]);
		else if (!empty($key))
			return isset($HAPPY_BABY_STORAGE[$var_name][$key]);
		else
			return isset($HAPPY_BABY_STORAGE[$var_name]);
	}
}

// Inc/Dec theme variable with specified value
if (!function_exists('happy_baby_storage_inc')) {
	function happy_baby_storage_inc($var_name, $value=1) {
		global $HAPPY_BABY_STORAGE;
		if (empty($HAPPY_BABY_STORAGE[$var_name])) $HAPPY_BABY_STORAGE[$var_name] = 0;
		$HAPPY_BABY_STORAGE[$var_name] += $value;
	}
}

// Concatenate theme variable with specified value
if (!function_exists('happy_baby_storage_concat')) {
	function happy_baby_storage_concat($var_name, $value) {
		global $HAPPY_BABY_STORAGE;
		if (empty($HAPPY_BABY_STORAGE[$var_name])) $HAPPY_BABY_STORAGE[$var_name] = '';
		$HAPPY_BABY_STORAGE[$var_name] .= $value;
	}
}

// Get array (one or two dim) element
if (!function_exists('happy_baby_storage_get_array')) {
	function happy_baby_storage_get_array($var_name, $key, $key2='', $default='') {
		global $HAPPY_BABY_STORAGE;
		if (empty($key2))
			return !empty($var_name) && !empty($key) && isset($HAPPY_BABY_STORAGE[$var_name][$key]) ? $HAPPY_BABY_STORAGE[$var_name][$key] : $default;
		else
			return !empty($var_name) && !empty($key) && isset($HAPPY_BABY_STORAGE[$var_name][$key][$key2]) ? $HAPPY_BABY_STORAGE[$var_name][$key][$key2] : $default;
	}
}

// Set array element
if (!function_exists('happy_baby_storage_set_array')) {
	function happy_baby_storage_set_array($var_name, $key, $value) {
		global $HAPPY_BABY_STORAGE;
		if (!isset($HAPPY_BABY_STORAGE[$var_name])) $HAPPY_BABY_STORAGE[$var_name] = array();
		if ($key==='')
			$HAPPY_BABY_STORAGE[$var_name][] = $value;
		else
			$HAPPY_BABY_STORAGE[$var_name][$key] = $value;
	}
}

// Set two-dim array element
if (!function_exists('happy_baby_storage_set_array2')) {
	function happy_baby_storage_set_array2($var_name, $key, $key2, $value) {
		global $HAPPY_BABY_STORAGE;
		if (!isset($HAPPY_BABY_STORAGE[$var_name])) $HAPPY_BABY_STORAGE[$var_name] = array();
		if (!isset($HAPPY_BABY_STORAGE[$var_name][$key])) $HAPPY_BABY_STORAGE[$var_name][$key] = array();
		if ($key2==='')
			$HAPPY_BABY_STORAGE[$var_name][$key][] = $value;
		else
			$HAPPY_BABY_STORAGE[$var_name][$key][$key2] = $value;
	}
}

// Merge array elements
if (!function_exists('happy_baby_storage_merge_array')) {
	function happy_baby_storage_merge_array($var_name, $key, $value) {
		global $HAPPY_BABY_STORAGE;
		if (!isset($HAPPY_BABY_STORAGE[$var_name])) $HAPPY_BABY_STORAGE[$var_name] = array();
		if ($key==='')
			$HAPPY_BABY_STORAGE[$var_name] = array_merge($HAPPY_BABY_STORAGE[$var_name], $value);
		else
			$HAPPY_BABY_STORAGE[$var_name][$key] = array_merge($HAPPY_BABY_STORAGE[$var_name][$key], $value);
	}
}

// Add array element after the key
if (!function_exists('happy_baby_storage_set_array_after')) {
	function happy_baby_storage_set_array_after($var_name, $after, $key, $value='') {
		global $HAPPY_BABY_STORAGE;
		if (!isset($HAPPY_BABY_STORAGE[$var_name])) $HAPPY_BABY_STORAGE[$var_name] = array();
		if (is_array($key))
			happy_baby_array_insert_after($HAPPY_BABY_STORAGE[$var_name], $after, $key);
		else
			happy_baby_array_insert_after($HAPPY_BABY_STORAGE[$var_name], $after, array($key=>$value));
	}
}

// Add array element before the key
if (!function_exists('happy_baby_storage_set_array_before')) {
	function happy_baby_storage_set_array_before($var_name, $before, $key, $value='') {
		global $HAPPY_BABY_STORAGE;
		if (!isset($HAPPY_BABY_STORAGE[$var_name])) $HAPPY_BABY_STORAGE[$var_name] = array();
		if (is_array($key))
			happy_baby_array_insert_before($HAPPY_BABY_STORAGE[$var_name], $before, $key);
		else
			happy_baby_array_insert_before($HAPPY_BABY_STORAGE[$var_name], $before, array($key=>$value));
	}
}

// Push element into array
if (!function_exists('happy_baby_storage_push_array')) {
	function happy_baby_storage_push_array($var_name, $key, $value) {
		global $HAPPY_BABY_STORAGE;
		if (!isset($HAPPY_BABY_STORAGE[$var_name])) $HAPPY_BABY_STORAGE[$var_name] = array();
		if ($key==='')
			array_push($HAPPY_BABY_STORAGE[$var_name], $value);
		else {
			if (!isset($HAPPY_BABY_STORAGE[$var_name][$key])) $HAPPY_BABY_STORAGE[$var_name][$key] = array();
			array_push($HAPPY_BABY_STORAGE[$var_name][$key], $value);
		}
	}
}

// Pop element from array
if (!function_exists('happy_baby_storage_pop_array')) {
	function happy_baby_storage_pop_array($var_name, $key='', $defa='') {
		global $HAPPY_BABY_STORAGE;
		$rez = $defa;
		if ($key==='') {
			if (isset($HAPPY_BABY_STORAGE[$var_name]) && is_array($HAPPY_BABY_STORAGE[$var_name]) && count($HAPPY_BABY_STORAGE[$var_name]) > 0) 
				$rez = array_pop($HAPPY_BABY_STORAGE[$var_name]);
		} else {
			if (isset($HAPPY_BABY_STORAGE[$var_name][$key]) && is_array($HAPPY_BABY_STORAGE[$var_name][$key]) && count($HAPPY_BABY_STORAGE[$var_name][$key]) > 0) 
				$rez = array_pop($HAPPY_BABY_STORAGE[$var_name][$key]);
		}
		return $rez;
	}
}

// Inc/Dec array element with specified value
if (!function_exists('happy_baby_storage_inc_array')) {
	function happy_baby_storage_inc_array($var_name, $key, $value=1) {
		global $HAPPY_BABY_STORAGE;
		if (!isset($HAPPY_BABY_STORAGE[$var_name])) $HAPPY_BABY_STORAGE[$var_name] = array();
		if (empty($HAPPY_BABY_STORAGE[$var_name][$key])) $HAPPY_BABY_STORAGE[$var_name][$key] = 0;
		$HAPPY_BABY_STORAGE[$var_name][$key] += $value;
	}
}

// Concatenate array element with specified value
if (!function_exists('happy_baby_storage_concat_array')) {
	function happy_baby_storage_concat_array($var_name, $key, $value) {
		global $HAPPY_BABY_STORAGE;
		if (!isset($HAPPY_BABY_STORAGE[$var_name])) $HAPPY_BABY_STORAGE[$var_name] = array();
		if (empty($HAPPY_BABY_STORAGE[$var_name][$key])) $HAPPY_BABY_STORAGE[$var_name][$key] = '';
		$HAPPY_BABY_STORAGE[$var_name][$key] .= $value;
	}
}

// Call object's method
if (!function_exists('happy_baby_storage_call_obj_method')) {
	function happy_baby_storage_call_obj_method($var_name, $method, $param=null) {
		global $HAPPY_BABY_STORAGE;
		if ($param===null)
			return !empty($var_name) && !empty($method) && isset($HAPPY_BABY_STORAGE[$var_name]) ? $HAPPY_BABY_STORAGE[$var_name]->$method(): '';
		else
			return !empty($var_name) && !empty($method) && isset($HAPPY_BABY_STORAGE[$var_name]) ? $HAPPY_BABY_STORAGE[$var_name]->$method($param): '';
	}
}

// Get object's property
if (!function_exists('happy_baby_storage_get_obj_property')) {
	function happy_baby_storage_get_obj_property($var_name, $prop, $default='') {
		global $HAPPY_BABY_STORAGE;
		return !empty($var_name) && !empty($prop) && isset($HAPPY_BABY_STORAGE[$var_name]->$prop) ? $HAPPY_BABY_STORAGE[$var_name]->$prop : $default;
	}
}
?>