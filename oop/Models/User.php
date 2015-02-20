<?php namespace Models;

use Medved\Database\Exportable,
	Medved\Database\Importable;

class User implements Exportable, Importable {
	
	public $id;
	public $username;
	public $password;
	
	public function export () {
		return [
			'username' => $this->username,
			'password' => $this->password
		];
	}
	
	public function import (array $data) {
		$this->id = isset($data['id']) ? $data['id'] : null;
		$this->username = $data['username'];
		$this->password = $data['password'];
	}
	
}