<?php

/*
 * This file is part of the Fuel Supervisor package.
 *
 * (c) Indigo Development Team
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Fuel\Tasks;

/**
 * Supervisor task
 *
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 */
class Supervisor
{
    /**
     * Supervisor instance
     *
     * @var Indigo\Supervisor\Supervisor
     */
    protected $supervisor;

    public function __construct()
    {
        $supervisor = \Cli::option('supervisor', \Cli::option('g'));
        $this->supervisor = \Supervisor::forge($supervisor);
    }

    /**
     * Runs a listener
     *
     * @param string $listener
     */
    public function listen($listener)
    {
        $listeners = \Config::get('supervisor.listener');

        if (array_key_exists($listener, $listeners) === false) {
            throw new \InvalidArgumentException('Listener ' . $listener . ' is not found.');
        }

        $listener = $listeners[$listener]($this->supervisor);

        $listener->listen();
    }
}
