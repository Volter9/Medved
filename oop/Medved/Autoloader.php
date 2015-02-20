<?php namespace Medved;

class Autoloader {
	
	static public function register () {
		spl_autoload_extensions('.php');
		spl_autoload_register();
	}
	
}