<?php
App::uses('DataApp', 'Model');

/**
 * DataApp Test Case
 *
 */
class DataAppTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.data_app',
		'app.data_collection'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->DataApp = ClassRegistry::init('DataApp');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->DataApp);

		parent::tearDown();
	}

}
