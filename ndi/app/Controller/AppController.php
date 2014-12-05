<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
	public $helpers = array('Html');

	public $components = array(
		'Auth' => array(
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
		'Acl'
		);

	public function beforeFilter() {
		
		if(!$this->request->is('ajax'))
			$this->layout = 'jquery';
        //Configure AuthComponent
        $this->Auth->loginAction = array('controller' => 'users', 'action' => 'login');
        $this->Auth->logoutRedirect = array('controller' => 'users', 'action' => 'login');
        $this->Auth->loginRedirect = array('controller' => 'users', 'action' => 'index');

        if($this->Auth->user('id'))
        {
	        $controller =  ucfirst($this->request->controller);
	        $action = $this->request->action;
	        $this->loadModel('User');
	        $user = $this->User->find('first',
	        	array(
	        		'fields' => 'User.role_id',
	        		'conditions' => array('User.id' => $this->Auth->user('id'))
	        	)
	        );
	        $this->loadModel('Role');
	        $aro = $this->Role->find('first',
	        	array(
	        		'conditions' =>
	        		array('id' => $user['User']['role_id'])
	        		)
	        );
	        if (!$this->Acl->check($aro['Role']['name'],$controller.'/'.$action))
	        {
	        	$this->Session->setFlash('You are not allowed to see this page');
	        	$this->redirect(array('controller' => 'users', 'action' => 'index'));
	        }
	        else
	        {
	        	$group = $this->Auth->user('role_id');
	        	$this->set(compact('group'));
	        }
	    }
	}
}
