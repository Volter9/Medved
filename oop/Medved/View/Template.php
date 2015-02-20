<?php namespace Medved\View;

class Template {
	
	private $view;
	private $data;
	
	public function __construct ($view) {
		$this->view = BASEPATH . "templates/$view.php";
	}
	
	public function render (array $data) {
		$closure = $this->isolate();
		$closure($this->view, $data);
	}
	
	protected function isolate () {
		return function ($__view, $__data) {
			extract($__data);
			
			include $__view;
		};
	}
	
}