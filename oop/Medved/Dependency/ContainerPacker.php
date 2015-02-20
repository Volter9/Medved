<?php namespace Medved\Dependency;

use Medved\Database\Connection,
	Medved\Factories\QueryFactory,
	Medved\Routing\Input;

use Repositories\UserRepository;

class ContainerPacker {
	
	public function pack (Container $container) {
		$container->set('input', new Input([
			'post'   => $_POST,
			'server' => $_SERVER
		]));

		$container->set('database', new Connection(
			'localhost', 'test', 'root', ''
		));

		$container->set(
			'users', new UserRepository($container->get('database'))
		);

		$container->set('queries', new QueryFactory($container, 'Queries\\'));
	}
	
}