<?php namespace Queries;

use Medved\Database\Connection;

class UserCheckQuery implements UserCheckQueryInterface {
	
	private $db;
	
	public function __construct (Connection $db) {
		$this->db = $db;
	}
	
	public function check ($username) {
		$query = 'SELECT username FROM users WHERE username = ?';
		
		return $this->db->query($query, [$username])->rowCount() > 0;
	}
	
}