<?php

class Center extends AppModel{
	
	public $belongsTo = array(
		'Location'
	);

	public $hasMany = array(
		'User'
	);
}