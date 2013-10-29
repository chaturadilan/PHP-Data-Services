<?php
App::uses('SourceType', 'Model');

/**
 * SourceType Test Case
 *
 */
class SourceTypeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.source_type',
		'app.source'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->SourceType = ClassRegistry::init('SourceType');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->SourceType);

		parent::tearDown();
	}

}
