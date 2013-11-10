<?php
/**
 * DataAuthFixture
 *
 */
class DataAuthFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'data_api_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'data_collection_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'auth_type' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'auth_app' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'identifier' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'data_api_id' => 1,
			'data_collection_id' => 1,
			'auth_type' => 'Lorem ipsum dolor sit amet',
			'auth_app' => 'Lorem ipsum dolor sit amet',
			'identifier' => 'Lorem ipsum dolor sit amet'
		),
	);

}
