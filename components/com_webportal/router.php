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

JLoader::registerPrefix('Webportal', JPATH_SITE . '/components/com_webportal/');

/**
 * Class WebportalRouter
 *
 * @since  3.3
 */
class WebportalRouter extends JComponentRouterBase
{
	/**
	 * Build method for URLs
	 * This method is meant to transform the query parameters into a more human
	 * readable form. It is only executed when SEF mode is switched on.
	 *
	 * @param   array  &$query  An array of URL arguments
	 *
	 * @return  array  The URL arguments to use to assemble the subsequent URL.
	 *
	 * @since   3.3
	 */
	public function build(&$query)
	{
		$segments = array();
		$view     = null;

		if (isset($query['task']))
		{
			$taskParts  = explode('.', $query['task']);
			$segments[] = implode('/', $taskParts);
			$view       = $taskParts[0];
			unset($query['task']);
		}

		if (isset($query['view']))
		{
			$segments[] = $query['view'];
			$view = $query['view'];
			
			unset($query['view']);
		}

		if (isset($query['id']))
		{
			if ($view !== null)
			{
				$segments[] = $query['id'];
			}
			else
			{
				$segments[] = $query['id'];
			}

			unset($query['id']);
		}

		return $segments;
	}

	/**
	 * Parse method for URLs
	 * This method is meant to transform the human readable URL back into
	 * query parameters. It is only executed when SEF mode is switched on.
	 *
	 * @param   array  &$segments  The segments of the URL to parse.
	 *
	 * @return  array  The URL attributes to be used by the application.
	 *
	 * @since   3.3
	 */
	public function parse(&$segments)
	{

        $vars = array();
        $requestedPath = str_replace(JUri::base(), "", JUri::current());
        $fullSegment = array_filter(explode('/', $requestedPath));

        // because it looks like /en/api/v1/etc...
        $lang = $fullSegment[0];
        $requestedView = $fullSegment[1];

        if($requestedView==='api'){
            $vars["controller"] = "api";
            $vars["version"] = $fullSegment[2];
            $vars["service"] = $fullSegment[3];
            $vars["task"] = "service";
            $vars["function"] = $fullSegment[4];

            \Webportal\PortalHelper::setCurrentPage('api');
        }

        else { // built-in joomla boolshit. lets not remove them yet!
            while (!empty($segments)) {
                $segment = array_pop($segments);

                // If it's the ID, let's put on the request
                if (is_numeric($segment)) {
                    $vars['id'] = $segment;
                } else {
                    $vars['task'] = $vars['view'] . '.' . $segment;
                }
            }
        }

		return $vars;
	}
}
