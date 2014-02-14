<?php
/**
 * Fuel Supervisor
 *
 * @package     Fuel
 * @subpackage  Supervisor
 * @version     1.1.1
 * @author      Márk Sági-Kazár <mark.sagikazar@gmail.com>
 * @license     MIT License
 * @copyright   2013 - 2014 Indigo Development Team
 * @link        https://indigophp.com
 */

Autoloader::add_core_namespace('Supervisor');

Autoloader::add_classes(array(
    'Supervisor\\Supervisor' => __DIR__ . '/classes/supervisor.php',
));
