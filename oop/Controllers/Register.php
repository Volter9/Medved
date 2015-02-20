<?php namespace Controllers;

use Medved\Dependency\Container,
	Medved\Routing\Controller,
	Medved\View\Template,
	Medved\Validator,
	Models\User;

class Register extends Controller {
	
	private $input;
	private $queries;
	private $template;
	
	public function __construct (Container $container) {
		parent::__construct($container);
		
		$this->input = $container->get('input');
		$this->queries = $container->get('queries');
		$this->template = new Template('login');
	}
	
	public function index () {
		$error = null;
		
		/**
		 * По идее, этим должен заниматся роутер, но мне лень его писать
		 */
		if ($this->input->isRequest('post')) {
			$validator = new Validator($this->input->get('post'));
			
			$error = $this->register($validator);
		}
		
		$this->view($error);
	}
	
	public function register (Validator $validator) {
		/**
		 * Тут получилос толсто :\
		 */
		$users = $this->container->get('users');
		$userCheck = $this->queries->create('UserCheck');
		
		$input = $validator->getData();
		$input['password'] = md5($input['password']);
		
		$user = new User;
		$user->import($input);
		
		if (!$validator->required(['username', 'password'])) {
			return 'Одно из полей пустое!';
		}
		else if ($userCheck->check($input['username'])) {
			return 'Данный пользователь уже существует!';
		}
		else if (!$users->save($user)) {
			return 'Пользователь не может быть зарегестрирован!';
		}
		
		return true;
	}
	
	private function view ($error = null) {
		$this->template->render([
			'error' => $error
		]);
	}
	
}