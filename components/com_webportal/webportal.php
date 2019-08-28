<?php
/**
 * @version    CVS: 4.0.0
 * @package    Com_Webportal
 * @author     Shrouk Khan <shroukkhan@gmail.com>
 * @copyright  2018 Shrouk Khan
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

define('JPATH_COMPONENT_WEBPORTAL', JPATH_BASE . DS . 'components' . DS . 'com_webportal');
define('JPATH_COMPONENT_WEBPORTAL_CONTROLLERS', JPATH_COMPONENT_WEBPORTAL . DS . 'controllers');
define('JPATH_COMPONENT_WEBPORTAL_MODELS', JPATH_COMPONENT_WEBPORTAL . DS . 'models');

// Include dependancies
jimport('joomla.application.component.controller');

JLoader::registerPrefix('Webportal', JPATH_COMPONENT);
JLoader::register('WebportalController', JPATH_COMPONENT . '/controller.php');

if ($controller = JFactory::getApplication()->input->getWord('controller')) {
    $path = JPATH_COMPONENT_WEBPORTAL_CONTROLLERS . DS . $controller . '.php';
    if (file_exists($path)) {
        require_once $path;
    } else {
        $controller = '';
    }
}

//Create the controller
$classname = 'WebportalController' . ucfirst($controller);
$controller = new $classname(array('default_task' => 'display'));
$controller->execute(JFactory::getApplication()->input->getCmd('task'));
//Redirect if set by the controller
$controller->redirect();
