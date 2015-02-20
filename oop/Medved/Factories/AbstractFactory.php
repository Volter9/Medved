<?php namespace Medved\Factories;

use Exception;

use Medved\Dependency\Container;

abstract class AbstractFactory {
	
	protected $container;
	protected $namespace;
	protected $suffix = '';
	
	public function __construct (Container $container, $namespace) {
		$this->container = $container;
		$this->namespace = $namespace;
	}
	
	public function create ($class) {
		$class = "{$this->namespace}$class{$this->suffix}";
		
		if (!class_exists($class)) {
			throw new Exception ("Class $class does not exists!");
		}
		
		return $this->createInstance($class, $this->container);
	}
	
	abstract protected function createInstance ($class, Container $container);
	
}