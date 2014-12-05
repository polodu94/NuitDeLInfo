<?php
App::uses('AppModel', 'Model');
/**
 * Post Model
 *
 */
class Post extends AppModel {

	public $validationSets = array(
		'content' => array(
			'rule' 		=> array('between', 1, 500),
			'message' 	=> 'The name must be between 1 and 500 chars',
			'required' => true
		)
	);

	
	public $findMethods = array('request' => true);

	public function paginateCount($conditions = null, $recursive = 0, $extra = array()) 
    {
    	if($extra['type'] === 'request')
    	{
			$db = $this->getDataSource();
			$sql = 'SELECT COUNT(*) as count FROM ( ' . $extra['request'] . ' ) Result';
			return $db->fetchAll($sql, array())[0][0]['count'];
    	}
    	else
    		return parent::paginateCount($conditions, $recursive, $extra);
	}

	public function _findRequest($state, $query, $result = array())
	{
		$db = $this->getDataSource();
		$sql = $query['request'];
		if(!is_null($query['order'][0]))
		{
			$sql .= ' ORDER BY';
			foreach($query['order'] as $order)
			{				
				$sql .= ' ' . $order;
			}
		}
		if(!empty($query['limit']))
			$sql .= ' LIMIT ' . (is_null($query['offset']) ? 0 : $query['offset']) . ',' . $query['limit'];
		return $db->fetchAll($sql, array());
	}
}
