<?php

define('BASEPATH', __DIR__ . '/');

require 'Medved/Autoloader.php';

use Medved\Autoloader,
	Medved\Dependency\Container,
	Medved\Dependency\ContainerPacker,
	Medved\Factories\ControllerFactory;

Autoloader::register();

$container = new Container;

$packer = new ContainerPacker;
$packer->pack($container);

$factory = new ControllerFactory($container, 'Controllers\\');
$controller = $factory->create('Register');

$controller->index();