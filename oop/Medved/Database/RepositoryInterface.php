<?php namespace Medved\Database;

interface RepositoryInterface {
	
	public function __construct (Connection $db);
	
	public function find ($id);
	public function save (Exportable $entity);
	
}