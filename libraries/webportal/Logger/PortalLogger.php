<?php
/**
 * @package     Webportal\Logger
 * @subpackage
 *
 * @copyright   Softverk Ltd
 * @license     Commercial
 */

namespace Webportal\Logger;

// no direct access
use Exception;
use JFactory;
use JUri;
use Webportal\PortalHelper;
use Webportal\Wfactory;

defined('_JEXEC') or die ("Restricted area");
//debug 5 , info 4 , warn 3 , error 2, fatal 1 , Off 0

define('__LOG_LEVEL_DEBUG', "DEBUG");
define('__LOG_LEVEL_WARN', "WARN");
define('__LOG_LEVEL_ERROR', "ERROR");
define('__LOG_LEVEL_FATAL', "FATAL");

require_once 'ecsapeColors.php';

/**
 * Class PortalLogger
 * @codeCoverageIgnore
 */
class PortalLogger
{
    /**
     * @var \Logger
     */
    private $logger;
    private $logLevel = 5; // default value debug

    private $colors = array(
        __LOG_LEVEL_DEBUG => "green",
        __LOG_LEVEL_WARN => "yellow",
        __LOG_LEVEL_ERROR => "red",
        __LOG_LEVEL_FATAL => "bold_red",
    );

    //debug 5 , warn 3 , error 2, fatal 1 , Off 0

    /**
     * @var PortalLogger
     * @since 4.0.0
     */
    protected static $instance = null;

    protected function __construct()
    {
        //Thou shalt not construct that which is unconstructable!

    }

    protected function __clone()
    {
        //Me not like clones! Me smash clones!
    }


    public static function getInstance(): PortalLogger
    {
        if (!isset(static::$instance)) {
            static::$instance = new static;
            static::$instance->initialize();
        }
        return static::$instance;
    }

    static function debug(string $msg, int $line, string $file)
    {
        if (static::getInstance()->logLevel < 5)
            return;

        static::getInstance()->logger->debug(static::getInstance()->prepareMsg(__LOG_LEVEL_DEBUG, $msg, $line, $file));
    }

    static function warn($msg, $line = null, $file = null, $auxData = null)
    {

        if (static::getInstance()->logLevel < 3)
            return;


        static::getInstance()->logger->warn(static::getInstance()->prepareMsg(__LOG_LEVEL_WARN, $msg, $line, $file), $auxData);
    }

    static function error($msg, $line = null, $file = null, $auxData = null)
    {

        if (static::getInstance()->logLevel < 2)
            return;

        static::getInstance()->logger->error(static::getInstance()->prepareMsg(__LOG_LEVEL_ERROR, $msg, $line, $file, true), $auxData);
    }

    /**
     * This also triggers a user error , so calling this will effectively close down the program!
     * @param string $msg
     * @param int|null $line
     * @param string|null $file
     */
    static function fatal(string $msg, int $line = null, string $file = null)
    {
        $currentUrl = PortalHelper::isCliMode() ? "cli_url" : JUri::getInstance()->toString();
        $msg = "[$currentUrl] $msg ";
        static::getInstance()->logger->fatal(static::getInstance()->prepareMsg(__LOG_LEVEL_FATAL, $msg, $line, $file, true));
    }


    private function prepareMsg(string $logLevel, string $msg, int $line, string $file, bool $fullStack = null): string
    {
        $user = JFactory::getUser();
        $client = PortalHelper::isCliMode() ? "cli" : $_SERVER['REMOTE_ADDR'];

        $function = "";
        if ($fullStack) {
            $e = new Exception();
            $trace = $e->getTrace();
            $original_caller = $trace[2]; //the original caller in some other file / class
            $function = $original_caller["class"] . $original_caller["type"] . $original_caller["function"];

            for ($i = count($trace) - 1; $i > 3; $i--) {
                $caller = $trace[$i];
                $f = $caller["class"] . $caller["type"] . $caller["function"];
                $function .= "\r\n$f";
            }
            $function = "[$function]";
        }

        $lineFile = basename($file) . ":$line";
        $msg = "[$logLevel]" . $function . "[" . $user->username . "/" . $client . "][$lineFile] " . $msg;
        try {
            $msg = PortalHelper::isUnix() ? EscapeColors::fg_color(static::getInstance()->colors[$logLevel], $msg) : $msg;
        } catch (Exception $e) {
            echo "Failed to format log message : {$e->getMessage()}\n";
        }
        return $msg;
    }

    /**
     * Initializes logger
     *
     */
    public function initialize(): bool
    {

        register_shutdown_function(array($this, 'fatalErrorCapture'));
        /**
         * @var $baseConfig \JosPortalSettings
         */
        $baseConfig = Wfactory::getDb()->getEntityManager()->find('JosPortalSettings', 1);
        $tmpFilePath = JPATH_ROOT . "/tmp/log4php.xml";
        file_put_contents($tmpFilePath, $baseConfig->getLogConfig());
        \Logger::configure($tmpFilePath);
        static::getInstance()->logger = \Logger::getLogger("webportalLogger");
        return true;
    }

    /**
     * Called when a system shutdown is called
     */
    function fatalErrorCapture()
    {

        $error = error_get_last();

        if (!is_null($error)) {

            if ($error["type"] == E_ERROR
                || $error["type"] == E_PARSE
                || $error["type"] == E_CORE_ERROR
                || $error["type"] == E_COMPILE_ERROR
            ) {

                self::fatal("{$error['file']}:{$error['line']} --> {$error['message']}");
            }

        }
    }


}


