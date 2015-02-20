<?php namespace Medved;

class Validator {
	
	private $data;
	
	public function __construct ($data) {
		$this->data = $data;
	}
	
	public function getData () {
		return $this->data;
	}
	
	public function required (array $fields) {
		foreach ($fields as $field) {
			$value = isset($this->data[$field]) ? $this->data[$field] : null;
			
			if (
				$value === null ||
				$value === ''
			) {
				return false;
			}
		}
		
		return true;
	}
	
}