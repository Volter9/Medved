<?php namespace Medved\Factories;

use Medved\Dependency\Container;

class ControllerFactory extends AbstractFactory {
	
	protected function createInstance ($class, Container $container) {
		return new $class($container);
	}
	
}