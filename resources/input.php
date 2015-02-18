<?php

/**
 * Функции для работы с входными данными
 */

function is_post () {
	return !empty($_POST)
		&& isset($_SERVER['REQUEST_METHOD']) 
		&& strtolower($_SERVER['REQUEST_METHOD']) === 'post';
}

function post_input (array $keys = array(), $sanitize = false) {
	$result = array();
	
	foreach ($keys as $key) {
		if (!isset($_POST[$key]) || trim($_POST[$key]) === '') {
			return false;
		}
		
		$result[$key] = $sanitize 
			? filter_var($_POST[$key], FILTER_SANITIZE_STRING) 
			: $_POST[$key];
	}
	
	return $result;
}