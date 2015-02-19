<?php

$fields = array('username', 'password');

if (!$data = post_input($fields, true)) {
	return 'Одно из полей не заполнено.';
}

$mysqli = db_connect();

$data['password'] = md5($data['password']);

$username = $data['username'];
$password = $data['password'];

if (user_exists($mysqli, $username, $password)) {
	return 'Данный пользователь уже существует';
}

if (!db_insert($mysqli, 'users', $data)) {
	return 'Пользователь не может быть зарегестрирован!';
}

return true;