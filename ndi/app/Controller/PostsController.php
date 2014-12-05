<?php
App::uses('AppController', 'Controller');
/**
 * Posts Controller
 *
 * @property Post $Post
 * @property PaginatorComponent $Paginator
 */
class PostsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

	public function index()
	{
		$id = $this->Auth->user('id');
		$db = $this->Post->getDataSource();
		$subQuery1 = $db->buildStatement(
			array(
				'fields' => array('U1.id','U1.name, Post.content'),
				'table'  => 'friends',
				'alias'  => 'Friend',
				'joins'  => array(
					array(
						'table' 	 => 'users',
						'alias' 	 => 'U1',
						'type'  	 => 'LEFT',
						'conditions' => array('Friend.user_id = U1.id')
					),
					array(
						'table' 	 => 'users',
						'alias' 	 => 'U2',
						'type'  	 => 'LEFT',
						'conditions' => array('Friend.friend_id = U2.id')
					),
					array(
						'table'      => 'posts',
						'alias'		 => 'Post',
						'type'		 => 'LEFT',
						'conditions' => array('Post.user_id = Friend.user_id')
					)
				),
				'conditions' => array('U2.id' => $id)
			),
			$this->Friend
		);
		$subQuery2 = $db->buildStatement(
			array(
				'fields' => array('U1.id','U1.name, Post.content'),
				'table'  => 'friends',
				'alias'  => 'Friend',
				'joins'  => array(
					array(
						'table' 	 => 'users',
						'alias' 	 => 'U1',
						'type'  	 => 'LEFT',
						'conditions' => array('Friend.friend_id = U1.id')
					),
					array(
						'table' 	 => 'users',
						'alias' 	 => 'U2',
						'type'  	 => 'LEFT',
						'conditions' => array('Friend.user_id = U2.id')
					),
					array(
						'table'      => 'posts',
						'alias'		 => 'Post',
						'type'		 => 'LEFT',
						'conditions' => array('Post.user_id = Friend.friend_id')
					)
				),
				'conditions' => array('U2.id' => $id)
			), $this->Friend
		);
		
		$subQuery3 = $db->buildStatement(
			array(
				'fields' => array('User.id, User.name, Post.content'),
				'table'  => 'posts',
				'alias'  => 'Post',
				'joins'  => array(
					array(
						'table' => 'users',
						'alias' => 'User',
						'type'  => 'LEFT',
						'conditions' => array('Post.user_id = User.id')
					)
				),
				'conditions' => array('Post.user_id' => $id)
			), $this->Post
		);

		$this->paginate = array(
			'table' => 'friends',
			'callbacks' => 'after',
			'request' => "{$subQuery1} UNION ALL {$subQuery2} UNION ALL {$subQuery3}",
			'type'    => 'request',
			'order'   => 'name',
			'noRead'  => true
		);
		$posts = $this->paginate('Post');

		$this->set(compact('posts', 'id'));
	}

	public function view($id)
	{
		$this->loadModel('User');
		$user = $this->User->find('first',array(
			'conditions' => array('User.id' => $id)
			));
		if($user)
		{
			$posts = $this->Post->find('all', array(
				'fields' => 'User.name,Post.content,Post.created',
				'conditions' => array('user_id' => $id),
				'joins' => array(
					array(
						'table' => 'users',
						'alias' => 'User',
						'conditions' => 'Post.user_id = User.id'
					)
				)
			));
			$this->set(compact('posts', 'user'));
		}
		else
		{
			$this->Session->setFlash('User doesn\'t exist');
			$this->redirect(array('controller' => 'posts', 'action' =>' index'));
		}
	}

	public function create()
	{
		$data = $this->request->data;
		if($data)
		{
			$this->Post->set($data);
			if($this->Post->validates($data))
			{
				$this->Post->create();
				$this->Post->save(
					array(
						'user_id' => $this->Auth->user('id'),
						'content' => $data['Post']['content']
					)
				);
				$this->Session->setFlash('Your post are now created');
				$this->redirect(array('controller' => 'posts', 'action' => 'index'));
			}
		}
	}

	public function delete($id)
	{
		$userID = $this->Auth->user('id');

		$post = $this->Post->find('first', array(
			'fields' => 'id',
			'conditions' => array(
				'id' => $id,
				'user_id' => $userID
			)
		));

		if($post)
		{
			$this->Post->delete($post['Post']['id']);
			$this->Session->setFlash('Post deleted');
			$this->redirect(array('controller' => 'posts', 'action' => 'index'));
		}
		else
		{
			$this->Seission->setFlash('Post doesn\'t exist');
			$tshi->redirect(array('controller' => 'posts', 'action' => 'index'));
		}
	}

	public function edit($id)
	{
		$userID = $this->Auth->user('id');
		$post = $this->Post->find('first', array(
			'fields' => 'id, content',
			'conditions' => array(
				'id' => $id,
				'user_id' => $userID
			)
		));

		if($post)
		{
			$data = $this->request->data;
			if(!empty($data['Post']['content']))
			{
				$this->Post->save(array(
					'id' => $id,
					'content' => $data['Post']['content']
				));
				$this->Session->setFlash('Post edited');
			}
			else
			{
				$this->request->data['Post']['content'] = $post['Post']['content'];
			}
		}
		else
		{
			$this->Session->setFlash('Post doesn\'t exist');
			$this->redirect(array('controller' => 'posts', 'action' => 'index'));
		}		
	}

}
