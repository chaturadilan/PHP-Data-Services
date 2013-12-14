<?php
/**
 * PHP REST Data Services
 * Copyright (c) Chatura Dilan Perera,(http://www.dilan.me)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Chatura Dilan Perera,(http://www.dilan.me)
 * @link          http://www.dilan.me 
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
App::uses('AppModel', 'Model');
/**
 * DataAuth Model
 *
 * @property DataApi $DataApi
 * @property DataCollection $DataCollection
 */
class DataAuth extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'data_api_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
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
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'DataApi' => array(
			'className' => 'DataApi',
			'foreignKey' => 'data_api_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'DataCollection' => array(
			'className' => 'DataCollection',
			'foreignKey' => 'data_collection_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
