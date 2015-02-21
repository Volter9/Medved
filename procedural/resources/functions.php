<?php

require BASEPATH . 'resources/input.php';
require BASEPATH . 'resources/database.php';
require BASEPATH . 'resources/view.php';

/**
 * Функция для работы с пользователем
 */

function user_exists (PDO $pdo, $username) {
	$query = "
		SELECT COUNT(*)
		FROM users
		WHERE username = ?
	";
	
	$statement = $pdo->prepare($query);
	$statement->execute(array($username));
	
	return $statement->fetchColumn() > 0;
}

