<?php
App::uses('DataAuth', 'Model');

/**
 * DataAuth Test Case
 *
 */
class DataAuthTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.data_auth',
		'app.data_api',
		'app.data_app',
		'app.data_collection',
		'app.data_provider',
		'app.source_type',
		'app.method',
		'app.method_type',
		'app.method_param'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->DataAuth = ClassRegistry::init('DataAuth');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->DataAuth);

		parent::tearDown();
	}

}
