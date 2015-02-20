<?php namespace Medved\Factories;

use Medved\Dependency\Container;

class QueryFactory extends AbstractFactory {
	
	protected $suffix = 'Query';

	protected function createInstance ($class, Container $container) {
		return new $class($container->get('database'));
	}
	
}