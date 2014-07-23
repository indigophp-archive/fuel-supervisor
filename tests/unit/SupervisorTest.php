<?php

namespace Indigo\Fuel;

use Codeception\TestCase\Test;

/**
 * Tests for Supervisor
 *
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 *
 * @coversDefaultClass Indigo\Fuel\Supervisor
 * @group              Supervisor
 */
class SupervisorTest extends Test
{
	public function _before()
	{
		Supervisor::_init();
		\Config::set('supervisor.test', \Mockery::mock('Indigo\\Supervisor\\Connector\\ConnectorInterface'));
	}

	/**
	 * @covers ::forge
	 */
	public function testForge()
	{
		$class = Supervisor::forge('test');

		$this->assertInstanceOf('Indigo\\Supervisor\\Supervisor', $class);
		$this->assertInstanceOf('Indigo\\Supervisor\\Connector\\ConnectorInterface', $class->getConnector());
	}

	/**
	 * @covers            ::forge
	 * @expectedException InvalidArgumentException
	 */
	public function testForgeFailure()
	{
		Supervisor::forge('THIS_SHOULD_NEVER_EXIST');
	}
}
