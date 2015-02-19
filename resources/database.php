<?php

/**
 * Функции для работы с БД
 */

define('COLUMN_GLUE', ', ');

function db_connect (
	$host = 'localhost', 
	$user = 'root', 
	$password = '', 
	$database = 'test'
) {
	$dsn = "mysql:host=$host;charset=utf8;dbname=$database";
	
	$pdo = new PDO($dsn, $user, $password);

	return $pdo;
}

function db_insert (PDO $pdo, $table, array $data) {
	$keys = array_keys($data);
	$data = array_values($data);
	
	$columns = db_columns($keys);
	$values = trim(str_repeat('?, ', count($data)), COLUMN_GLUE);
	
	$query = "INSERT INTO $table ($columns) VALUES ($values)";
	
	$statement = $pdo->prepare($query);
	$statement->execute($data);
	
	return $pdo->lastInsertId();
}

function db_columns (array $columns) {
	$columns = array_map(
		function ($value) {
			return db_escape_column($value);
		}, 
		$columns
	);
	
	return implode(COLUMN_GLUE, $columns);
}

function db_escape_column ($column) {
	return "`$column`";
}