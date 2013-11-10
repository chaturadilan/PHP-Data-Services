<?php
App::uses('DataApi', 'Model');

/**
 * DataApi Test Case
 *
 */
class DataApiTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.data_api',
		'app.data_app',
		'app.data_collection',
		'app.data_provider',
		'app.source_type',
		'app.method',
		'app.method_type',
		'app.method_param',
		'app.data_auth'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->DataApi = ClassRegistry::init('DataApi');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->DataApi);

		parent::tearDown();
	}

}
