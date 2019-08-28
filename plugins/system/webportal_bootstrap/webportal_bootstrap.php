<?php
/**
 * @package     Joomla.Plugin
 * @subpackage  System.Webportal_Bootstap
 *
 * @copyright Softverk Ltd.
 * @license Commercial
 */

defined('_JEXEC') or die;

if (!defined('DS'))
    define('DS', DIRECTORY_SEPARATOR);


define('OFFICE', 'OFFICE');
define('OFFICE_LOGO', 'OFFICE_LOGO');
define('AGENT', 'AGENT');
define('PROPERTY', 'PROPERTY');
define('IMAGE', 'IMAGE');
define('DIRECTION_INCOMING', 'INCOMING');
define('DIRECTION_OUTGOING', 'OUTGOING');
define('COMMAND_CREATE', 'CREATE');
define('COMMAND_UPDATE', 'UPDATE');
define('COMMAND_DELETE', 'DELETE');
//--- property related constants
define('PROPERTY_COMMERCIAL', 'COMMERCIAL');
define('PROPERTY_RESIDENTIAL', 'RESIDENTIAL');
define('PROPERTY_BUY', 'BUY');
define('PROPERTY_RENT', 'RENT');
define('PROPERTY_BUY_AND_RENT', 'BUY_AND_RENT');


require_once JPATH_ROOT . DS . "vendor/autoload.php";

class plgSystemWebportal_Bootstrap extends JPlugin
{


    function onAfterInitialise()
    {
        /**
         * Load wfactory
         */
        JLoader::import('webportal.wfactory');

        \Webportal\Logger\PortalLogger::debug("** System Initialize : " . JUri::getInstance()->toString() . " **", __LINE__, __FILE__);

        if (!\Webportal\PortalHelper::isCliMode() && JFactory::getApplication()->isClient('site')) {
            $currentUri = JUri::base();

            if (strpos($currentUri, "condo.com") !== false)
                JFactory::getApplication()->getMenu()->setDefault(137);
            if (strpos($currentUri, "softverk.com") !== false)
                JFactory::getApplication()->getMenu()->setDefault(135);
            if (strpos($currentUri, "ihouse.com") !== false)
                JFactory::getApplication()->getMenu()->setDefault(136);
            //JFactory::getApplication()->redirect("/c1");
        }

        /// //// NOTE: if you are looking for where I did the >getElementsBag()->fill , it in
        /// ////       templates/g5_helium/quix/frontend/quix.php file
    }

    function onAfterRender()
    {


    }

    function onExtensionAfterSave($moduleName, $params)
    {


    }

    function onContentPrepare($context, &$article, &$params, $page = 0)
    {


    }


}
