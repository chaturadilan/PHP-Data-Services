<?php
App::uses('DataCollection', 'Model');

/**
 * DataCollection Test Case
 *
 */
class DataCollectionTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.data_collection',
		'app.data_app',
		'app.source'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->DataCollection = ClassRegistry::init('DataCollection');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->DataCollection);

		parent::tearDown();
	}

}
