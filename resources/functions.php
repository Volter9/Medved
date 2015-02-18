<?php

require BASEPATH . 'resources/input.php';
require BASEPATH . 'resources/database.php';
require BASEPATH . 'resources/view.php';

/**
 * Функция для работы с пользователем
 */

function user_exists (mysqli $mysqli, $username, $password) {
	$username = $mysqli->real_escape_string($username);
	$password = $mysqli->real_escape_string($password);
	
	$query = "
		SELECT username, password
		FROM users
		WHERE username = '$username' AND password = '$password'
	";
	
	$result = $mysqli->query($query);
	
	return $result->num_rows > 0;
}

