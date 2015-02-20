<?php namespace Medved\Routing;

use Medved\Dependency\Container;

class Controller {
	
	protected $container;
	
	public function __construct (Container $container) {
		$this->container = $container;
	}
	
}