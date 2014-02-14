<?php
/**
 * Fuel Supervisor
 *
 * @package 	Fuel
 * @subpackage	Supervisor
 * @version 	1.1.1
 * @author		Márk Sági-Kazár <mark.sagikazar@gmail.com>
 * @license 	MIT License
 * @copyright	2013 - 2014 Indigo Development Team
 * @link		https://indigophp.com
 */

namespace Supervisor;

use Indigo\Supervisor\Supervisor as S;
use Indigo\Supervisor\Connector\ConnectorInterface;

class Supervisor
{
	/**
	 * Array of Supervisor instances
	 *
	 * @var array
	 */
	protected static $_instances = array();

	/**
	 * Init
	 */
	public static function _init()
	{
		\Config::load('supervisor', true);
	}

	/**
	 * Forge and return new instance
	 *
	 * @param  string             $instance  Instance name
	 * @param  ConnectorInterface $connector Connector instance
	 * @return Supervisor
	 */
	public static function forge($instance = null, ConnectorInterface $connector = null)
	{
		is_null($instance) and $instance = \Config::get('supervisor.default');
		is_null($connector) and $connector = \Config::get('supervisor.connector.' . $instance);

		if ( ! $connector instanceof ConnectorInterface)
		{
			throw new \InvalidArgumentException('No valid Connector found');
		}

		return static::$_instances[$instance] = new S($connector);
	}

	/**
	 * Return a Supervisor instance
	 *
	 * @param  string $instance  Instance name
	 * @return Supervisor
	 */
	public static function instance($instance = null)
	{
		if (array_key_exists($instance, static::$_instances))
		{
			$instance = static::$_instances[$instance];
		}
		else
		{
			$instance = static::forge($instance);
		}

		return $instance;
	}

	/**
	 * class constructor
	 *
	 * @param   void
	 * @access  private
	 * @return  void
	 */
	final private function __construct() {}
}
