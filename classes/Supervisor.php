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

use Indigo\Supervisor\Supervisor as SupervisorClass;
use Indigo\Supervisor\Connector\ConnectorInterface;
use InvalidArgumentException;

/**
 * Supervisor Forge class
 *
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 */
class Supervisor extends \Forge
{
	use \Indigo\Core\Forge\Instance;

	protected static $_config = 'supervisor';

	/**
	 * {@inheritdocs}
	 *
	 * @param  string $instance Instance name
	 * @return Supervisor
	 */
	public static function forge($instance = 'default')
	{
		$connector = \Config::get('supervisor.' . $instance);

		if ($connector instanceof ConnectorInterface === false)
		{
			throw new InvalidArgumentException('Invalid Connector');
		}

		return static::newInstance($instance, new SupervisorClass($connector));
	}
}
