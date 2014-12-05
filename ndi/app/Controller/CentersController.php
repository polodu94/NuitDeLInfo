<?php

class CentersController extends AppController{
	public function index_1(){
		$this->paginate = array('Center' => array('conditions' => array('type' => 1)));
		$centers = $this->paginate('Center');
		$this->set(compact('centers'));
	}
	public function index_2(){
		$this->paginate = array('Center' => array('conditions' => array('type' => 2)));
		$centers = $this->paginate('Center');
		$this->set(compact('centers'));
	}

	public function view($id, $type)
	{
		$center = $this->Center->find('first', array('conditions' => array('Center.id' => $id, 'Center.type' => $type)));
		if(!$center)
		{
			$this->Session->setFlash('This center doesn\'t exist');
			$this->redirect(array('controller' => 'centers', 'action' => 'index'));
		}
		else
		{
			$this->paginate = array('User' => array('conditions' => array('center_id' => $id)));
			$users = $this->paginate('User');
			$this->set(compact('center', 'users', 'type'));
		}
	}
}