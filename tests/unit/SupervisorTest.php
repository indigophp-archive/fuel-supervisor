<?php

/*
 * This file is part of the Fuel Supervisor package.
 *
 * (c) Indigo Development Team
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

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
		\Config::set('supervisor.supervisor.test', \Mockery::mock('Indigo\\Supervisor\\Connector\\ConnectorInterface'));
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
	 * @covers ::forge
	 */
	public function testBc()
	{
		\Config::set('supervisor.bc', \Mockery::mock('Indigo\\Supervisor\\Connector\\ConnectorInterface'));

		$class = Supervisor::forge('bc');

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
