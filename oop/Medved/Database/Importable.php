<?php namespace Medved\Database;

interface Importable {
	
	/**
	 * @param array $data
	 */
	public function import (array $data);
	
}