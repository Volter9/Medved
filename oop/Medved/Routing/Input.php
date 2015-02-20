<?php namespace Medved\Routing;

use Exception;

use Medved\Validator;

class Input {
	
	private $data;
	private $fields = ['post', 'server'];
	
	public function __construct (array $data = []) {
		$this->data = $data;
		$this->validator = new Validator($data);
		
		if (!$this->validator->required($this->fields)) {
			throw new Exception('Some fields missing!');
		}
	}
	
	public function get ($array = 'post', $key = null) {
		if (
			!isset($this->data[$array]) || 
			!isset($this->data[$array][$key]) &&
			$key !== null
		) {
			return false;
		}
		
		$array = $this->data[$array];
		
		return !$key ? $array : $array[$key];
	}
	
	public function isRequest ($method) {
		$request = $this->get('server', 'REQUEST_METHOD');
		
		return strtolower($request) === strtolower($method);
	}
	
}