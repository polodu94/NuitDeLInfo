<?php

class BddsController extends AppController{

	public function addUsers($start, $num)
	{
		$this->loadModel('User');
		/*for($i = $start; $i < $num; $i++)
		{
			$this->User->create();
			$this->User->save(array(
				'name' => 'User'.$i, 
				'password' => md5('User'.$i), 
				'role_id' => rand(1,2), 
				'description' => 'I am the user User' . $i
				)
			);
		}*/
		$this->loadModel('Friend');
		for($i = $start; $i < $num; $i++)
		{
			$end = rand(1,100);
			for($j = 1; $j < $end;$j++)
			{
				$friend = rand($start,$num-1);
				$this->addFriend($i,$friend);
			}
		}
	}

	public function addFriend($id,$friend)
	{
		$friends = $this->Friend->find('first',
			array(
				'fields' => 'id',
				'conditions' => 
				array('OR' =>
					array('user_id' => $id, 'friend_id' => $friend),
					array('friend_id' => $id, 'user_id' => $friend)
					)
				)
			);
		if($friends)
			return false;
		else
		{
			$this->Friend->create();
			$this->Friend->save(array('user_id' => $id, 'friend_id' => $friend));
			return true;
		}
	}

	public function getCountFriend()
	{
		$this->loadModel('User');
		$db = $this->User->getDataSource();
		$users = $this->User->find('all');
		$max = array(array(0 => array('count' => 0)));
		foreach($users as $user)
		{
			$id = $user['User']['id'];
			$count = $db->fetchAll('
				SELECT COUNT(*) as count, x.id, x.name FROM
(
 	SELECT U1.id as IDD, U2.id, U2.name
    FROM `wizi`.`friends` AS `Friend` 
	LEFT JOIN `wizi`.`users` AS `U1` ON (`Friend`.`user_id` = `U1`.`id`) 
	LEFT JOIN `wizi`.`users` AS `U2` ON (`Friend`.`friend_id` = `U2`.`id`)
	WHERE `U2`.`id` = ?
	UNION ALL
	SELECT U1.id as IDD, U2.id, U2.name
	FROM `wizi`.`friends` AS `Friend` 
	LEFT JOIN `wizi`.`users` AS `U1` ON (`Friend`.`friend_id` = `U1`.`id`) 
	LEFT JOIN `wizi`.`users` AS `U2` ON (`Friend`.`user_id` = `U2`.`id`)
	WHERE `U2`.`id` = ?
    
) x', array($id,$id));
			if($max[0][0]['count'] < $count[0][0]['count'])
				$max = $count;
		}
		debug($max);
		die();
	}

}