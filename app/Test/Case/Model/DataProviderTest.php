<?php
App::uses('DataProvider', 'Model');

/**
 * DataProvider Test Case
 *
 */
class DataProviderTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.data_provider',
		'app.source_type',
		'app.data_app'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->DataProvider = ClassRegistry::init('DataProvider');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->DataProvider);

		parent::tearDown();
	}

}
