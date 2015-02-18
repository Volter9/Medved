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
	$mysqli = new mysqli($host, $user, $password, $database);
	$mysqli->set_charset('utf8');
	
	return $mysqli;
}

function db_insert (mysqli $mysqli, $table, array $data) {
	$keys = array_keys($data);
	$values = array_values($data);
	
	$columns = db_columns($keys);
	$values = db_values($mysqli, $values);
	
	$query = "INSERT INTO $table ($columns) VALUES ($values)";
	
	$mysqli->query($query);
	
	return $mysqli->affected_rows > 0;
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

function db_values ($link, array $values) {
	$values = db_escape($link, $values);

	return implode(COLUMN_GLUE, db_values_wrap($values));
}

function db_escape ($link, array $values) {
	return array_map(
		function ($value) use ($link) {
			return $link->real_escape_string($value);
		}, 
		$values
	);
}

function db_values_wrap (array $values) {
	return array_map(
		function ($value) {
			return "'$value'";
		}, 
		$values
	);
}