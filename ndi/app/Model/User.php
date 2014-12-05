<?php

class User extends AppModel{

	public $belongsTo = array('Role', 'Center');

    public $actsAs = array(
    	'Multivalidatable',
    	'Acl' => array('type' => 'requester')
    );

	public $validationSets = array(
		'signin' => array(
			'pseudo' => array(
				'rule' 		=> array('between', 4, 20),
				'message' 	=> 'The name must be between 4 and 20 chars',
				'required' => true
			),
			'password' => array(
				'rule' 		=> array('between', 4, 20),
				'message'   => 'The password must be between 4 and 20 chars',
				'required'  => true
			),
			'password2' => array(
				'rule' 	    => 'checkpasswords',
				'message'   => 'Passwords must be equal',
				'required'  => true
			),
			'email' => array(
				'rule'      => array('email'),
				'message'   => 'Email is not valid',
				'required'  => true
			)), 
		'login' => array(
			'pseudo' => array(
				'rule' 		=> array('between', 4, 20),
				'message' 	=> 'The name must be between 4 and 20 chars',
				'required'  => true
			),
			'password' => array(
				'rule' 		=> array('between', 4, 20),
				'message'   => 'The password must be between 4 and 20 chars',
				'required'  => true
			))
	);

	public function checkpasswords()     // to check pasword and confirm password
    {  
        if(strcmp($this->data['User']['password'],$this->data['User']['password2']) == 0 ) 
        {
            return true;
        }
        return false;
    }

    public function parentNode() {
        if (!$this->id && empty($this->data)) {
            return null;
        }
        if (isset($this->data['User']['role_id'])) {
            $groupId = $this->data['User']['role_id'];
        } else {
            $groupId = $this->field('role_id');
        }
        if (!$groupId) {
            return null;
        } else {
            return array('Role' => array('id' => $groupId));
        }
    }

	public function bindNode($user) {
	    return array('model' => 'Role', 'foreign_key' => $user['User']['role_id']);
	}


}