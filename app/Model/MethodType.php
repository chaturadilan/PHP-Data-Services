<?php
App::uses('AppModel', 'Model');
/**
 * MethodType Model
 *
 * @property Method $Method
 */
class MethodType extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Method' => array(
			'className' => 'Method',
			'foreignKey' => 'method_type_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
