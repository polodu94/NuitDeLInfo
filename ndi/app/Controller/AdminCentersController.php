<?php

class AdminCentersController extends AppController{
	public function index()
	{
		$centers = $this->AdminCenter->find('all', array('conditions' => array('user_id' => $this->Auth->user('id'))));
		$this->set(compact('centers'));
	}

	public function add()
	{
		if(!empty($this->request->data))
		{
			$this->loadModel('Center');
			$this->Center->set($this->request->data);
			if($this->Center->validates())
			{
				$data = $this->request->data['Admincenter'];
				$this->Center->create();
				$this->Center->save(array(
					'name'     => $data['name'],
					'city'     => $data['city'],
					'country'  => $data['country'],
					'address'  => $data['address'],
					'type'	   => $data['type']
				), false);
				$this->AdminCenter->create();
				$this->AdminCenter->save(array(
					'user_id'     => $this->Auth->user('id'),
					'center_id'   => $this->Center->id
				), false);
				$this->Session->setFlash('Center created');
				$this->redirect(array('controller' => 'users', 'action' => 'index'));
			}
			else
			{
				$this->Session->setFlash('Somes errors occured');				
				$errors = $this->User->validationErrors;
			}
		}
	}

	public function edit($id)
	{
		$this->loadModel('Center');
		$center = $this->Center->find('first', array('conditions' => array('Center.id' => $id)));
		if (!$center)
		{
			$this->Session->setFlash('Center not found');
			$this->redirect(array('controller' => 'admincenters', 'action' => 'index'));
			return;
		}
		if(!empty($this->request->data))
		{
			$this->loadModel('Center');
			$this->Center->set($this->request->data);
			if($this->Center->validates())
			{
				$data = $this->request->data['Center'];
				$this->Center->id = $id;
				$this->Center->save(array(
					'name'     => $data['name'],
					'city'     => $data['city'],
					'country'  => $data['country'],
					'address'  => $data['address']
				), false);
				$this->Session->setFlash('Center created');
				$this->redirect(array('controller' => 'users', 'action' => 'index'));
			}
			else
			{
				$this->Session->setFlash('Somes errors occured');				
				$errors = $this->User->validationErrors;
			}
		}
		else
			$this->data = $center;
	}

	public function manage()
	{

	}
}