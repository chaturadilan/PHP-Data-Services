<?php
App::uses('MethodType', 'Model');

/**
 * MethodType Test Case
 *
 */
class MethodTypeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.method_type',
		'app.method'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->MethodType = ClassRegistry::init('MethodType');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->MethodType);

		parent::tearDown();
	}

}
