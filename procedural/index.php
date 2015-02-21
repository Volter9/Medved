<?php

define('BASEPATH', __DIR__ . '/');

require 'resources/functions.php';

$error = null;

if (is_post()) {
	$error = require 'actions/login.php';
}

view('templates/login.php', array (
	'error' => $error
));