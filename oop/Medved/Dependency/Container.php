<?php namespace Medved\Dependency;

class Container {
	
	private $members = [];
	
	public function get ($key) {
		if (!isset($this->members[$key])) {
			throw new Exception(
				"Key '$key' was not found in container"
			);
		}
		
		return $this->members[$key];
	}
	
	public function set ($key, $value) {
		$this->members[$key] = $value;
	}
	
}