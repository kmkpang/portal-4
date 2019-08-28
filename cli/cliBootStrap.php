<?php
/**
 * @package     Joomla.Cli
 *
 * @copyright   Softverk Ltd
 * @license     Commercial
 */

// Set flag that this is a parent file.
const _JEXEC = 1;

error_reporting(E_ALL);
ini_set('display_errors', "On");

// Load system defines
if (file_exists(dirname(__DIR__) . '/defines.php')) {
    require_once dirname(__DIR__) . '/defines.php';
}

if (!defined('_JDEFINES')) {
    define('JPATH_BASE', dirname(__DIR__));
    require_once JPATH_BASE . '/includes/defines.php';

    //other defines
    define('DS', DIRECTORY_SEPARATOR);

}

require_once JPATH_LIBRARIES . '/import.legacy.php';
require_once JPATH_LIBRARIES . '/cms.php';

// Load the configuration
require_once JPATH_CONFIGURATION . '/configuration.php';

require_once JPATH_BASE . '/includes/framework.php';
require_once JPATH_BASE . '/cli/cliParser.php';
require_once JPATH_ROOT . DS . "vendor/autoload.php";


global $arguments;
$arguments = parseArguments();

JLoader::import('webportal.wfactory');

