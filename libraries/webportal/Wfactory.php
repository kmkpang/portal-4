<?php
/**
 * Created by PhpStorm.
 * User: shroukkhan
 * Date: 11/9/18
 * Time: 11:25 AM
 * @copyright Softverk Ltd.
 * @license Commercial
 */

namespace Webportal;

use Webportal\Db\PortalDb;
use Webportal\Logger\PortalLogger;

defined('JPATH_PLATFORM') or die;
if(!defined('DS')){
    define('DS', DIRECTORY_SEPARATOR);
}
define('JPATH_LIBRARY_WEBPORTAL', JPATH_LIBRARIES . DS . 'webportal');
define('JPATH_LIBRARY_WEBPORTAL_SERVICES', JPATH_LIBRARY_WEBPORTAL . DS . 'services');

abstract class Wfactory
{
    /**
     * @var   PortalDb
     * @since 4.0.0
     */
    private static $db;
    /**
     * @var PortalLogger
     * @since 4.0.0
     */
    private static $logger;

    /**
     * Get db object, root of all db functions.
     * @return PortalDb
     *
     * @since 4.0.0
     */
    public static function getDb(): PortalDb
    {
        if (!self::$db) {
            self::$db = PortalDb::getInstance();
        }
        return self::$db;
    }

    public static function getLogger(): PortalLogger
    {
        if (!self::$logger) {
            self::$logger = PortalLogger::getInstance();
        }
        return self::$logger;
    }

}
