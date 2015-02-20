<?php namespace Repositories;

use Medved\Database\Connection,
	Medved\Database\Exportable,
	Medved\Database\RepositoryInterface;

class UserRepository implements RepositoryInterface {
	
	private $db;
	
	public function __construct (Connection $db) {
		$this->db = $db;
	}
	
	public function find ($id) {
		// Это не нужно в данном примере
	}
	
	public function save (Exportable $entity) {
		return $this->db->insert('users', $entity);
	}
	
}