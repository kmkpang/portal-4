<?php
/**
 * @package     Webportal\Services
 * @subpackage
 *
 * @copyright   Softverk Ltd
 * @license     Commercial
 */

namespace Webportal\Services;


class ServiceBase
{
    /**
     * @var ServiceBase
     * @since 4.0.0
     */
    protected static $instance = null;
    public static function getInstance(): ServiceBase
    {
        if (!isset(static::$instance)) {
            static::$instance = new static;
        }
        return static::$instance;
    }
}
