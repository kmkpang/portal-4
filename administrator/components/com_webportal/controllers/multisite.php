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

jimport('joomla.application.component.controllerform');

/**
 * Multisite controller class.
 *
 * @since  1.6
 */
class WebportalControllerMultisite extends JControllerForm
{
	/**
	 * Constructor
	 *
	 * @throws Exception
	 */
	public function __construct()
	{
		$this->view_list = 'multisites';
		parent::__construct();
	}
}
