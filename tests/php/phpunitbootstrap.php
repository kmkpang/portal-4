<?php
/**
 * security..if jexe is not defined..none of the php classes will execute
 */


if (!defined('_JEXEC'))
    define('_JEXEC', 1);

error_reporting(1);

define('DS', DIRECTORY_SEPARATOR);
define('__ISUNITTEST', true);


$jpath_base = (dirname(__FILE__)) . '/../../';
$jpath_base = realpath($jpath_base);
ini_set('display_errors', '1'); // only for xampp , because it screws up the display
ini_set('max_execution_time', '0');
ini_set('memory_limit', '2048M'); // required only on linux and ubuntu !


/**
 * Constant that is checked in included files to prevent direct access.
 * define() is used in the installation folder rather than "const" to not error for PHP 5.2 and lower
 */
define('_JEXEC', 1);

define('JPATH_BASE', $jpath_base);
require_once JPATH_BASE . '/includes/defines.php';
require_once JPATH_LIBRARIES . '/import.legacy.php';
require_once JPATH_LIBRARIES . '/cms.php';

// Load the configuration
require_once JPATH_CONFIGURATION . '/configuration.php';

require_once JPATH_BASE . '/includes/framework.php';

JFactory::getSession()->start();
$app = JFactory::getApplication('site');
ob_start(); // Start output buffering
try {
    $_SERVER['REQUEST_METHOD'] = 'POST';
    $_SERVER['HTTP_HOST'] = 'cli';
    JFactory::getApplication()->input->set('format','html');
    JFactory::getApplication()->input->set('view','');
    JFactory::getApplication()->input->set('g5_not_found',0);

    // Execute the application.
    $app->execute();
} catch (Exception $e) {
    WFactory::getLogger()->debug("Ignoring : " . $e->getMessage());
}

$list = ob_get_contents(); // Store buffer in variable

ob_end_clean(); // End buffering and clean up
