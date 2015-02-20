<?php namespace Medved\Database;

use PDO;

class Connection {
	
	private $pdo;
	
	public function __construct ($host, $database, $user, $password) {
		$dsn = "mysql:host=$host;dbname=$database;charset=utf8";
		
		$this->pdo = new PDO($dsn, $user, $password, [
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
			PDO::ATTR_EMULATE_PREPARES => false,
			PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
		]);
	}
	
	public function getPDO () {
		return $this->pdo;
	}
	
	public function insert ($table, Exportable $entity) {
		$data = $entity->export();
		
		$keys = array_keys($data);
	
		$columns = implode(', ', $keys);
		$values = trim(str_repeat('?, ', count($keys)), ', ');
	
		$query = "INSERT INTO $table ($columns) VALUES ($values)";
		$statement = $this->query($query, array_values($data));
		
		$entity->id = $this->pdo->lastInsertId();
		
		return $entity->id;
	}
	
	public function query ($query, array $parameters = []) {
		$statement = $this->pdo->prepare($query);
		$statement->execute($parameters);
		
		return $statement;
	}
	
}