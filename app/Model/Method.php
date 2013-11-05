<?php
App::uses('AppModel', 'Model');
/**
 * Method Model
 *
 * @property DataCollection $DataCollection
 * @property MethodType $MethodType
 */
class Method extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'data_collection_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'method_type_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'DataCollection' => array(
			'className' => 'DataCollection',
			'foreignKey' => 'data_collection_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'MethodType' => array(
			'className' => 'MethodType',
			'foreignKey' => 'method_type_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
