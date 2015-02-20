<?php namespace Queries;

use Medved\Database\QueryInterface;

interface UserCheckQueryInterface extends QueryInterface {
	
	public function check ($username);
	
}