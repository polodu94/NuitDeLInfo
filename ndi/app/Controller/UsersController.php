<?php

class UsersController extends AppController{

	public $components = array('Auth' => array(
			'loginAction' => array(
	            'controller' => 'users',
	            'action' => 'login'
	        ),
	        'authError' => 'Pensiez-vous réellement que vous étiez autorisés à voir cela ?',
	        'authenticate' => array(
	            'Form' => array(
	                'fields' => array('username' => 'user')
	            )
	        )
	       ),
		'Session',
		'Acl',
		'Paginator',
		 'RequestHandler');


	public $helpers = array('Session', 'Html', 'Paginator' ,'JS');

	public function beforeFilter()
	{
		$this->Auth->allow('index','signin','check');
		parent::beforeFilter();
	}

	public function index(){
		if($this->Auth->user('id'))
		{
			$id = $this->Auth->user('id');
			$user = $this->User->find('first',
				array(
					'fields' => 'User.name',
					'conditions' => array('User.id' => $id)
				)
			);
			$user = $user['User'];
			$this->set(compact('user'));
		}
	}

	public function login(){
		if(!$this->Auth->user('id'))
		{
			if(!empty($this->request->data))
			{
				$this->User->set($this->request->data);
				$this->User->setValidation('login');
				if($this->User->validates())
				{
					$data = $this->request->data['User'];
					$user = $this->User->find('first', array(
						'fields' => 'User.id,User.role_id',
						'conditions'        => array(
							'User.name'     => $data['pseudo'],
							'User.password' => $this->hash($data['password'])
						)
					));
					if($user)
					{
						$user = $user['User'];
						$info = array(
							'id'     => $user['id'],
							'role_id' => $user['role_id']
							);
						$this->Session->write('User', $info);
						$this->Auth->login($info);
						$this->Session->setFlash('You are now connected');
						$this->redirect(array('controller' => 'users', 'action' => 'index'));
					}
					else
					{
						$this->Session->setFlash('Pseudo/Password incorrect');
					}
					$this->data = null;
				}
				else
				{
					$errors = $this->User->validationErrors;
				}
			}
		}
		else
		{
			$this->Session->setFlash('You are already connected');
			$this->redirect(array('controller' => 'users', 'action' => 'index'));
		}
	}

	public function logout(){		
		if($this->Auth->user('id'))
		{
			$this->Auth->logout();
			$this->Session->setFlash('You are now disconnected');	
		}
		else
		{
			$this->Session->setFlash('You must be connected');			
		}
		$this->redirect(array('controller' => 'users', 'action' => 'index'));
	}

	public function signin(){

		if($this->Auth->user('id'))
		{
			$this->Session->setFlash('You are already connected');
			$this->redirect(array('controller' => 'users', 'action' => 'index'));
		}
		else if(!empty($this->request->data))
		{
			$user = $this->User->find('first', array('conditions' => array('User.name' => $this->request->data['User']['pseudo'])));
			if ($user)
			{
				$this->Session->setFlash('Username already exists');
				return;
			}
			$user = $this->User->find('first', array('conditions' => array('User.email' => $this->request->data['User']['email'])));
			if ($user)
			{
				$this->Session->setFlash('Email already exists');
				return;
			}
			$this->User->set($this->request->data);
			$this->User->setValidation('signin');
			if($this->User->validates())
			{
				$data = $this->request->data['User'];
				$this->User->create();
				$this->User->save(array(
					'name'     => $data['pseudo'],
					'password' => $this->hash($data['password']),
					'email'    => $data['email'],
					'role_id'  => Configure::read('DefaultRole')
				), false);
				$this->Session->setFlash('Your are now registered');
				$this->redirect(array('controller' => 'users', 'action' => 'index'));
			}
			else
			{
				$this->Session->setFlash('Somes errors occured');				
				$errors = $this->User->validationErrors;
			}
		}
	}

	private function hash($pass)
	{
		return md5($pass);
	}

	public function view($id)
	{
		$userID = $this->Auth->user('id');
		$user = $this->User->find('first', array('conditions' => array('User.id' => $userID)));
		if(!$user)
		{
			$this->Session->setFlash('This user doesn\'t exist');
			$this->redirect(array('controller' => 'users', 'action' => 'index'));
		}
		else
		{
			$this->set(compact('user'));
		}
	}

	public function lists(){
		$this->paginate = array('User' => array('conditions' => array('Role.id' => Configure::read("refugee_group"))));
		$users = $this->paginate('User');
		$this->set(compact('users'));
	}
}