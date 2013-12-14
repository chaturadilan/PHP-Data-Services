<?php
App::uses('Method', 'Model');

/**
 * Method Test Case
 *
 */
class MethodTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.method',
		'app.data_collections',
		'app.method_type'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Method = ClassRegistry::init('Method');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Method);

		parent::tearDown();
	}

}
