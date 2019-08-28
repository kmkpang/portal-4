<?php /** @noinspection PhpUndefinedClassInspection */
/**
 * Created by PhpStorm.
 * User: khan
 * Date: 5/10/14
 * Time: 12:19 PM
 */

jimport('joomla.application.component.controllerform');
jimport('joomla.error.error');

use  \Webportal\Logger\PortalLogger;

/**
 * Controller for api
 */
class WebportalControllerApi extends WebportalController
{
    function __construct()
    {
        parent::__construct();
        PortalLogger::debug("Api service called", __LINE__, __FILE__);
    }


    function display()
    {
        return $this->service();
    }

    function service()
    {
        try {
            $service = JFactory::getApplication()->input->getCmd('service');
            $function = JFactory::getApplication()->input->getCmd('function');
            $version = JFactory::getApplication()->input->getCmd('version', 'v1');


            PortalLogger::debug("[API-SERVICE]: " . JUri::current() . " called", __LINE__, __FILE__);

            ob_clean();
            $output = $this->$version([
                "service" => $service,
                "function" => $function
            ]);

            if (!is_string($output)) {
                $output = json_encode($output);

            }
            echo $output;
            ob_flush();
            exit();
        } catch (Exception $e) {
        }

    }

    /**
     * Do not remove , this function is used !
     * @param $fullTask array
     *
     * @return mixed
     *
     * @since 4.0.0
     */
    private function v1($fullTask)
    {
        // $x = \Webportal\Services\Multisite\MultisiteService::

        $serviceName = ucfirst($fullTask["service"]);
        $className = $serviceName."Service";
        $class = "\Webportal\Services\\$serviceName\\$className";
        $instance = $class::getInstance();
        $function = $fullTask["function"];
        return $instance->$function();
    }


}
