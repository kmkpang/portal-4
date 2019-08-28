<?php
/**
 * @version    CVS: 4.0.0
 * @package    Com_Webportal
 * @author     Shrouk Khan <shroukkhan@gmail.com>
 * @copyright  2018 Shrouk Khan
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access
defined('_JEXEC') or die;

// Access check.
if (!JFactory::getUser()->authorise('core.manage', 'com_webportal'))
{
	throw new Exception(JText::_('JERROR_ALERTNOAUTHOR'));
}

// Include dependancies
jimport('joomla.application.component.controller');

JLoader::registerPrefix('Webportal', JPATH_COMPONENT_ADMINISTRATOR);
JLoader::register('WebportalHelper', JPATH_COMPONENT_ADMINISTRATOR . DIRECTORY_SEPARATOR . 'helpers' . DIRECTORY_SEPARATOR . 'webportal.php');

$controller = JControllerLegacy::getInstance('Webportal');
$controller->execute(JFactory::getApplication()->input->get('task'));
$controller->redirect();
