<?php

$fields = array('username', 'password');

if (!$data = post_input($fields, true)) {
	return 'Одно из полей не заполнено.';
}

$db = db_connect();

$data['password'] = md5($data['password']);

$username = $data['username'];
$password = $data['password'];

if (user_exists($db, $username, $password)) {
	return 'Данный пользователь уже существует';
}

if (!db_insert($db, 'users', $data)) {
	return 'Пользователь не может быть зарегестрирован!';
}

return true;