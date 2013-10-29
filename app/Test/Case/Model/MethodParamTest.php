<?php
App::uses('MethodParam', 'Model');

/**
 * MethodParam Test Case
 *
 */
class MethodParamTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.method_param',
		'app.methods'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->MethodParam = ClassRegistry::init('MethodParam');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->MethodParam);

		parent::tearDown();
	}

}
