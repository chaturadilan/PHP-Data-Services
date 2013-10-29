<?php
App::uses('AppModel', 'Model');
/**
 * Method Model
 *
 * @property DataCollections $DataCollections
 * @property MethodType $MethodType
 */
class Method extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'data_collections_id' => array(
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
		'DataCollections' => array(
			'className' => 'DataCollections',
			'foreignKey' => 'data_collections_id',
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
